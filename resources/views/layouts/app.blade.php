@include('layouts.header')

    @include('layouts.partials.flash')	    

    @yield('content')

    @yield('sidebar')

@include('layouts.footer')