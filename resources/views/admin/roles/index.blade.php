@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">All Roles</h2>
        </div>

        @include('admin.roles.partials.menu')

        <div class="content-box">          
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Population</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)

                            <tr>
                                <td><a href="">{{ $role->name }}</a></td>
                                <td>{{ $role->users->count() }}</td>
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
