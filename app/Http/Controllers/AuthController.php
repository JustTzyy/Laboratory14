<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{
   public function showRegister()
   {

      return view('auth.register');
   }

   public function register(Request $request)
   {

      $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users,email',
         'password' => 'required|min:6|confirmed'
      ]);

      User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password)
      ]);

      return redirect('/login')->with('success', 'Registed succesfully. Please login');

   }

   public function showLogin()
   {

      return view('auth.login');
   }

   public function login(Request $request)
   {

      $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {

         $request->session()->regenerate();
         return redirect('posts');
      }

      return back()->withErrors([
         'email' => 'Invalid credentials.'
      ]);
   }

   public function logout(Request $request)
   {

      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/login');

   }
}
