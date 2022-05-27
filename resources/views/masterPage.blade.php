<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:title" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:image" content="https://edumin.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- PAGE TITLE HERE -->
    <title> مركز التاج للعلاج الطبيعي </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('template/vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/skin-2.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/skin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

    <link href="{{ asset('template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

        body {
            font-family: 'Droid Arabic Kufi', serif !important;
        }

    </style>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-compact" src="{{ asset('template/images/logo.png') }}" alt="">
                <img class="brand-title" src="{{ asset('template/images/logo.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="ابحث...."
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    test
                                    {{-- <img src="{{ asset('images/profile/education/pic1.jpg')}}" width="20" alt="" /> --}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="ai-icon" href="{{ url('dashboard') }}" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">الصفحة الرئيسيــــة</span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('patient_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المرضى</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('patients_list') --}}
                            <li><a href="{{ route('patient.index', false) }}">لائحة المرضى</a></li>
                            {{-- @endcan --}}
                            {{-- @can('patient_add') --}}
                            <li><a href="{{ route('patient.create', false) }}">إضافة مريض</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('malade_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الامراض</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('malade_liste') --}}
                            <li><a href="{{ route('maladie.index', false) }}">لائحة الامراض</a></li>
                            {{-- @endcan --}}
                            {{-- @can('malade_add') --}}
                            <li><a href="{{ route('maladie.create', false) }}">إضافة مرض</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('client_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الزبناء</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('clients_list') --}}
                            <li><a href="{{ route('client.index', false) }}">لائحة الزبناء</a></li>
                            {{-- @endcan --}}
                            {{-- @can('client_add') --}}
                            <li><a href="{{ route('client.create', false) }}">إضافة زبون</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('produit_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المنتوجات</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('produit_list') --}}
                            <li><a href="{{ route('produit.index', false) }}">لائحة المنتوجات</a></li>
                            {{-- @endcan --}}
                            {{-- @can('produit_add') --}}
                            <li><a href="{{ route('produit.create', false) }}">إضافة المنتوج </a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('fournisseur_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المزودين</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('fournisseur_list') --}}
                            <li><a href="{{ route('fournisseur.index', false) }}">لائحة المزودين</a></li>
                            {{-- @endcan --}}
                            {{-- @can('fournisseur_add') --}}
                            <li><a href="{{ route('fournisseur.create', false) }}">إضافة مزود جديد</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('traitement_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">العلاج</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('traitement_list') --}}
                            <li><a href="{{ route('traitement.index', false) }}">لائحة المنتوجات</a></li>
                            {{-- @endcan --}}
                            {{-- @can('traitement_add') --}}
                            <li><a href="{{ route('traitement.create', false) }}">إضافة العلاج</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('rendezvous_item') --}}
                    <li>
                        <a class="   has-arrow" href="/rendez-vous" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المواعيد</span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('vente_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المبيعات</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('vente_list') --}}
                            <li><a href="{{ route('vente.index', false) }}">لائحة المبيعات</a></li>
                            {{-- @endcan --}}
                            {{-- @can('vente_add') --}}
                            <li><a href="{{ route('vente.create', false) }}">اضافة مبيعة</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('cosnsultation_item') --}}
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الكشف</span>
                        </a>
                        <ul aria-expanded="false">
                            {{-- @can('consultation_list') --}}
                            <li><a href="{{ route('consultation.index', false) }}">لائحة الكشف</a></li>
                            {{-- @endcan --}}
                            {{-- @can('consultation_add') --}}
                            <li><a href="{{ route('consultation.create', false) }}">اضافة كشف</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('etudiantContent')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js ') }}"></script>
    <script src="{{ asset('template/js/custom.min.js ') }}"></script>
    <script src="{{ asset('template/js/dlabnav-init.js ') }}"></script>

    <script src="{{ asset('template/vendor/highlightjs/highlight.pack.min.js ') }}"></script>
    <script src="{{ asset('template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/datatables.init.js') }}"></script>


    <script src="{{ asset('template/js/layout-rtl.js ') }}"></script>

    <script src="{{ asset('template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js ') }}"></script>
    <script src="{{ asset('template/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/select2-init.js') }}"></script>


    <!-- Svganimation scripts -->
    <script src="{{ asset('template/vendor/svganimation/vivus.min.js ') }}"></script>
    <script src="{{ asset('template/vendor/svganimation/svg.animation.js ') }}"></script>

</body>

</html>
