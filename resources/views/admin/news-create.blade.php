@extends('layouts.app')

@section('menu')
    @include(
        'main-menu', [
            'current' => [
                'route' => 'news.create',
                'name' => __('Create News'),
            ]
        ])
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{ route('news.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input
                               id="title"
                               type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               name="title"
                               value="{{ old('title') }}"
                               required
                               autofocus
                            >
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select
                                id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror"
                                name="category_id"
                                required
                            >
                                @foreach($categoryList as $category)
                                    <option value="{{ $category['id'] }}">{{ __($category['title']) }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Text">{{ __('Text') }}</label>
                            <textarea
                                id="Text"
                                type="text"
                                class="form-control @error('Text') is-invalid @enderror"
                                name="text"
                                required
                            ></textarea>
                            @error('Text')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-check">
                            <input id="isPrivate" name="isPrivate" type="checkbox" value="1"
                                   class="form-check-input">
                            <label for="isPrivate" >{{ __('Is Private') }}</label>
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
@endsection
