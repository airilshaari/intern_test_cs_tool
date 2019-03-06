<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('addUser')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'superadmin',
        ]);

        return redirect()->route('user');
    }

    public function resetPassword()
    {
        return view('resetPassword');
    }

    public function resetPasswordSubmit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::logout();
        return redirect()->route('login');

    }
}