<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(NewsCategory $list): View {
        return view('news.category.index')->with('list', $list->findAll());
    }

    public function view(NewsCategory $model, string $slug)
    {
        $category = $model->findBy('slug', $slug);

        if (!$category) {
           return Redirect::to('news/category');
        }

        return view('news.category.view', [
            'category' => $category,
            'news' => $model->getNews($category['id']),
        ]);
    }
}
