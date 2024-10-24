@if (session('alert'))
<div class="alert alert-{{ session('alert') }} alert-dismissible fade show" role="alert">
  {{ session('alertMessage') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
