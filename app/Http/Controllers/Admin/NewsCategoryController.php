<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsCategoryRequest;
use App\Models\NewsCategory;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index() {
        return view('admin.news.category.index', [
            'categoryList' => NewsCategory::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param NewsCategory $category
     * @return Application|Factory|View
     */
    public function create(NewsCategory $category) {
        return view('admin.news.category.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(NewsCategoryRequest $request) {
        $request->validated();
        /** @var NewsCategory $category */
        $category = new NewsCategory();
        $category->fill( $request->all() )->save();
        return redirect()->route('news.category.view', $category->slug )->with('success', 'News Category created!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param NewsCategory $category
     * @return Application|Factory|View
     */
    public function edit(NewsCategory $category) {
        return view('admin.news.category.update', [
            'category' => $category,
            'news' => $category->news
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param NewsCategoryRequest $request
     * @param NewsCategory $category
     * @return RedirectResponse
     */
    public function update(NewsCategoryRequest $request, NewsCategory $category) {
        $request->validated();
        $category->fill($request->all())->save();
        return redirect()->route('news.category.view', $category->id)->with('success', 'News category updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param NewsCategory $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(NewsCategory $category) {
        $category->delete();
        return redirect()->route('admin.news.category.index')->with('success', 'News category deleted!');
    }
}
