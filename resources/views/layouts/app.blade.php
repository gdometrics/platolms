@include('layouts.partials.app-header')

    @include('layouts.partials.flash')	    

    @include('layouts.partials.app-sidebar')

    @yield('content')

@include('layouts.partials.app-footer')