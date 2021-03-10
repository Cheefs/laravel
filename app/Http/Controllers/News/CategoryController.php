<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View {
        return view('category.index')->with('newsCategories', NewsCategory::paginate(10));
    }

    public function view(string $slug) {
        $category = NewsCategory::where('slug', $slug)->first();

        if (!$category) {
           return Redirect::to('news/category');
        }

        return view('category.view', [
            'category' => $category,
            'news' => $category->news,
        ]);
    }
}
