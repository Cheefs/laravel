<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        return view('users.profile.index')->with('user', Auth::user());
    }
    public function save(UsersProfileRequest $request) {
        $request->validated();
        $user = Auth::user()->fill($request->all());
        $user->password = Hash::make($request->get('newPassword'));
        $user->save();
        return redirect()->route('users.profile.save')->with('success', 'Профиль успешно изменен!');
    }
}
