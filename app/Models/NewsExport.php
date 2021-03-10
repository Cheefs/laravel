<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromArray, WithHeadings
{
    protected Collection $news;

    public function __construct( Collection $news) {
        $this->news = $news;
    }

    public function array(): array {
        return $this->news->toArray();
    }

    public function headings(): array {
        return [
            "title",
            "news_category_id",
            "text",
            "id",
        ];
    }
}
