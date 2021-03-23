<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class NewsParser
{
    protected Collection $allCategory;
    protected Collection $allNews;

    public function __construct() {
        $this->allCategory = NewsCategory::all();
        $this->allNews = News::all();
    }

    public function run(array $newsSources) {
        foreach ($newsSources as $source) {
            $xml = XmlParser::load($source);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]']
            ]);
            $this->saveSourceNews($data['news']);
        }
    }

    function saveSourceNews($parsedNews) {
        $preparedData = [];
        foreach ($parsedNews as $news) {
            if ($this->isNewsExist($news)) {
                continue;
            }

            $category = $this->findOrCreateCategory(
                Str::slug($news['category']), $news
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
