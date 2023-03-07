<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function post(Request $request)
    {
        $cre = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($cre)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('gagal', 'Login failed!');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            
            'email' => 'required|unique:users',
            'name' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('sukses','Registrasi Anda Berhasi!, Silahkan Login...');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
