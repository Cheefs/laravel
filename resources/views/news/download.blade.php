@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Select category to download news') }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('news.download') }}">
                            @csrf
                            <div class="form-group">
                                <label for="news_category_id">{{ __('Category') }}</label>
                                <select
                                    id="news_category_id"
                                    class="form-control"
                                    name="news_category_id"
                                    required
                                >
                                    @foreach($categoryList as $category)
                                        <option
                                            @if( old('news_category_id') === $category->id) selected @endif
                                        value="{{ $category->id }}"
                                        >
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Download') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
