@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $news['title'] }}</div>
                    <div class="card-body">
                        @if($news)
                            @if (!$news['is_private'])
                                <p>{{ $news['text'] }}</p>
                            @else
                                <span class="text-danger">{{ __('Register to look') }}</span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

