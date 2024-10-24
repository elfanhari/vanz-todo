
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <x-auth.head/>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <x-auth.darkmode/>

    <main class="form-signin w-100 m-auto">
      <a href="{{ route('home') }}">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      </a>
      @yield('content')
    </main>

    <x-auth.script/>
    @yield('js')
  </body>
</html>
