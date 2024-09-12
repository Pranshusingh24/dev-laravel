@include('common.header')

@include('common.sidebar')

@hasSection('content')
    @yield('content')
@endif

@include('common.footer')