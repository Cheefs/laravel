@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Url') }}</th>
                                <th scope="col">
                                    <a href="{{ route('admin.resources.create') }}" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $resources as $item )
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->url }}</td>
                                    <td>
                                        <form action="{{ route('admin.resources.destroy', $item) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-success" href="{{ route('admin.resources.edit', $item) }}">{{ __('Edit') }}</a>
                                            <input type="submit" class="btn btn-danger" value="{{ __('Delete') }}">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h4>{{ __('Resources not found!') }}</h4>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $resources->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
