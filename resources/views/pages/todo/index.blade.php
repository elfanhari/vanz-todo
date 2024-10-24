@extends('layouts.main')

@section('content')

<div class="mb-4">
  <h2 class="ms-2"> Data To Do List </h2>
</div>

<x-alert/>

<div class="card">
  <div class="card-header">
    <div class="float-start">
      <a href="{{ route('todo.create') }}" class="btn btn-primary">
        Tambah Todo
      </a>
      <button class="btn btn-info" id="btn-filter">
        Filter
      </button>
    </div>
    <div class="float-end">
      <form class="d-flex float-right" role="search" action="" method="GET">
        <input class="form-control me-2" name="search" value="{{ request('search') }}" type="search" placeholder="Cari..." aria-label="Search" id="search">
        <input type="hidden" name="is_completed" value="{{ request('is_completed') }}">
        <input type="hidden" name="is_priority" value="{{ request('is_priority') }}">
        <input type="hidden" name="deadline" value="{{ request('deadline') }}">
        <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
  </div>
  <div class="card-body table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Todo</th>
          <th scope="col">Deadline</th>
          <th scope="col">Urgensi</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
          @forelse ($todos as $todo)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <span class="@if ($todo->is_completed) text-decoration-line-through text-success @endif">
                  {{ $todo->title }}
                </span>
              </td>
              <td>
                {{ $todo->deadline != '' ? date('d-m-Y', strtotime($todo->deadline)) : '-' }}
              </td>
              <td>
                <span class="badge rounded-pill bg-{{ $todo->is_priority ? 'danger' : 'info' }}">
                  {{ $todo->is_priority ? 'Prioritas' : 'Bukan Prioritas' }}
                </span>
              </td>
              <td>
                <span class="badge rounded-pill bg-{{ $todo->is_completed ? 'success' : 'warning' }}">
                  {{ $todo->is_completed ? 'Selesai' : 'Belum Selesai' }}
                </span>
              </td>
              <td>
                <div class="btn-group">
                  <form class="d-inline" action="{{ route('todo.completed', $todo->idt) }}" method="POST">
                  @csrf
                  @method('PUT')
                    <button type="submit" class="btn btn-sm btn-{{ $todo->is_completed ? 'warning' : 'success' }}">
                      {{ $todo->is_completed ? 'Batalkan' : 'Selesaikan' }}
                    </button>
                  </form>
                  <a href="{{ route('todo.edit', $todo->idt) }}" type="button" class="btn btn-sm btn-info">Edit</a>
                  <button type="button" class="btn btn-sm btn-danger btn-delete" data-idt="{{ $todo->idt }}" data-name="{{ $todo->title }}">Hapus</button>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">Data tidak ditemukan.</td>
            </tr>
          @endforelse
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <div class="float-start">
      Tampil {{ $todos->firstItem() ?? 0 }} - {{ $todos->lastItem() ?? 0 }} dari {{ $todos->total() }} data
    </div>
    <div class="float-end">
      {{ $todos->links() }}
    </div>
  </div>
</div>

@include('pages.todo._delete')
@include('pages.todo._filter')
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {

      $('#btn-filter').click(function() {
        $('#modal-filter').modal('show');
      });

      $('.btn-delete').click(function() {
        $('#todo-name').text($(this).data('name'));
        $('#form-delete').attr('action', '/todo/' + $(this).data('idt'));
        $('#modal-delete').modal('show');
      });

    });
  </script>
@endsection
