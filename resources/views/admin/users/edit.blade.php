@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">{{ $user->first }} {{ $user->last }}</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            @if ($user)
                {!! Form::open(['route' => ['users.update', $user->id], 'id' => 'form', 'method' => 'put', 'files' => 'true']) !!}

                    <div class="form-group">
                        <label for="first">First Name</label><br/>
                        {!! Form::text('first', $user->first, ['required', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="last">Last Name</label><br/>
                        {!! Form::text('last', $user->last, ['required', 'placeholder' => '', 'class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label><br/>
                        {!! Form::email('email', $user->email, ['required', 'placeholder' => '', 'class' => 'form-control']) !!}
                    </div>

                    <hr/>

                    <div class="form-group">
                        <label for="bio">Bio</label><br/>
                        {!! Form::text('bio', $user->bio, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="address">Address</label><br/>
                        {!! Form::text('address', $user->address, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="address_2">Address 2</label><br/>
                        {!! Form::text('address_2', $user->address_2, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="city">City</label><br/>
                        {!! Form::text('city', $user->city, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="state">State</label><br/>
                        {!! Form::text('state', $user->state, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="postal">Postal</label><br/>
                        {!! Form::text('postal', $user->postal, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="timezone">Timezone</label><br/>
                        {!! Form::text('timezone', $user->timezone, ['placeholder' => '', 'class' => 'form-control']) !!}
                    </div>                    

                    <div class="form-group">
                        <label for="phone">Phone</label><br/>
                        {!! Form::text('phone', $user->phone, ['placeholder' => '', 'class' => 'form-control']) !!}
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
