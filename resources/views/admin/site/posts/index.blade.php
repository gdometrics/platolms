@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">All Posts</h2>
        </div>

        @include('layouts.partials.flash')      
        @include('admin.site.posts.partials.menu')

        <div class="content-box">          
            @include('admin.site.posts.partials.posts')
        </div>
    </div>

@endsection
