<!doctype html>
<html lang="en" data-bs-theme="auto">
  <x-main.head/>
  <body>
    <x-main.darkmode/>
    <x-main.navbar/>

    <main class="container">
      @yield('content')
    </main>

    <x-main.script/>
    @yield('js')
  </body>
</html>
