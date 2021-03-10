<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View {
        $categoryList = DB::table('news_category')->get();
        return view('category.index')->with('list', $categoryList);
    }

    public function view(NewsCategory $model, string $slug)
    {
        $category = DB::table('news_category')->where('slug', $slug)->first();

        if (!$category) {
           return Redirect::to('news/category');
        }

        $categoryNews = DB::table('news')->where('category_id', $category->id)->get();

        return view('category.view', [
            'category' => $category,
            'news' => $categoryNews,
        ]);
    }
}
