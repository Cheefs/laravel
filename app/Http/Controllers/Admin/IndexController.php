<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }
    public function users() {
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    public function setAdmin(Request $request) {
        $user = User::find($request->get('userId'));

        if ($user->is_admin && $user->id === Auth::user()->id) {
            return response()->json([
                'error' => __('Cant remove Admin status from yourself!'),
            ]);
        }
        $user->is_admin = !$user->is_admin;
        $user->save();

        return response()->json([
            'status' => 'ok',
            'is_admin' => $user->is_admin
        ]);
    }
}
