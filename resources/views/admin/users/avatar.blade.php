@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                {!! Form::open(['route' => ['admin.users.update.avatar', $user->id], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}


                    {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                {!! Form::close() !!}
            @else
                <p>Profile does not exist.</p>
            @endif
        </div>
    </div>
@endsection
