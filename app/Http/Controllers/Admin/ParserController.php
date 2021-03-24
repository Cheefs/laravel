<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParse;
use App\Models\Resource;


class ParserController extends Controller
{
    public function create() {
        return view('admin.parser.create');
    }

    public function store() {
        $resources = Resource::all();
        foreach ($resources as $resource) {
            NewsParse::dispatch($resource->url);
        }
        return redirect()->route('admin.parser.create')->with('success', __('Parse complete'));
    }
}
