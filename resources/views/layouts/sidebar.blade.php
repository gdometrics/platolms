    <div class="{{ getColumns(4) }} mt40">
        <div class="panel panel-default">
            <div class="panel-heading">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</div>

            <div class="panel-body">          
				<div class="list-group">
				  <a href="{{ route('users.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'users')) active @endif">Users</a>
                  <a href="{{ route('roles.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'roles')) active @endif">Roles</a>
				</div>            	
            </div>

        </div>
    </div>
