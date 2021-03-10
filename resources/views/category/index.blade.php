@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <h1>News Category`s</h1>
    <ul class="list-group">
    @forelse( $list as $category )
        <li class="list-group-item">
            <a href="{{ route('news.category.view', $category->slug) }}">
                {{ $category->title }}
            </a>
        </li>
    @empty
        <li class="list-group-item">>Category`s not found!</li>
    @endforelse
    </ul>
@endsection
