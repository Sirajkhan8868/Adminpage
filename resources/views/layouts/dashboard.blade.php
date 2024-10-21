@extends('layouts.auth')


@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
@endsection

@section('content')
    <!-- Header -->
    <header class="main-header" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
            <!-- Sidebar toggle button -->
            <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
            </button>

            <span class="page-title">dashboard</span>

            <div class="navbar-right ">

                <!-- search form -->
                <div class="search-form">
                    <form action="index.html" method="get">
                        <div class="input-group input-group-sm" id="input-group-search">
                            <input type="text" autocomplete="off" name="query" id="search-input" class="form-control"
                                placeholder="Search..." />
                            <div class="input-group-append">
                                <button class="btn" type="button">/</button>
                            </div>
                        </div>
                    </form>
                    <ul class="dropdown-menu dropdown-menu-search">

                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Morbi leo risus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Dapibus ac facilisis in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Porta ac consectetur ac</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Vestibulum at eros</a>
                        </li>

                    </ul>

                </div>

                <ul class="nav navbar-nav">
                    <!-- Offcanvas -->
                    <li class="custom-dropdown">
                        <a class="offcanvas-toggler active custom-dropdown-toggler" data-offcanvas="contact-off"
                            href="javascript:">
                            <i class="mdi mdi-contacts icon"></i>
                        </a>
                    </li>
                    <li class="custom-dropdown">
                        <!-- User Account -->
                    <li class="dropdown user-menu">
                        <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <img src="{{ asset('assets/auth/images/user/user-xs-01.jpg') }}"
                                class="user-image rounded-circle" alt="User Image" />
                            <span class="d-none d-lg-inline-block">John Doe</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a class="dropdown-link-item" href="user-profile.html">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span class="nav-text">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-link-item" href="email-inbox.html">
                                    <i class="mdi mdi-email-outline"></i>
                                    <span class="nav-text">Message</span>
                                    <span class="badge badge-pill badge-primary">24</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-link-item" href="user-activities.html">
                                    <i class="mdi mdi-diamond-stone"></i>
                                    <span class="nav-text">Activitise</span></a>
                            </li>
                            <li>
                                <a class="dropdown-link-item" href="user-account-settings.html">
                                    <i class="mdi mdi-settings"></i>
                                    <span class="nav-text">Account Setting</span>
                                </a>
                            </li>

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

    <!-- ====================================
      ——— CONTENT WRAPPER
      ===================================== -->
    <div class="content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card" style="height: 140px">
                        <div class="card-header">
                            <h2>{{ $postsCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Post</span>
                                <i class="fa-solid fa-address-card"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card" style="height: 140px">
                        <div class="card-header">
                            <h2>{{ $tagsCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Tags</span>
                                <i style="font-size: 16px" class="fa-solid fa-tag"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card" style="height: 140px">
                        <div class="card-header">
                            <h2>{{ $categoriesCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Categories</span>
                                <i class="fa-solid fa-list"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card" style="height: 140px">
                        <div class="card-header">
                            <h2>{{ $usersCount }}</h2>
                            <div class="sub-title">
                                <span class="mr-1">User</span>
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>

    {{-- <!-- Footer -->
      <footer class="footer mt-auto">
        <div class="copyright bg-white">
          <p>
            &copy; <span id="copy-year"></span> Copyright Mono Dashboard Bootstrap Template by <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Abdus</a>.
          </p>
        </div>
        <script>
            var d = new Date();
            var year = d.getFullYear();
            document.getElementById("copy-year").innerHTML = year;
        </script>
      </footer> --}}
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/chart.js') }}"></script>

    <script>
        $(document).click(function() {
            $('#button-button').click(function() {
                $('#button-form').submit();
            });
        });
    </script>
@endsection
