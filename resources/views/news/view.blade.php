@extends('layouts.app')

@section('menu')
    @include(
        'main-menu', [
            'current' => isset($news) ? [
                'route' => 'news.view',
                'routeParams' => $news['id'],
                'name' => __($news['title']),
            ] : null
    ])
@endsection

@section('content')
    @if(isset($news))
        <h1>{{ $news['title'] }}</h1>
        <p>{{ $news['text'] }}</p>
    @endif
@endsection

