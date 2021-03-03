<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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

    public function download(Request $request, NewsCategory $category, News $newsModel) {
        if ($request->isMethod('post')) {
            $request->flash();
            $selectedCategory = $category->findOne($request->get('category_id'));

            return Excel::download(
                new NewsExport($category->getNews($selectedCategory['id'])), "{$selectedCategory['slug']}.xlsx"
            );
        }
        return view('news.download')->with('categoryList', $category->findAll());
    }
}
