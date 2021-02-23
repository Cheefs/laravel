<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(News $news): View {
        return view('news.index')->with('list', $news->findAll());
    }

    public function view(News $news, int $id): View {
        return view('news.view')->with('news', $news->findOne($id));
    }
}
