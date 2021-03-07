<?php


namespace App\Models;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NewsExport implements FromArray, WithHeadings
{
    protected array $news;

    public function __construct(array $news) {
        $this->news = $news;
    }

    public function array(): array {
        return $this->news;
    }

    public function headings(): array
    {
        return [
            "title",
            "category_id",
            "text",
            "id",
        ];
    }
}
