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
                        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input
                                    id="title"
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    value="{{ old('title') }}"
                                >
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="news_category_id">{{ __('Category') }}</label>
                                <select
                                    id="news_category_id"
                                    class="form-control @error('news_category_id') is-invalid @enderror"
                                    name="news_category_id"
                                >
                                    @foreach($categoryList as $category)
                                    <option
                                        @if( (int)old('news_category_id') === $category->id) selected @endif
                                        value="{{ $category->id }}"
                                    >
                                        {{ $category->title }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('news_category_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="ckeditor4">{{ __('Text') }}</label>
                                <textarea
                                    id="ckeditor4"
                                    type="text"
                                    class="form-control @error('text') is-invalid @enderror"
                                    name="text"
                                >{{ old('text') }}</textarea>
                                @error('text')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input id="is_private"
                                    @if( old('is_private') ) checked @endif
                                    name="is_private"
                                    type="checkbox"
                                    value="1"
                                    class="form-check-input"
                                >
                                <label for="is_private" >{{ __('Is Private') }}</label>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image" class="@error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        const options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('ckeditor4', options);
    </script>
@endsection
