@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                {!! Form::open(['route' => ['users.update.auth', $user->id], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                    <div class="form-group">
                        <label for="password">Password</label><br/>
                        {!! Form::password('password', ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label><br/>
                        {!! Form::password('password_confirmation', ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="question">Question</label><br/>
                        {!! Form::text('question', $user->question, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="answer">Answer</label><br/>
                        {!! Form::text('answer', $user->answer, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

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
