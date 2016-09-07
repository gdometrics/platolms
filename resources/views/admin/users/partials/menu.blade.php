        <div class="sub-menu">
            <ul class="breadcrumb">
                <li><a href="{{ route('users.index') }}">All Users</a></li>
                @if (isset($user))
	                <li><a href="{{ route('users.show', $user->id) }}">Show User</a></li>
	                <li><a href="{{ route('users.edit', $user->id) }}">Edit User</a></li>
	                <li><a href="{{ route('users.edit.auth', $user->id) }}">Authentication</a></li>
	                <li><a href="{{ route('users.edit.avatar', $user->id) }}">Avatar</a></li>
                @endif
                <li><a href="{{ route('users.create') }}">Create New User</a></li>
            </ul>
        </div>