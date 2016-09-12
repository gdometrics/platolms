@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">All Users</h2>
        </div>

        @include('admin.users.partials.menu')

        <div class="content-box">          
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 62px;padding-left:15px">User</th>
                            <th style="width: 40px;"></th>
                            <th></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                            <tr>
                                <td style="padding-top: 20px;text-align: center;">
                                    {!! makeRoleLabel($user->getHighestRole()['name'], true) !!}
                                </td>
                                <td>
                                    {!! getUserImage($user->id, 45, 'float-left img-circle') !!}
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->first }} {{ $user->last }}</a> 
                                    <br/>
                                    <small>{{ $user->email }}</small>
                                </td>
                                <td class="text-right" style="padding-top: 15px;">
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
