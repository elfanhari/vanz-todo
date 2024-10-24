<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function index(){
    return view('pages.auth.register');
  }

  public function store(Request $request){
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required'
    ]);

    try {

      User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
      ]);

      return redirect(route('login.index'))->with([
        'alert' => 'success',
        'alertMessage' => 'Anda telah berhasil mendaftar, silakan login!'
      ]);

    } catch (\Throwable $th) {

      return back()->with([
        'alert' => 'warning',
        'alertMessage' => 'Anda gagal mendaftar!'
      ]);
    }


  }
}
