<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsCategoryRequest;
use App\Models\NewsCategory;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view('admin.news.category.index', [
            'categoryList' => NewsCategory::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param NewsCategory $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(NewsCategory $category) {
        return view('admin.news.category.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NewsCategoryRequest $request, NewsCategory $category) {
        $request->validated();
        $category->fill($request->all())->save();
        return redirect()->route('news.category.view', $category->id )->with('success', 'News category updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param NewsCategory $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(NewsCategory $category) {
        $category->delete();
        return redirect()->route('admin.news.category.index')->with('success', 'News category deleted!');
    }
}
