@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('All News') }}
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse( $news as $item )
                                <li class="list-group-item">
                                    <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/default.jpg') }})"></div>
                                    <div>
                                        <span>{{ __('Title') }}:</span>
                                        <strong>{{ $item->title }}</strong>
                                    </div>
                                    <div>
                                        <span>{{ __('Is Private') }}:</span>
                                        <strong>{{ $item->is_private ?__('Private') : __('Public') }}</strong>
                                    </div>

                                    <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-success" href="{{ route('admin.news.edit', $item) }}">{{ __('Edit') }}</a>
                                        <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}">
                                    </form>
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
