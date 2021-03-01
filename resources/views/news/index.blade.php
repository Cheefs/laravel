@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <h1>All News</h1>
    <ul class="list-group">
        @forelse( $list as $k => $v )
            <li class="list-group-item">
                <a href="{{ route('news.view', $k) }}">
                    {{ $v['title'] }}
                </a>
            </li>
        @empty
            <li class="list-group-item">{{ __('News not found!') }}</li>
        @endforelse
    </ul>
@endsection
