    <div class="{{ getColumns(4) }} mt40">
        <div class="panel panel-default">
            <div class="panel-heading">{!! ucfirst(env('ADMIN_NAME')) !!} Dashboard</div>

            <div class="panel-body">          
                <h5>Accounts</h5>
				<div class="list-group">
				  <a href="{{ route('admin.users.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'users')) active @endif">Users</a>
                  <a href="{{ route('admin.roles.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'roles')) active @endif">Roles</a>
                </div>

                <h5>Blog</h5>
                <div class="list-group">
                  <a href="{{ route('admin.posts.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'posts')) active @endif">Posts</a>
                  <a href="" class="list-group-item @if (isset($menuTab) && ($menuTab == 'categories')) active @endif">Categories</a>
                  <a href="" class="list-group-item @if (isset($menuTab) && ($menuTab == 'tags')) active @endif">Tags</a>
                </div>

                <h5>Catalogue</h5>
                <div class="list-group">
                  <a href="" class="list-group-item @if (isset($menuTab) && ($menuTab == 'catalogues')) active @endif">Catalogues</a>
                </div>

                <h5>Courses</h5>
                <div class="list-group">
                  <a href="" class="list-group-item @if (isset($menuTab) && ($menuTab == 'courses')) active @endif">Courses</a>
                </div>

            </div>

        </div>
    </div>
