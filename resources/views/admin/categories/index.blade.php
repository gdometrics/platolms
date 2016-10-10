@extends('layouts.app')

@section('content')
    <div class="primary-content" id="page-content">
        <div class="">
            <h2 class="page-header mb30">All Categories
            <span class="pull-right">
                <small>
                    <span style="font-size:70%;font-weight:700;">
                            <a @click.prevent="addCategory(event)"><i class="fa fa-sitemap"></i> &nbsp; New Category</a>
                    </span>
                </small>
            </span>
       </h2>
        </div>

        @include('layouts.partials.flash')      

        <div class="content-box">          
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th># of Posts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)

                            <tr>
                                <td><a href="">{{ $category->title }}</a></td>
                                <td><a href="">{{ $category->posts->count() }}</a></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    
    <script>
            var slugify = function(str) {
                var $slug = '';
                var trimmed = $.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }
            // SweetAlert -> Send the AJAX Call to Delete the User w/ Confirmation & Error States
            var categories = {!! $categories !!}
            const adminURI = "{!! env('ADMIN_URI') !!}";

            const vm = new Vue({
                el: '#page-content',
                data: {
                    name: 'Vue.js',
                    categories: categories,
                },
                // define methods under the `methods` object
                methods: {
                    addCategory: function(event)
                    {
                        swal({
                            title: 'Add New Category',
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'Submit',
                            showLoaderOnConfirm: true,
                            preConfirm: function(category) {
                                return new Promise(function(resolve, reject) {
                                    setTimeout(function() {
                                        for( var id in categories) {
                                            if (categories[id].title == category)
                                            {
                                                reject('This category is already in use.');
                                            }
                                            //console.log( key + ": " + value.title );
                                        };
                                        resolve();
                                    }, 2000);
                            });
                        },
                          allowOutsideClick: false
                        }).then(function(category) {
                            // Send the AJAX that deletes the user
                            var slugifiedTitle = slugify(category);
                            Vue.http.post('/' + adminURI + '/categories', {'title': category, 'slug': slugifiedTitle}).then((response) => {
                                // Add the button to the row
                                console.log(response);
                            }, (response) => {
                                console.log(response);
                                // error callback
                                swal(
                                    'Sorry!',
                                    'There was an error with your request!',
                                    'error'
                                )
                            });
                        })
                    },
                }
            })

    </script>
@endsection