<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $name
 * @property string $url
 * @property array $news
 **/
class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];
}
