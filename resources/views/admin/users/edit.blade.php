@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('layouts.partials.flash')      

        <div class="content-box mt30">          
            @if ($user)
                <div class="row">

                    <div class="{{ getColumns(7) }}">

                        <h4 class="mb30 text-warning text-sub-header-color">Profile Information</h4>

                        {!! Form::open(['route' => ['admin.users.update', $user->id], 'id' => 'form', 'method' => 'put', 'files' => 'true']) !!}

                            <div class="row">
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('first', 'First Name', $user->first, '', 'required', $errors) !!}
                                </div>
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('last', 'Last Name', $user->last, '', 'required', $errors)!!}
                                </div>
                            </div>

                            {!! makeEmailField('email', 'Email', $user->email, '', 'required', $errors) !!}
    
                            <h4 class="mb30 text-warning text-sub-header-color" style="margin-top:60px">Extended Profile Information</h4>

                            {!! makeTextAreaField('bio', 'Tell your community a little about yourself', $user->bio, '', 'not-required', $errors) !!}

                            <div class="row">
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('address', 'Address', $user->address, '', 'not-required', $errors) !!}
                                </div>
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('address_2', 'Address 2', $user->address_2, '', 'not-required', $errors) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('city', 'City', $user->city, '', 'not-required', $errors) !!}
                                </div>
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('state', 'State', $user->state, '', 'not-required', $errors) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('postal', 'Postal Code', $user->postal, '', 'not-required', $errors) !!}
                                </div>
                                <div class="{{ getColumns(6) }}">
                                    {!! makeTextField('phone', 'Phone', $user->phone, '', 'not-required', $errors) !!}           
                                </div>
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                        {!! Form::close() !!}
                    </div>
                    <div class="{{ getColumns(5) }}">
                        {!! Form::open(['route' => ['admin.users.update.avatar', $user->id], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                            <div class="row">

                                <div class="{{ getColumns(12) }}">
                                    <h4 class="mb30 text-warning text-sub-header-color">Profile Avatar</h4>
                                </div>

                                @if (Config::get('settings.user_image_policy') != '')
                                    <div class="{{ getColumns(12) }}">
                                        <div class="well">
                                            <h5>Image Policy</h5>
                                            <p>{!! Config::get('settings.user_image_policy') !!}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="{{ getColumns(6) }}">
                                    {!! getUserImage($user->id, $user->img, $user->email, 400, 'float-left img-rounded img-responsive') !!}
                                </div>
                                <div class="{{ getColumns(6) }}">

                                    <div class="form-group @if ($errors->has('avatar')) has-error has-feedback @endif">
                                        <label class="control-label" for="avatar">Upload New Image</label><br/>
                                            {!! Form::file('avatar') !!}
                                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                        <span id="inputError2Status" class="sr-only">(error)</span>
                                    </div>

                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>          
            @else
                <p>Profile does not exist.</p>
            @endif
        </div>
    </div>
@endsection
