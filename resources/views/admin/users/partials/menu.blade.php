        <div class="sub-menu">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.users.index') }}">All Users</a></li>
                @if (isset($user))
	                <li><a href="{{ route('admin.users.show', $user->id) }}">Show User</a></li>
	                <li><a href="{{ route('admin.users.edit', $user->id) }}">Edit User</a></li>
	                <li><a href="{{ route('admin.users.edit.auth', $user->id) }}">Authentication</a></li>
	                <li><a href="{{ route('admin.users.edit.avatar', $user->id) }}">Avatar</a></li>
                @endif
                <li><a href="{{ route('admin.users.create') }}">Create New User</a></li>
                <li><a href="{{ route('admin.users.import') }}">Import Users</a></li>
            </ul>
        </div>