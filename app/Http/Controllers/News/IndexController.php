<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsExport;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function index(): View {
        return view('news.index')->with('news', News::paginate(10));
    }

    public function view(News $news) {
        return view('news.view')->with('news', $news);
    }

    public function download(Request $request) {
        $categoryList = NewsCategory::all();

        if ($request->isMethod('post')) {
            $request->flash();

            $selectedCategory = null;
            foreach ($categoryList as $category) {
                if ($category->id === (int)$request->get('news_category_id')) {
                    $selectedCategory = $category;
                }
            }

            if (!$selectedCategory) {
                return redirect()->route('news.download');
            }

            return Excel::download(
                new NewsExport($selectedCategory->news), "{$selectedCategory->slug}.xlsx"
            );
        }
        return view('news.download')->with('categoryList', $categoryList);
    }
}
