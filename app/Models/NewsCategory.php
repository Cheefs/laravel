<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $text
 * @property string $slug
 * @property array $news
 *
 **/
class NewsCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function news() {
        return $this->hasMany(News::class);
    }
}
