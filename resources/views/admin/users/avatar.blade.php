@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('layouts.partials.flash')      
        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                {!! Form::open(['route' => ['admin.users.update.avatar', $user->id], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                    <div class="row">
                        @if (Config::get('settings.user_image_policy') != '')
                            <div class="{{ getColumns(12) }}">
                                <div class="well">
                                    <h5>Image Policy</h5>
                                    <p>{!! Config::get('settings.user_image_policy') !!}</p>
                                </div>
                            </div>
                        @endif
                        <div class="{{ getColumns(2) }}">

                            @if (isset($user->img))
                                <?php $imgUrl = '/avatars/' . $user->id . '/' . $user->img; ?>
                            @else
                                <?php $imgUrl = ''; ?>
                            @endif
                            <img src="{!! $imgUrl !!}" class="img-responsive img-rounded">

                        </div>
                        <div class="{{ getColumns(4) }}">

                            <div class="form-group @if ($errors->has('avatar')) has-error has-feedback @endif">
                                <label class="control-label" for="avatar">Avatar</label><br/>
                                    {!! Form::file('avatar') !!}
                                <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                                <span id="inputError2Status" class="sr-only">(error)</span>
                            </div>

                            {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                        </div>
                        <div class="{{ getColumns(4) }}">
                        </div>                        
                    </div>

                {!! Form::close() !!}
            @else
                <p>Profile does not exist.</p>
            @endif
        </div>
    </div>
@endsection
