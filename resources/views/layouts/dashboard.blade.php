@extends('layouts.auth')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
@endsection

@section('content')
    <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <span class="page-title">Dashboard</span>


            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user-menu">
                        <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                class="user-image rounded-circle" alt="User Image" />
                            <span class="d-none d-lg-inline-block">John Doe</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-footer">
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a id="logout-button" class="dropdown-link-item" href="javascript:void(0)"> <i
                                            class="mdi mdi-logout"></i> Log Out </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="content">
            <div class="row">
                @foreach (['Posts' => $postsCount, 'Tags' => $tagsCount, 'Categories' => $categoriesCount, 'Users' => $usersCount] as $title => $count)
                    <div class="col-xl-3 col-sm-6">
                        <div class="card card-default" style="height: 140px">
                            <div class="card-header">
                                <h2>{{ $count }}</h2>
                                <div class="sub-title">
                                    <span class="mr-1">{{ $title }}</span>
                                    <i class="fa-solid fa-{{ strtolower($title) }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <h1 class="text-center">Blog Post</h1>
        </div>

        <div class="card-body bg-white m-6 ">

            @if (count($posts) > 0)
                <table class="table" id="posts">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center text-danger">No Post found..</h3>
            @endif

        </div>



    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
@endsection
