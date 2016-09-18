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
                {!! Form::open(['route' => ['admin.users.update', $user->id], 'id' => 'form', 'method' => 'put', 'files' => 'true']) !!}

                    {!! makeTextField('first', 'First Name', $user->first, '', 'required', $errors) !!}
                    {!! makeTextField('last', 'Last Name', $user->last, '', 'required', $errors)!!}
                    {!! makeEmailField('email', 'Email', $user->email, '', 'required', $errors) !!}

                    <hr/>

                    {!! makeTextField('bio', 'Tell your community a little about yourself', $user->bio, '', 'not-required', $errors) !!}
                    {!! makeTextField('address', 'Address', $user->address, '', 'not-required', $errors) !!}
                    {!! makeTextField('address_2', 'Address 2', $user->address_2, '', 'not-required', $errors) !!}
                    {!! makeTextField('city', 'City', $user->city, '', 'not-required', $errors) !!}
                    {!! makeTextField('state', 'State', $user->state, '', 'not-required', $errors) !!}
                    {!! makeTextField('postal', 'Postal Code', $user->postal, '', 'not-required', $errors) !!}
                    {!! makeTextField('timezone', 'Timezone', $user->timezone, '', 'not-required', $errors) !!}
                    {!! makeTextField('phone', 'Phone', $user->phone, '', 'not-required', $errors) !!}           

                    {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

                {!! Form::close() !!}
            @else
                <p>Profile does not exist.</p>
            @endif
        </div>
    </div>
@endsection
