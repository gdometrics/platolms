@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">

        <div class="">
            <h2 class="page-header mb30">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</h2>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"></div>

            <div class="panel-body">
                You are logged in!
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
