@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <h1>All News</h1>
    <ul class="list-group">
        @forelse( $list as $news )
            <li class="list-group-item">
            <h4>{{ $news['title'] }}</h4>
                @if(!$news['is_private'])
                    <a href="{{ route('news.view', $news['id']) }}">
                        {{ __("Details...") }}
                    </a>
                @endif
            </li>
        @empty
            <li class="list-group-item">{{ __('News not found!') }}</li>
        @endforelse
    </ul>
@endsection
