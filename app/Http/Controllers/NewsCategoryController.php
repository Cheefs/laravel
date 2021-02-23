<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\View\View;

class NewsCategoryController extends Controller
{
    public function index(NewsCategory $list): View {
        return view('news-category.index')->with('list', $list->findAll());
    }

    public function view(NewsCategory $model, string $slug): View {
        $category = $model->findBySlug($slug);
        return view('news-category.view', [
            'category' => $category,
            'news' => $model->getNews($category['id']),
        ]);
    }
}
