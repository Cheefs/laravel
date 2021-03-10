@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('All News category`s') }}
                        <a href="{{ route('admin.news.category.create') }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse( $categoryList as $category )
                                <li class="list-group-item">
                                    <div>
                                        <span>{{ __('Title') }}:</span>
                                        <strong>{{ $category->title }}</strong>
                                    </div>
                                    <div>
                                        <span>{{ __('Slug') }}:</span>
                                        <strong>{{ $category->slug }}</strong>
                                    </div>

                                    <form action="{{ route('admin.news.category.destroy', $category) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success" href="{{ route('admin.news.category.edit', $category) }}">{{ __('Edit') }}</a>
                                        <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}">
                                    </form>
                                </li>
                            @empty
                                <li class="list-group-item">{{ __('News category`s not found!') }}</li>
                            @endforelse
                        </ul>
                        <div class="mt-2">
                            {{ $categoryList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
