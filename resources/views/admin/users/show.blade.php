@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</div>

                <div class="panel-body">          
                    @if ($user)
                        <a href="{{ route('users.show', $user->id) }}">{{ $user->first }} {{ $user->last }}</a><br/>
                        {{ $user->email }}
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
