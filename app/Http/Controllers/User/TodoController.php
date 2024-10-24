<?php

namespace App\Http\Controllers\User;

use App\Models\Todo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(Request $request) {

      $todos = Todo::query()
                    ->signed()
                    ->filterAndSearch($request)
                    ->select(['id', 'idt', 'title', 'is_completed', 'is_priority', 'deadline'])
                    ->orderBy('deadline', 'asc')
                    ->orderBy('created_at', 'asc')
                    ->paginate(10);

      return view('pages.todo.index',[
        'todos' => $todos
      ]);
    }

    public function create(){
      return view('pages.todo.create', [
        'todo' => new Todo(),
        'title' => 'Tambah',
      ]);
    }

    public function store(Request $request) {

      $request->validate([
        'title' => 'required',
        'deadline' => 'required|date',
        'is_priority' => 'required',
      ]);

      try {
        Auth::user()->todos()->create([
          'idt' => Str::uuid(),
          'title' => $request->title,
          'deadline' => $request->deadline,
          'is_priority' => $request->is_priority,
          'is_completed' => false,
        ]);
        return redirect(route('todo.index'))->with([
          'alert' => 'success',
          'alertMessage' => 'Todo berhasil ditambahkan!'
        ]);
      } catch (\Throwable $th) {
        return back()->with([
          'alert' => 'warning',
          'alertMessage' => 'Todo gagal ditambahkan!'
        ]);
      }
    }

    public function edit(Todo $todo){
      return view('pages.todo.edit', [
        'todo' => $todo,
        'title' => 'Edit',
      ]);
    }

    public function update(Request $request, Todo $todo) {
      $request->validate([
        'title' => 'required',
        'deadline' => 'required|date',
        'is_priority' => 'required',
        'is_completed' => 'required',
      ]);

      try {
        $todo->update([
          'title' => $request->title,
          'deadline' => $request->deadline,
          'is_priority' => $request->is_priority,
          'is_completed' => $request->is_completed,
        ]);
        return redirect(route('todo.index'))->with([
          'alert' => 'success',
          'alertMessage' => 'Todo berhasil diperbarui!'
        ]);
      } catch (\Throwable $th) {
        return back()->with([
          'alert' => 'warning',
          'alertMessage' => 'Todo gagal diperbarui!'
        ]);
      }
    }

    public function destroy(Todo $todo) {
      try {
        $todo->delete();
        return back()->with([
          'alert' => 'success',
          'alertMessage' => 'Todo berhasil di hapus!'
        ]);
      } catch (\Throwable $th) {
        return back()->with([
          'alert' => 'warning',
          'alertMessage' => 'Todo gagal di hapus!'
        ]);
      }
    }

    public function completed(Todo $todo) {
      try {
        $todo->update([ 'is_completed' => !$todo->is_completed ]);
        return back()->with([
          'alert' => 'success',
          'alertMessage' => 'Status berhasil diubah!'
        ]);
      } catch (\Throwable $th) {
        return back()->with([
          'alert' => 'warning',
          'alertMessage' => 'Status gagal diubah!'
        ]);
      }
    }

}
