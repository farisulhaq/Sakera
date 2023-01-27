<!DOCTYPE html>
<html lang="en">

<head>
  @include('template.partial.head')
  @yield('style')
</head>

<body>
  <script src="{{ asset('assets/js/initTheme.js') }}"></script>
  <div id="app">
    {{-- sidebar start --}}
    @include('template.partial.sidebar')
    {{-- sidebar end --}}

    {{-- content start --}}
    <div id="main">
      @yield('content')
      @include('template.partial.footer')
    </div>
    {{-- content end --}}

    {{-- footer --}}

  </div>

  {{-- script start --}}
  @include('template.partial.script')
  @yield('script')

  {{-- script end --}}


</body>


</html>
