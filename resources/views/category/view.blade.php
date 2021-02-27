@extends('layouts.app')

@section('menu')
    @include(
        'main-menu', [
            'current' => isset($category) ? [
                'route' => 'news.category.view',
                'routeParams' => $category['id'],
                'name' => __($category['title']),
            ] : null
    ])
@endsection

@section('content')
    @if(isset($category))
        <h1>{{ $category['title'] }}</h1>
    @endif
    @forelse( $news as $item )
        <div>
            <a href="{{ route('news.view', $item['id']) }}">
                {{ $item['title'] }}
            </a>
        </div>
    @empty
        <h3>{{ __('News for that category not found!') }}</h3>
    @endforelse
@endsection
