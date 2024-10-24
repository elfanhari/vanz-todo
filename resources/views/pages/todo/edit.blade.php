@extends('layouts.main')

@section('content')
<div class="mb-4 d-flex  align-items-center">
  <a href="{{ route('todo.index') }}" class="d-flex">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
    </svg>
  </a>
  <h2 class="ms-2">
    {{ $title }} To Do List
  </h2>
</div>

@if (session('alert'))
  <x-alert :type="session('alert')">
    {{ session('alertMessage') }}
  </x-alert>
@endif

<form action="{{ route('todo.update', $todo->idt) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          @include('pages.todo._form')
        </div>
        <div class="card-footer">
          <div class="float-start my-1">
            <button class="btn btn-primary" type="submit">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
