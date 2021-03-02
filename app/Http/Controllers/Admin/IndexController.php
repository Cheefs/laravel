<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function test1() {
        return view('admin.test1');
    }

    public function test2() {
        return view('admin.test2');
    }

    public function create(NewsCategory $category) {
        return view('admin.news-create')->with('categoryList', $category->findAll() );
    }

}
