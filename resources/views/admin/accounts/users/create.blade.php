@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">Create User</h2>
        </div>

        @include('layouts.partials.flash')      

        <div class="content-box">          

            {!! Form::open(['route' => ['admin.users.store'], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                {!! makeTextField('first', 'First Name', '', '', 'required', $errors) !!}
                {!! makeTextField('last', 'Last Name', '', '', 'required', $errors)!!}
                {!! makeEmailField('email', 'Email', '', '', 'required', $errors) !!}

                {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection
