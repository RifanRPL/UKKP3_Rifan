<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManual extends Controller
{
    public function register (){
        return view('auth.register');
    }

    public function login (){
        return view('auth.login');
    }

    public function loginProses(Request $request){
        $data = $request-> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;

            if ($role == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($role == 'customer') {
                return redirect()->route('cust.index');
            } else {
                Auth::logout();
                return back()->with('Error', 'Role Tidak Di Kenali');
            }
        }

        return back()->with('Error', 'Email atau Password Salah');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function registerProses(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
        ]);
        
        return redirect()->route('login')->with('Succes','Registrasi Berhasil');
    }
}
