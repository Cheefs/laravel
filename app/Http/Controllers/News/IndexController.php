<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index(News $news): View {
        return view('news.main.index')->with('list', $news->findAll());
    }

    public function view(News $news, int $id): View {
        return view('news.main.view')->with('news', $news->findOne($id));
    }
}
