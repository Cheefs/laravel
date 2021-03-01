<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(News $news): View {
        return view('news.index')->with('list', $news->findAll());
    }

    public function view(News $news, int $id) {
        $item = $news->findOne($id);

        if (!$item) {
            return Redirect::to('news');
        }

        return view('news.view')->with('news', $item);
    }

    public function create(NewsCategory $category) {
        return view('news.create')->with('categoryList', $category->findAll());
    }
}
