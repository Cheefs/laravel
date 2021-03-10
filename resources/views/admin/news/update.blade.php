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
                        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input
                                    id="title"
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    value="{{ $news->title }}"
                                    autofocus
                                >
                            </div>

                            <div class="form-group">
                                <label for="news_category_id">{{ __('Category') }}</label>
                                <select
                                    id="news_category_id"
                                    class="form-control"
                                    name="news_category_id"
                                >
                                @foreach($categoryList as $category)
                                    <option @if( $news->news_category_id === $category->id) selected @endif
                                        value="{{ $category->id }}"
                                    >
                                        {{ $category->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Text">{{ __('Text') }}</label>
                                    <textarea
                                    id="Text"
                                    type="text"
                                    class="form-control"
                                    name="text"
                                >{{ $news->text }}</textarea>
                            </div>

                            <div class="form-check">
                                <input id="is_private"
                                    @if( $news->is_private ) checked @endif
                                    name="is_private"
                                    type="checkbox"
                                    value="{{ $news->is_private }}"
                                    class="form-check-input"
                                >
                                <label for="is_private" >{{ __('Is Private') }}</label>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
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
