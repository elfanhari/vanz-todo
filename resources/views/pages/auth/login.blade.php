@extends('layouts.auth')

@section('content')
<form action="{{ route('login.store') }}" method="POST">
  @csrf

  <x-alert/>

  <h1 class="h3 mb-3 fw-bold text-center">
    LOGIN {{ config('app.name') }}
  </h1>

  <div class="form-floating mb-2">
    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="elfan@mail.com" required>
    <label for="email">Email</label>
    @error('email')
      <span class="invalid-feedback mb-1"> {{ $message }} </span>
    @enderror
  </div>

  <div class="form-floating">
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" required>
    <label for="password">Password</label>
    @error('password')
      <span class="invalid-feedback mb-1"> {{ $message }} </span>
    @enderror
  </div>

  <div class="text-start my-3">
      Belum punya akun? <a href="{{ route('register.index') }}">Daftar</a>
  </div>

  <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

</form>
@endsection
