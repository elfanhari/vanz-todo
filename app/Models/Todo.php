<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [
      'id',
    ];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(){
      return 'idt';
    }

    public function scopeSigned($query) {
      return $query->where('user_id', Auth::user()->id);
    }

    public function scopeFilterAndSearch($query, $request) {
      if ($request->is_completed) {
        $request->is_completed = $request->is_completed == "true" ? 1 : 0;
        $query->where('is_completed', $request->is_completed);
      }

      if ($request->is_priority) {
        $request->is_priority = $request->is_priority == "true" ? 1 : 0;
        $query->where('is_priority', $request->is_priority);
      }

      if ($request->deadline) {
        $query->where('deadline', $request->deadline);
      }

      if ($request->search) {
        $query->where('title', 'like', '%'.$request->search.'%');
      }

      return $query;
    }
}
