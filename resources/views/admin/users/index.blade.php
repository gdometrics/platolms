@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(9) }}">
        <div class="">
            <h2 class="page-header mb30">All Users</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Person</th>
                            <th>Role</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="{{ getColumns(2) }}">
                                            {!! getUserImage($user->id, 45, 'float-left') !!}
                                        </div>
                                        <div class="{{ getColumns(10) }}" style="padding-left:0px;">
                                            <a href="{{ route('admin.users.show', $user->id) }}">
                                            {{ $user->first }} {{ $user->last }}</a> 
                                            <br/>
                                            <small>{{ $user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="label label-success">{{ $user->getHighestRole()['name'] }}</span></td>
                                <td class="text-right">
                                    <a href="" class="btn btn-success btn-sm"><i class="fa fa-globe"></i></a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-lock"></i></a>
                                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-user"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
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

