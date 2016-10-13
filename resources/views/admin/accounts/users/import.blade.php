@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">Import Users</h2>
        </div>

        @include('layouts.partials.flash')      

        <div class="content-box">          

            {!! Form::open(['route' => ['admin.users.upload.multiple'], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                <div class="row">
                    <div class="{{ getColumns(4) }}">
                        <div class="form-group @if ($errors->has('file')) has-error has-feedback @endif">
                            <label class="control-label" for="avatar">Upload File</label><br/>
                                {!! Form::file('file') !!}
                            <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                            <span id="inputError2Status" class="sr-only">(error)</span>
                        </div>

                        {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                    </div>
                </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
