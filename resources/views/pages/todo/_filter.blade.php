<div class="modal fade" id="modal-filter" tabindex="-1" aria-labelledby="modal-filter" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-filter-label">Filter Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('todo.index') }}" method="GET" class="d-inline" id="form-filter">
        <div class="modal-body">
          <div class="form-floating mb-3">
            <select class="form-select" name="is_completed" id="is_completed">
              <option value="" {{ request('is_completed') == '' ? 'selected' : '' }}>-- Semua --</option>
              <option value="true" {{ request('is_completed') == 'true' ? 'selected' : '' }}>Selesai</option>
              <option value="false" {{ request('is_completed') == 'false' ? 'selected' : '' }}>Belum Selesai</option>
            </select>
            <label for="is_completed">Status</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" name="is_priority" id="is_priority">
              <option value="" {{ request('is_priority') == '' ? 'selected' : '' }}>-- Semua --</option>
              <option value="true" {{ request('is_priority') == 'true' ? 'selected' : '' }}>Prioritas</option>
              <option value="false" {{ request('is_priority') == 'false' ? 'selected' : '' }}>Bukan Prioritas</option>
            </select>
            <label for="is_priority">Urgensi</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" value="{{ request('deadline') }}" class="form-control" name="deadline" id="deadline">
            <label for="deadline">Deadline</label>
          </div>
        <input type="hidden" name="search" value="{{ request('search') }}">
        </div>
        <div class="modal-footer justify-content-end">
          <button type="submit" class="btn btn-primary">Terapkan</button>
        </div>
      </form>
    </div>
  </div>
</div>
