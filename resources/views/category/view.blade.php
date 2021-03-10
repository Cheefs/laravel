@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if(isset($category))
                            <h1>{{ $category->title }}</h1>
                        @endif
                    </div>
                    <div class="card-body">
                        @forelse( $news as $item )
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('news.view', $item->id ) }}">
                                        {{ $item->title }}
                                        <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/default.jpg') }})"></div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <h3>{{ __('News for that category not found!') }}</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
