<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index() {
        return view('admin.news.index')->with('news', News::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(News $news) {
        return view('admin.news.create', [
            'news' => $news,
            'categoryList' => NewsCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request) {
        $request->validated();
        $news = new News();
        $news->fill($request->all());
        $news->image = $this->saveImage($request);
        $news->save();
        return redirect()->route('news.view', $news->id )->with('success', 'News created!');
    }


    /**
     * Show the form for editing the specified resource.
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news) {
        return view('admin.news.update', [
            'news' => $news,
            'categoryList' => NewsCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param NewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsRequest $request, News $news) {
        $request->validated();
        $news->fill($request->all());
        $newImage = $this->saveImage($request);
        if ($newImage) {
            $news->image = $newImage;
        }
        $news->save();
        return redirect()->route('news.view', $news->id )->with('success', 'News updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param News $news
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index' )->with('success', 'News deleted!');
    }

    protected function saveImage(Request $request, string $fileName = 'image'): ?string {
        $imageUrl = null;
        $file = $request->file($fileName);
        if ($file) {
            $path = Storage::putFile('public', $file);
            $imageUrl = Storage::url($path);
        }
        return $imageUrl;
    }
}
