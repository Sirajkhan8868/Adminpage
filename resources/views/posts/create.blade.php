@extends('layouts.auth')


@section('title', 'Create post | Admin Dashboard')

@section('styles')

  <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">

@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content">
            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Post</h2>
                    <a class="btn mdi mdi-code-tags" data-toggle="collapse" href="#collapse-input-musk" role="button"
                        aria-expanded="false" aria-controls="collapse-input-musk"> </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="email" name="title" value="{{ old('title') }}" autocomplete="off"
                                placeholder="Title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="3" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Is_publish</label>
                            <select name="Is_publish" class="form-control">
                                <option value="" disabled selected>Choose Option</option>
                                <option value="1">Publish</option>
                                <option value="0">Draft</option>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection



@section('scripts')

    <script src="{{asset('assets/auth/js/multi-dropdown.js')}}"></script>

@endsection
