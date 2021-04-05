<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ResourcesRequest;
use App\Models\Resource;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index() {
        return view('admin.resources.index', [
            'resources' => Resource::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Resource $resource
     * @return Application|Factory|View
     */
    public function create(Resource $resource) {
        return view('admin.resources.create', [
            'resource' => $resource
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param ResourcesRequest $request
     * @return RedirectResponse
     */
    public function store(ResourcesRequest $request) {
        $request->validated();
        $category = new Resource();
        $category->fill( $request->all() )->save();
        return redirect()->route('admin.resources.index')->with('success', 'Resource created!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Resource $resource
     * @return Application|Factory|View
     */
    public function edit(Resource $resource) {
        return view('admin.resources.update', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param ResourcesRequest $request
     * @param Resource $resource
     * @return RedirectResponse
     */
    public function update(ResourcesRequest $request, Resource $resource) {
        $request->validated();
        $resource->fill($request->all())->save();
        return redirect()->route('admin.resources.index')->with('success', 'Resource updated!');
    }

    /**
     * Remove the specified resource from storage.
     * @param Resource $resource
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Resource $resource) {
        $resource->delete();
        return redirect()->route('admin.resources.index')->with('success', 'Resource deleted!');
    }
}
