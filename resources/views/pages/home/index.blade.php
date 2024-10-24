@extends('layouts.main')

@section('content')
<div class="px-4 py-5 my-5 text-center">
  <div class="row">
    <div class="col-lg-6 mx-auto mb-4">
      <x-alert/>
    </div>
  </div>
  <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
  <h1 class="display-5 fw-bold text-body-emphasis">{{ config('app.name') }}</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">
      Welcome, this is {{ config('app.name') }}. Aplikasi ini dibuat untuk memudahkan pengelolaan tugas/to do list.
      <br>
      Created by <a href="https://elfan.my.id" class="text-decoration-none" target="_blank">Elfan Hari Saputra</a>.
    </p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      @auth
        <a href="{{ route('todo.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Start Create Todo</a>
      @else
        <a href="{{ route('login.index') }}" type="button" class="btn btn-primary btn-lg px-4 gap-3">Login</a>
        <a href="{{ route('register.index') }}" type="button" class="btn btn-outline-secondary btn-lg px-4">Daftar</a>
      @endauth
    </div>
  </div>
</div>
@endsection
