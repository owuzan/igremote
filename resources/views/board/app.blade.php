@php($user = Auth::user())
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- core:css -->
    <link rel="stylesheet" href="/assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/fonts/feather-font/css/iconfont.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/favicon.png"/>
    @yield('head')

</head>

<body>
<div class="main-wrapper">

    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('dashboard') }}" class="sidebar-brand">IG<span>Remote</span></a>
            <div class="sidebar-toggler not-active">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Admin</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="link-icon" data-feather="home"></i>
                        <span class="link-title">{{ Lang::get('app.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item nav-category">IGRemote</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="activity"></i>
                        <span class="link-title">İstatistikler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">{{ Lang::get('app.profile') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="credit-card"></i>
                        <span class="link-title">Ödemeler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">Ayarlar</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Instagram</li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                        <i class="link-icon" data-feather="feather"></i>
                        <span class="link-title">Hesaplarım</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="uiComponents">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">Hesaplarım</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Hesap Ekle</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                        <i class="link-icon" data-feather="anchor"></i>
                        <span class="link-title">İşlemlerim</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="advancedUI">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="pages/advanced-ui/cropper.html" class="nav-link">İşlemlerim</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">İşlem Ekle</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/advanced-ui/sweet-alert.html" class="nav-link">İşlem Zamanlama</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Yardım</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="file"></i>
                        <span class="link-title">Kullanım Klavuzu</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Kullanım Şartları</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""
                       class="nav-link">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Gizlilik Sözleşmesi</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Arayın...">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown nav-apps">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="grid"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="appsDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Kısayollar</p>
                                <a href="javascript:void(0);" class="text-muted">Düzenle</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="d-flex align-items-center apps">
                                    <a href="pages/general/profile.html">
                                        <i data-feather="instagram" class="icon-lg"></i>
                                        <p>Hesaplar</p>
                                    </a>
                                    <a href="pages/apps/calendar.html">
                                        <i data-feather="activity" class="icon-lg"></i>
                                        <p>İşlemler</p>
                                    </a>
                                    <a href="pages/apps/chat.html">
                                        <i data-feather="message-square" class="icon-lg"></i>
                                        <p>Mesajlar</p>
                                    </a>
                                    <a href="pages/email/inbox.html">
                                        <i data-feather="settings" class="icon-lg"></i>
                                        <p>Ayarlar</p>
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);">Tümünü göster</a>
                            </div> -->
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-messages">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="mail"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messageDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Mesajlar</p>
                                <a href="javascript:void(0);" class="text-muted">Temizle</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="figure">
                                        <img src="@if($user->profile_image)/users/images/profile/{{ $user->profile_image }}@else{{'/assets/images/avatar.png'}}@endif" alt="user">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Oğuzhan Yılmaz</p>
                                            <p class="sub-text text-muted">2 saat önce</p>
                                        </div>
                                        <p class="sub-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus, ea!</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);">{{ Lang::get('app.view_all') }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-notifications">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <div class="indicator">
                                <div class="circle"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Bildirimler</p>
                                <a href="javascript:void(0);" class="text-muted">Temizle</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="user-plus"></i>
                                    </div>
                                    <div class="content">
                                        <p>27 yeni takipçi!</p>
                                        <p class="sub-text text-muted">10 saniye önce</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:void(0);">{{ Lang::get('app.view_all') }}</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="@if($user->profile_image)/users/images/profile/{{ $user->profile_image }}@else{{'/assets/images/avatar.png'}}@endif" alt="{{ Lang::get('app.profile') }}">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    <img src="@if($user->profile_image)/users/images/profile/{{ $user->profile_image }}@else{{'/assets/images/avatar.png'}}@endif" alt="{{ Lang::get('app.profile') }}">
                                </div>
                                <div class="info text-center">
                                    <p class="name text-muted text-sm mb-0">{{ $user->username }}</p>
                                    <p class="name font-weight-bold mb-0">{{ $user->name }}</p>
                                    <p class="email text-muted mb-3">{{$user->email }}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="{{ route('profile.index') }}" class="nav-link">
                                            <i data-feather="user"></i>
                                            <span>{{ Lang::get('app.profile') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('profile.edit') }}" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>{{ Lang::get('app.edit_profile') }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                                            <i data-feather="log-out"></i>
                                            <span>{{ Lang::get('app.logout') }}</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="page-content">
            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                <div>
                    <h4 class="mb-3 mb-md-0">@yield('title')</h4>
                </div>
                @yield('title-area')
            </div>
            @yield('content')
        </div>
        <!-- partial:partials/_footer.html -->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
            <p class="text-muted text-center text-md-left">Copyright © {{ date('Y') }} <a href="http://laravel.com.tr"
                                                                                          target="_blank">{{ config('app.name') }}</a>. {{ Lang::get('app.reserved') }}
            </p>
            <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">
                <strong>Coder:</strong> Oğuzhan YILMAZ
                <i class="mb-1 text-danger ml-1 icon-small" data-feather="heart"></i>
            </p>
        </footer>
        <!-- partial -->

    </div>
</div>

<!-- core:js -->
<script src="/assets/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="/assets/vendors/chartjs/Chart.min.js"></script>
<script src="/assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="/assets/vendors/progressbar.js/progressbar.min.js"></script>
<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="/assets/vendors/feather-icons/feather.min.js"></script>
<script src="/assets/js/template.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<script src="/assets/js/dashboard.js"></script>
<script src="/assets/js/datepicker.js"></script>
<!-- end custom js for this page -->
@yield('body')
</body>
</html>
