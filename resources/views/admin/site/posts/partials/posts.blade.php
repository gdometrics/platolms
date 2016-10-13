            @if ($posts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                                <tr>
                                    <td><a href="">{{ $post->name }}</a></td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>There are no posts.</p>
            @endif