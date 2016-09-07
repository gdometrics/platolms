@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        <div class="content-box">          
            @if ($user)
                <a href="{{ route('users.show', $user->id) }}">{{ $user->first }} {{ $user->last }}</a><br/>
                {{ $user->email }}
            @endif
        </div>
    </div>
@endsection

@section('sidebar')
    <div class="{{ getColumns(4) }} mt40">
        <div class="panel panel-default">
            <div class="panel-heading">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</div>

            <div class="panel-body">          

            </div>

        </div>
    </div>
@endsection
