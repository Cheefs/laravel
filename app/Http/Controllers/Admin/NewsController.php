<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function create(Request $request, NewsCategory $category, News $news) {
        $categoryList = DB::table('news_category')->get();
        if ($request->isMethod('post')) {

            $request->flash();
            $imageUrl = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $imageUrl = Storage::url($path);
            }

            $id = DB::table('news')->insertGetId([
                'title' => $request->get('title'),
                'is_private' => (bool)$request->get('is_private'),
                'text' => $request->get('text'),
                'category_id' => $request->get('category_id'),
                'image' => $imageUrl
            ]);

            return redirect()->route('news.view', ['id' => $id ] );
        }
        return view('admin.news-create')->with('categoryList', $categoryList);
    }
}
