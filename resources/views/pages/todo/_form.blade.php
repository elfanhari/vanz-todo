<div class="form-floating mb-3">
  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $todo->title) }}" id="title" placeholder="Membuat ERD" required {{ Request::is('todo/create') ? 'autofocus' : ''}}>
  <label for="title">Todo</label>
  @error('title')
    <span class="invalid-feedback mb-1"> {{ $message }} </span>
  @enderror
</div>

<div class="form-floating mb-3">
  <input type="date" value="{{ old('deadline', $todo->deadline ?? date('Y-m-d') ) }}" class="form-control @error('deadline') is-invalid @enderror" name="deadline" id="deadline" required>
  <label for="deadline">Deadline</label>
  @error('deadline')
    <span class="invalid-feedback mb-1"> {{ $message }} </span>
  @enderror
</div>

<div class="form-floating">
  <select class="form-select @error('is_priority') is-invalid @enderror" name="is_priority" id="is_priority" required>
    <option value="" {{ old('is_priority', $todo->is_priority) == '' ? 'selected' : '' }}>-- Pilih --</option>
    <option value="0" {{ old('is_priority', $todo->is_priority) == '0' ? 'selected' : '' }}>Bukan Prioritas</option>
    <option value="1" {{ old('is_priority', $todo->is_priority) == '1' ? 'selected' : '' }}>Prioritas</option>
  </select>
  <label for="is_priority">Urgensi</label>
  @error('is_priority')
    <span class="invalid-feedback mb-1"> {{ $message }} </span>
  @enderror
</div>

@if ($title == 'Edit')
  <div class="form-floating mt-3">
    <select class="form-select @error('is_completed') is-invalid @enderror" name="is_completed" id="is_completed" required>
      <option value="" {{ old('is_completed', $todo->is_completed) == '' ? 'selected' : '' }}>-- Pilih --</option>
      <option value="1" {{ old('is_completed', $todo->is_completed) == '1' ? 'selected' : '' }}>Selesai</option>
      <option value="0" {{ old('is_completed', $todo->is_completed) == '0' ? 'selected' : '' }}>Belum Selesai</option>
    </select>
    <label for="is_completed">Status</label>
    @error('is_completed')
      <span class="invalid-feedback mb-1"> {{ $message }} </span>
    @enderror
  </div>
@endif
