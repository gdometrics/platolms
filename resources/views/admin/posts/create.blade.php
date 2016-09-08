@extends('layouts.app')

@section('content')
    <div class="{{ getColumns(8) }}">
        <div class="">
            <h2 class="page-header mb30">New Posts</h2>
        </div>

        @include('admin.posts.partials.menu')

        <div class="content-box">          
            
            {!! Form::open(['route' => ['admin.posts.store'], 'id' => 'form', 'method' => 'post', 'files' => 'true']) !!}

                <div class="form-group">
                    <label for="title">Post Title</label><br/>
                    {!! Form::text('title', '', ['required', 'class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="content">Content</label><br/>
                    {!! Form::textarea('content', '', ['required', 'placeholder' => '', 'class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection
