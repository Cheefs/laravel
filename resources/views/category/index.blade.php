@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('News Category`s') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse( $newsCategories as $category )
                                <li class="list-group-item">
                                    <a href="{{ route('news.category.view', $category->slug) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @empty
                                <li class="list-group-item">>Category`s not found!</li>
                            @endforelse
                        </ul>
                        <div class="mt-2">
                            {{ $newsCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
