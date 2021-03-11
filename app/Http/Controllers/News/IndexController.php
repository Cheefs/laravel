<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(): View {
        return view('news.index')->with('news', News::paginate(10));
    }

    public function view(News $news) {
        return view('news.view')->with('news', $news);
    }
}
