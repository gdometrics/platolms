<div class="main-sidebar">
    <h5>Administration</h5>
	<div class="list-group">
        <a href="{{ route('admin.admins.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'users')) active @endif">Admins</a>
        <a href="{{ route('admin.students.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'users')) active @endif">Students</a>
    </div>

    <h5>Portal</h5>
    <div class="list-group">
        <a href="{{ route('admin.pages.index') }}" class="list-group-item @if (isset($menuTab) && ($menuTab == 'pages')) active @endif">Pages</a>
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
