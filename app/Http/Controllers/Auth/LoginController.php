<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
      return view('pages.auth.login');
    }

    public function store(Request $request){

      $request->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);

      $input = $request->only('email', 'password');

      if (Auth::attempt($input)) {
        $request->session()->regenerate();
        return redirect('/')->with([
          'alert' => 'success',
          'alertMessage' => 'Anda telah berhasil login!'
        ]);
      } else {
        return back()->withInput()->with([
          'alert' => 'warning',
          'alertMessage' => 'Email atau password Anda salah!',
        ]);
      }

    }
}
