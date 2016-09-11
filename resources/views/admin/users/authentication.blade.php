@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(9) }}">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                {!! Form::open(['route' => ['admin.users.update.auth', $user->id], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                    {!! makePasswordField('password', 'Password', '', '', 'required', $errors) !!}
                    {!! makePasswordField('password_confirmation', 'Password Confirmation', '', '', 'required', $errors) !!}
                    {!! makeTextField('question', 'Security Question', $user->question, '', 'required', $errors) !!}
                    {!! makeTextField('answer', 'Security Answer', $user->answer, '', 'required', $errors) !!}

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                {!! Form::close() !!}
            @else
                <p>Profile does not exist.</p>
            @endif
        </div>
    </div>
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
