@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</div>

                <div class="panel-body">          
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)

                                    <tr>
                                        <td><a href="{{ route('users.show', $user->id) }}">{{ $user->first }} {{ $user->last }}</a></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
