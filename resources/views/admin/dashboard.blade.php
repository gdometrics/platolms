@extends('layouts.app')

@section('content')
    <div class="primary-content" id="page-content">
        <h2 class="page-header mb30">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</h2>

        @include('layouts.partials.flash')

        <div class="content-box">      
            You are logged in!
        </div>
    </div>
@endsection
