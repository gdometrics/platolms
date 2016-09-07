@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">Create User</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          

            {!! Form::open(['route' => ['users.store'], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                <div class="form-group">
                    <label for="first">First Name</label><br/>
                    {!! Form::text('first', '', ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="last">Last Name</label><br/>
                    {!! Form::text('last', '', ['required', 'placeholder' => '', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="email">Email</label><br/>
                    {!! Form::email('email', '', ['required', 'placeholder' => '', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
