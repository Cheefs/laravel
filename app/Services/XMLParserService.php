<?php


namespace App\Services;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class XMLParserService
{
    protected Collection $allCategory;
    protected Collection $allNews;

    public function __construct() {
        $this->allCategory = NewsCategory::all();
        $this->allNews = News::all();
    }

    public function run(string $url) {
        $xml = XmlParser::load($url);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]']
        ]);
        $this->saveSourceNews($data['news'], $data);
        Storage::disk('publicLogs')->append('log.txt', date('h:i:s') . " " . $url);
    }

    function saveSourceNews(array $parsedNews, array $data) {
        $preparedData = [];
        foreach ($parsedNews as $news) {
            if ($this->isNewsExist($news)) {
                continue;
            }
            $categoryName = $news['category'] ?? $data['title'];
            $category = $this->findOrCreateCategory(
                Str::slug($categoryName), $news
            );

            $newNews = [
                'title' => $news['title'],
                'link' => $news['link'],
                'text' => $news['description'],
                'pub_date' => Date::createFromTimeString($news['pubDate']),
                'image' => $news['enclosure::url'],
                'news_category_id' => $category->id
            ];
            $preparedData[] = $newNews;
        }

        DB::table('news')->insert($preparedData);
    }

    protected function isNewsExist(array $news): bool {
        return $this->allNews->contains(function ($item) use ($news) {
            return $news['link'] && $item->link === $news['link'];
        });
    }

    protected function findOrCreateCategory(string $categorySlug, array $news): NewsCategory {
        $currentCategory = $this->allCategory->first(function ($category) use ($categorySlug) {
            return $category->slug === $categorySlug;
        });

        if (!$currentCategory) {
            $currentCategory = new NewsCategory();
            $currentCategory->fill([
                'title' => $news['category'],
                'slug' => $categorySlug,
            ])->save();
            $this->allCategory->add($currentCategory);
        }
        return $currentCategory;
    }
}
