@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                <a href="{{ route('admin.users.show', $user->id) }}">{{ $user->first }} {{ $user->last }}</a><br/>
                {{ $user->email }}

                Roles:
                    @if ($user->roles) 
                        @foreach ($user->roles as $role) 
                            {{ $role->name }} 
                        @endforeach 
                    @endif
            @endif
        </div>
    </div>
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
