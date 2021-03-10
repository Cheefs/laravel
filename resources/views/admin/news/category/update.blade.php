@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.news.category.update', $category) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input
                                    id="title"
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    value="{{ $category->title }}"
                                    autofocus
                                >
                            </div>

                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }}</label>
                                <input
                                    id="slug"
                                    type="text"
                                    class="form-control"
                                    name="slug"
                                    value="{{ $category->slug }}"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
