@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">All Users</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
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

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
