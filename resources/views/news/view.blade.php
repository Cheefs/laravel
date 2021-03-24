@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $news->title }}</div>
                    <div class="card-body">
                        @if($news)
                            @if($news->is_private && !Auth::user())
                                <span class="text-danger">{{ __('Register to look') }}</span>
                            @else
                                <div class="card-img" style="background-image: url({{ $news->image ?? asset('storage/default.jpg') }})"></div>
                                <p>{!! $news->text !!}</p>

                                <strong>
                                    <a href="{{ $news->link }}">{{ __('Go to full news') }}</a>
                                </strong>
                            @endguest
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

