<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

/**
 * @property string $id
 * @property string $title
 * @property string $image
 * @property string $text
 * @property bool $is_private
 * @property int $news_category_id;
 * @property Category $category
 *
 **/
class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'is_private', 'news_category_id'];

    public function fill(array $attributes): News {
        parent::fill($attributes);
        $this->is_private = isset($attributes['is_private']);
        return $this;
    }

    public function category() {
        return $this->belongsTo(NewsCategory::class);
    }
}
