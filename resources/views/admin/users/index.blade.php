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
                        {{ __('Users') }}
                    </div>
                    <div class="card-body">
                        <table id="container__users" class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Create date') }}</th>
                                <th scope="col">{{ __('Update date') }}</th>
                                <th scope="col">{{ __('Is Admin') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <label>
                                                <input
                                                    @if($user->id === Auth::user()->id) disabled @endif
                                                    @if($user->is_admin) checked @endif
                                                    type="checkbox"
                                                    class="js:toggleIsAdmin"
                                                    data-id="{{ $user->id }}"
                                                    data-url="{{ route('admin.set-admin') }}"
                                                >
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

