<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon/favicon.png') }}" type="image/x-icon">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title><link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/font-awesome.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('/assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://kit.fontawesome.com/41598deaa9.css" crossorigin="anonymous">
    @stack('page-css')
  </head>
  <body>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"> </div>
      <div class="dot"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Tivo .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            <div class="logo-header-main"><a href="index.html"><img class="img-fluid for-light img-100" src="../assets/images/logo/logo2.png" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo.png" alt=""></a></div>
          </div>



          <div class="left-header col horizontal-wrapper ps-0">
            <div class="left-menu-header">
              <ul class="header-left">
                <li style="cursor:default;"><span class="f-w-600">{{ Auth::user()->region->description }}</span><span><i class="middle" data-feather="arrow-right"></i></span></li>
                <li style="cursor:default;"><span class="f-w-600">{{ Auth::user()->province->description }}</span><span><i class="middle" data-feather="arrow-right"></i></span></li>
                <li style="cursor:default;"><span class="f-w-600">{{ Auth::user()->municipality->description }}</span><span><i class="middle" data-feather="arrow-right"></i></span></li>
                <li style="cursor:default;"><span class="f-w-600">{{ Auth::user()->barangays->description }}</span><span></span></li>
              </ul>
            </div>
          </div>




          <div class="nav-right col-6 pull-right right-header p-0">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="message"><i data-feather="message-square"></i></div>
                <ul class="message-dropdown onhover-show-div">
                  <li><i data-feather="message-square">            </i>
                    <h6 class="f-18 mb-0">Messages</h6>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/3.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Emay Walter</a></h5>
                        <p>Do you want to go see movie?</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/6.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Jason Borne</a></h5>
                        <p>Thank you for rating us.</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li>
                    <div class="d-flex align-items-start">
                      <div class="message-img bg-light-primary"><img src="../assets/images/user/10.jpg" alt=""></div>
                      <div class="flex-grow-1">
                        <h5 class="mb-1"><a href="email_inbox.html">Sarah Loren</a></h5>
                        <p>What`s the project report update?</p>
                      </div>
                      <div class="notification-right"><i data-feather="x"></i></div>
                    </div>
                  </li>
                  <li><a class="btn btn-primary" href="email_inbox.html">Check Messages</a></li>
                </ul>
              </li>
              <li class="maximize"><a href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
              <li class="profile-nav onhover-dropdown">
                <div class="account-user"><i data-feather="user"></i></div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="user-profile.html"><i data-feather="user"></i><span>Account</span></a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i><span>Log out</span></a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <!-- Page Header Ends-->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="../assets/images/logo/logo.png" alt=""></a>
              <div class="back-btn"><i data-feather="grid"></i></div>
              <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="menu-box">
                    <ul>
                    <li class="sidebar-list">  <a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                    <li class="sidebar-list">  <a class="sidebar-link sidebar-title link-nav" href="{{ route('user.barangay.official') }}"><i data-feather="user"> </i><span>Barangay Official</span></a></li>
                    <li class="sidebar-list">  <a class="sidebar-link sidebar-title link-nav" href="{{ route('user.barangay.information') }}"><i data-feather="info"> </i><span>Barangay Info</span></a></li>
                    <li class="sidebar-list">  <a class="sidebar-link sidebar-title link-nav" href="{{ route('user.resident.information') }}"><i data-feather="user"> </i><span>Resident Info</span></a></li>
                    <li class="sidebar-list">  <a class="sidebar-link sidebar-title link-nav" href="{{ route('user.blotter.report') }}"><i data-feather="voicemail"> </i><span>Blotter Record</span></a></li>
                    </ul>
                  </li>
                  <li class="menu-box">
                    <ul>
                      <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="{{ route('user.certificate') }}"><i data-feather="archive"></i><span>Certificate</span></a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->

        @yield('content')

        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 p-0 footer-left">
                <p class="mb-0">Copyright © 2023 Tivo. All rights reserved.</p>
              </div>
              <div class="col-md-6 p-0 footer-right">
                <p class="mb-0">Hand-crafted & made with <i class="fa fa-heart font-danger"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="{{ asset('/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('/assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ asset('/assets/js/config.js') }}"></script>
    <script src="{{ asset('/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('/assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('/assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('page-scripts')
  </body>
</html>
