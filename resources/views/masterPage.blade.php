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
    <link rel="stylesheet" href="{{ asset('template/css/skin-2.css') }}">

    <link rel="stylesheet" href="{{ asset('template/vendor/select2/css/select2.min.css') }}">
    <link href="{{ asset('template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

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
                <!-- <img class="logo-abbr" style="width: 200px;display: block!important;" src="{{ asset('template/images/logo.png') }}" alt="">
                {{-- <img class="brand-title" src="{{ asset('template/images/logo.png') }}" alt=""> --}} -->
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler collapsed" style="margin-right: 80%;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse justify-content-end collapse" id="navbarSupportedContent" style="padding-right: 66px;">
                        <ul class="navbar-nav ">
                            @can('addtolist')

                            <li style="padding: 5px;" class="nav-item mr-2">
                                <a class="btn  btn-warning" style="font-size: 15px !important" href="{{ url('rendez-vous') }}">لائحة المواعيد</a>
                            </li>
                            <li style="padding: 5px;" class="nav-item mr-2">
                                <a data-toggle="modal" data-target="#exampleModal" class="btn btn-danger" href="#" id="modalToday">أضف إلى قائمة اليوم</a>
                            </li>
                            @endcan
                            <li style="padding: 5px;">
                                <a class="btn btn-success text-white" href="{{url('/logout')}}">
                                        تسجيل الخروج    
                                </a>
                            </li>
                            <li style="padding: 5px;">
                               <span class = "btn btn-dark" style="pointer-events: none;">{{Auth::user()->name}}</span>
                            </li>
                        </ul>
                    </div>
                </nav>
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
                    @can('dashboard')
                    <li><a class="ai-icon" href="{{ url('dashboard') }}" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">الصفحة الرئيسيــــة</span>
                        </a>
                    </li>
                    @endcan
                    @can('patient_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المرضى</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('patients_list')
                            <li><a href="{{ route('patient.index', false) }}">لائحة المرضى</a></li>
                            @endcan
                            @can('patient_add')
                            <li><a href="{{ route('patient.create', false) }}">إضافة مريض</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('malade_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الامراض</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('malade_liste')
                            <li><a href="{{ route('maladie.index', false) }}">لائحة الامراض</a></li>
                            @endcan
                            @can('malade_add')
                            <li><a href="{{ route('maladie.create', false) }}">إضافة مرض</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('client_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الزبناء</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('clients_list')
                            <li><a href="{{ route('client.index', false) }}">لائحة الزبناء</a></li>
                            @endcan
                            @can('client_add')
                            <li><a href="{{ route('client.create', false) }}">إضافة زبون</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('produit_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المنتوجات</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('produit_list')
                            <li><a href="{{ route('produit.index', false) }}">لائحة المنتوجات</a></li>
                            @endcan
                            @can('produit_add')
                            <li><a href="{{ route('produit.create', false) }}">إضافة المنتوج </a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('fournisseur_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المزودين</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('fournisseur_list')
                            <li><a href="{{ route('fournisseur.index', false) }}">لائحة المزودين</a></li>
                            @endcan
                            @can('fournisseur_add')
                            <li><a href="{{ route('fournisseur.create', false) }}">إضافة مزود جديد</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('traitement_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">العلاج</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('traitement_list')
                            <li><a href="{{ route('traitement.index', false) }}">لائحة المنتوجات</a></li>
                            @endcan
                            @can('traitement_add')
                            <li><a href="{{ route('traitement.create', false) }}">إضافة العلاج</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('rendezvous_item')
                    <li>
                        <a class="   has-arrow" href="{{url('/rendez-vous')}}" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المواعيد</span>
                        </a>
                    </li>
                    @endcan
                    @can('vente_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المبيعات</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('vente_list')
                            <li><a href="{{ route('vente.index', false) }}">لائحة المبيعات</a></li>
                            @endcan
                            @can('vente_add')
                            <li><a href="{{ route('vente.create', false) }}">اضافة مبيعة</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('cosnsultation_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الكشف</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('consultation_list')
                            <li><a href="{{ route('consultation.index', false) }}">لائحة الكشف</a></li>
                            @endcan
                            @can('consultation_add')
                            <li><a href="{{ route('consultation.create', false) }}">اضافة كشف</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('permission_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الرخص</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('permissions_list')
                            <li><a href="{{ route('permissions.index', false) }}">لائحة الرخص</a></li>
                            @endcan
                            @can('permissions_add')
                            <li><a href="{{ route('permissions.create', false) }}">اضافة رخصة</a></li>
                            @endcan

                        </ul>
                    </li>
                    @endcan
                    @can('roles_item')

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">الادوار</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('roles_list')
                            <li><a href="{{ route('roles.index', false) }}">لائحة الادوار</a></li>
                            @endcan
                            @can('roles_add')
                            <li><a href="{{ route('roles.create', false) }}">اضافة الدور</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('users_item')
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">المستعمل</span>
                        </a>
                        <ul aria-expanded="false">
                            @can('users_list')
                            <li><a href="{{ route('users.index', false) }}">لائحة المستعملين</a></li>
                            @endcan
                            @can('users_add')
                            <li><a href="{{ route('users.create', false) }}">اضافة مستعمل</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @yield('etudiantContent')
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @php
                 $patients = App\Models\Patient::paginate(5);
                @endphp
                <div class="modal-body">
                    <form action="{{ url('addToday') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <select name="patient" id="single-select" class="form-control">
                                    <option value="" selected>اختر...</option>
                                    @foreach ($patients as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="">أول زيارة <input type="checkbox" name="firstTime" id="" value="1"></label>
                            </div>
                        </div>
                        {{-- <div style="float: left !important;"> --}}
                        <div>
                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary float-right ">حفظ </button>
                            <a href="{{ route('patient.create') }}" class="btn btn-warning">اضف مريض جديد </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end ModalToday --}}

    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="{{ asset('template/vendor/highlightjs/highlight.pack.min.js ') }}"></script>
    <script src="{{ asset('template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/datatables.init.js') }}"></script>


    <script src="{{ asset('template/js/layout-rtl.js ') }}"></script>


    <script src="{{ asset('template/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('template/js/custom.min.js') }}"></script>
    <script src="{{ asset('template/js/dlabnav-init.js') }}"></script>

    <script src="{{ asset('template/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/js/plugins-init/select2-init.js') }}"></script>

    <!-- Svganimation scripts -->
    <script src="{{ asset('template/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('template/vendor/svganimation/svg.animation.js') }}"></script>

</body>

</html>
