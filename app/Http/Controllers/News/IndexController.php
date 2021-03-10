<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index(): View {
        $news = DB::table('news')->get();
        return view('news.index')->with('list', $news);
    }

    public function view(int $id) {
        $item = DB::table('news')->find($id);

        if (!$item) {
            return Redirect::to('news');
        }

        return view('news.view')->with('news', $item);
    }

    public function download(Request $request, NewsCategory $category) {
        $categoryList = DB::table('news_category')->get();

        if ($request->isMethod('post')) {
            $request->flash();
            $selectedCategory = DB::table('news_category')->find($request->get('category_id'));

            return Excel::download(
                new NewsExport($category->getNews($selectedCategory->id)), "{$selectedCategory->slug}.xlsx"
            );
        }
        return view('news.download')->with('categoryList', $categoryList);
    }
}
