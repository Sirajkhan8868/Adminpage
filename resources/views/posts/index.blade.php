@extends('layouts.auth')

@section('title', 'posts')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Posts</h2>
                </div>
                <div class="card-body">

                    @if (count($posts) > 0)
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Username</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                             <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->status ==1 ? 'Active': 'inActive' }}</td>
                             </tr>

                            @endforeach
                        </tbody>
                      </table>
                    @else
                    <h3 class="text-center text-danger">No Post found..</h3>
                    @endif

                </div>

            </div>
        </div>
    </div>

@endsection
