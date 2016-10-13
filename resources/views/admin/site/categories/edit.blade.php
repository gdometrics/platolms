@extends('layouts.app')

@section('content')
    <div class="primary-content">
        <div class="">
            <h2 class="page-header mb30">{{ $category->title }}</h2>
        </div>

        @include('layouts.partials.flash')      

        <div class="content-box mt30">          
            @if ($category)
                <div class="row">
                    <div class="{{ getColumns(4) }}">
                        <h4 class="mb30 text-warning text-sub-header-color">Category Information</h4>

                        {!! Form::open(['route' => ['admin.categories.update', $category->id], 'id' => 'form', 'method' => 'put']) !!}

                            {!! makeTextField('title', 'Category Title', $category->title, '', 'required', $errors) !!}

                            {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}

                        {!! Form::close() !!}
                    </div>
                    <div class="{{ getColumns(8) }}">
                        @include('admin.site.posts.partials.posts', ['posts' => $category->posts])
                    </div>
                </div>          
            @else
                <p>Category does not exist.</p>
            @endif
        </div>
    </div>
@endsection
