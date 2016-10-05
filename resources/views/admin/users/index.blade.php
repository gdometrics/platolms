@extends('layouts.app')

@section('styles')
<style>
    #user-table { margin-bottom:20px; }
    #user-table_length, #user-table_info { padding-left:8px; }
    #user-table_filter, #user-table_paginate { padding-right:8px; }
</style>
@endsection

@section('content')
    <div class="primary-content" id="page-content">
        <h2 class="page-header mb30">All Users
            <span class="pull-right">
                <small><span style="text-transform:uppercase;font-size:70%;font-weight:700;"><i class="fa fa-users"></i> Total Users: <span class="font-weight:400">{{ $users->count() }}</span></span></small>
            </span>
        </h2>

        @include('layouts.partials.flash')      
        @include('admin.users.partials.menu')

        <div class="content-box">      

            <div class="row">
                <div class="user-heading text-left {{ getColumns(6) }}" style="padding-left: 24px;">
                    <p style="top: 46px;position: relative;"><strong>Users</strong></p>
                </div>
                <div class="user-actions text-right {{ getColumns(6) }}">
                    <ul class="breadcrumb" style="background:transparent;margin-bottom: 0px;padding-right:8px;">
                        <li><a class="btn btn-link" v-bind:class="areUsersSelected(selectedUsers)" style="padding:0px;" @click.prevent="deleteMultipleUsers(event)">Delete All</a></li>
                        <li><a href="" class="btn btn-link" v-bind:class="areUsersSelected(selectedUsers)" style="padding:0px;" @click.prevent="assignRoleToMultipleUsers(event, selectedUsers)">Assign Role</a></li>
                        <li><a href="" class="btn btn-link" v-bind:class="areUsersSelected(selectedUsers)" style="padding:0px;" @click.prevent="assignTagToMultipleUsers(event)">Assign Tag</a></li>
                </div>
            </div>

            <div class="table-responsive">
                <table id="user-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 30px;"></th>
                            <th style="width: 40px;"></th>
                            <th></th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)

                            <tr id="{{ $user->id }}">
                                <td style="padding-top: 21px;text-align: center;"><input v-bind:class="shouldInputBoxBeChecked(selectedUsers)" class="checkbox-{{ $user->id }}" value="{{ $user->id }}" id="{{ $user->id }}" type="checkbox" v-model="selectedUsers"></td>
                                <td>
                                    {!! getUserImage($user->id, $user->img, $user->email, 45, 'float-left img-circle') !!}
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.show', $user->id) }}">
                                    {{ $user->first }} {{ $user->last }}</a> 
                                    <br/>
                                    <small>{{ $user->email }}</small> <span id="rolediv-{{ $user->id }}">@foreach ($user->roles as $role) {!! makeRoleLabel($role->name, false) !!} @endforeach</span>
                                </td>
                                <td class="text-right" style="padding-top: 15px;">
                                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-success btn-sm"><i class="fa fa-globe"></i></a>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('admin.users.edit.auth', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-lock"></i></a>
                                    <a class="btn btn-danger btn-sm" @click.prevent="confirmDelete({!! $user->id !!}, $event)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-right plato-pagination">
                {{ $users->links() }}
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
            // SweetAlert -> Send the AJAX Call to Delete the User w/ Confirmation & Error States
            const userArchiveLimit = {!! Config::get('settings.user_archive_limit') !!};
            const adminURI = "{!! env('ADMIN_URI') !!}";
            const roles = {!! $roles !!};
            var selectedUsers = [];

            const vm = new Vue({
                el: '#page-content',
                data: {
                    name: 'Vue.js',
                    selectedUsers: selectedUsers,
                    roles: roles,
                },
                // define methods under the `methods` object
                methods: {
                    areUsersSelected: function(selectedUsers)
                    {
                        return selectedUsers.length > 0 ? 'enabled' : 'disabled';
                    },
                    shouldInputBoxBeChecked: function(selectedUsers)
                    {
                        return selectedUsers.length > 0 ? 'checked' : 'unchecked';
                    },
                    deleteMultipleUsers: function (event) {
                        swal({
                            title: 'Are you sure?',
                            text: "The users, and their information, will be removed from the archive in " + userArchiveLimit + " days!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success mr20',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false
                        })
                        .then(function() {
                            // Send the AJAX that deletes the user
                            Vue.http.post('/' + adminURI + '/users/delete/multiple', {'users': selectedUsers}).then((response) => {
                                for (var id in selectedUsers)
                                {
                                    $('#' + selectedUsers[id]).hide();
                                }
                                swal({
                                    title: 'Archive Complete',
                                    text: "This users have been archived.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Got it!',
                                    confirmButtonClass: 'btn btn-success',
                                    buttonsStyling: false
                                })
                            }, (response) => {
                                console.log(response);
                                // error callback
                                swal(
                                    'Sorry!',
                                    'There was an error with your request!',
                                    'error'
                                )
                            });
                        }, function(dismiss) {
                            //
                        })
                    },
                    assignRoleToMultipleUsers: function (event, passedUsers) {

                        roleSelectBoxes = '<p>The following role will be added to the user(s) if they do not already have the role. No roles will be removed from user accounts.</p>';
                        for (var role in roles)
                        {
                            roleSelectBoxes = roleSelectBoxes + '<div class="col-md-12" style="text-align: left;border: 1px solid #ececec;padding-top: 10px;padding-bottom: 10px;margin-top:-1px">';
                            roleSelectBoxes = roleSelectBoxes + '<input class="multi-select-role" type="checkbox" name="multi-select-role[]" value=' + roles[role].id + '>&nbsp; <label>' + roles[role].name + '</label>';
                            roleSelectBoxes = roleSelectBoxes + '</div>';
                        }
                        swal({
                            title: 'Role Selection',
                            html: '<div class="row mt30" style="padding-right:20px;padding-left:20px;">' + roleSelectBoxes + '</div>',
                        })
                        .then(function() {
                            // Send the AJAX that deletes the user
                            Vue.http.post('/' + adminURI + '/users/attach/roles', {'users': passedUsers, 'role': $('.multi-select-role:checked').map(function() {return this.value;}).get()}).then((response) => {
                                success = JSON.parse(response.body).success;
                                if (!success)
                                {
                                    console.log(response);
                                    // error callback
                                    swal(
                                        'Sorry!',
                                        'There was an error with your request = !',
                                        'error'
                                    )
                                } else {
                                    returnedUsers = JSON.parse(response.body).returnedUsers;
                                    for (var user in returnedUsers)
                                    {
                                        $('#rolediv-' + returnedUsers[user].id).html(returnedUsers[user].roles);
                                    }
                                    var i = selectedUsers.length
                                    while (i--) {
                                        selectedUsers.splice(i, 1);
                                    }
                                    swal({
                                        title: 'Roles Added',
                                        text: "This users have been updated with the selected roles.",
                                        type: 'success',
                                        showCancelButton: false,
                                        confirmButtonText: 'Got it!',
                                        confirmButtonClass: 'btn btn-success',
                                        buttonsStyling: false
                                    })
                                }
                            }, (response) => {
                                console.log(response);
                                // error callback
                                swal(
                                    'Sorry!',
                                    'There was an error with your request!',
                                    'error'
                                )
                            });
                        }, function(dismiss) {
                            //
                        })
                    },
                    assignTagToMultipleUsers: function (event) {
                        // send selected users to array
                    },
                    confirmDelete: function (id, event) {
                        swal({
                            title: 'Are you sure?',
                            text: "The user, and their information, will be removed from the archive in " + userArchiveLimit + " days!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete it!',
                            cancelButtonText: 'No, cancel!',
                            confirmButtonClass: 'btn btn-success mr20',
                            cancelButtonClass: 'btn btn-danger',
                            buttonsStyling: false
                        })
                        .then(function() {
                            // Send the AJAX that deletes the user
                            Vue.http.delete('/' + adminURI + '/users/' + id, {}).then((response) => {
                                $('#' + id).hide();
                                swal({
                                    title: 'Archive Complete',
                                    text: "This user has been archived.",
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonText: 'Got it!',
                                    confirmButtonClass: 'btn btn-success',
                                    buttonsStyling: false
                                })
                            }, (response) => {
                                console.log(response);
                                // error callback
                                swal(
                                    'Sorry!',
                                    'There was an error with your request!',
                                    'error'
                                )
                            });
                        }, function(dismiss) {
                            //
                        })
                    }
                }
            })

    </script>
@endsection