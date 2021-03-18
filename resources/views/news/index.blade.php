@extends('layouts.app')

@section('menu')
    @include('main-menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All News') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse( $news as $item )
                                <li class="list-group-item">
                                <h4>{{ $item->title }}</h4>
                                <div class="card-img" style="background-image: url({{ $news->image ?? asset('storage/default.jpg') }})"></div>
                                @if($item->is_private && !Auth::user())
                                    <strong>{{ __('Is private news! You need register to view it') }}</strong>
                                @else
                                    <a class="btn btn-primary mt-2" href="{{ route('news.view', $item) }}">
                                        {{ __("Details...") }}
                                    </a>
                                @endif
                                </li>
                            @empty
                                <li class="list-group-item">{{ __('News not found!') }}</li>
                            @endforelse
                        </ul>
                        <div class="mt-2">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
