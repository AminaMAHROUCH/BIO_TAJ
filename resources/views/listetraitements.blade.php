@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة الامراض</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('traitement.index', false) }}">العلاج</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة العلاجات </a></li>
            </ol>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="alert alert-success alert-dismissible solid fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                    <strong> {{ session()->get('message') }}</strong>
                </div>
            </div>
        </div>
    @endif

    <div class="row">


        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">لائحة الامراض </h4>
                            {{-- @can('traitement_add') --}}
                            <a href="{{ route('traitement.create', false) }}" class="btn btn-primary">اضف</a>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">

                                    {{-- <div id="example3_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                class="" placeholder="" aria-controls="example3"></label> --}}
                                </div>
                                <table id="example3" class="display dataTable no-footer  table-bordered table-responsive-sm"
                                    style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                اسم العلاج</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                colspan="1" aria-label="Action: activate to sort column ascending">
                                                الثمن</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                colspan="1" aria-label="Action: activate to sort column ascending">
                                                الإجراء</th>
                                        </tr>
                                    </thead>
                                    @foreach ($traitements as $traitement)
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{ $traitement->nom }}</td>
                                                <td>{{ $traitement->prix }}</td>
                                                <td class="text-center">
                                                    {{-- @can('traitement_update') --}}
                                                    <a data-toggle="modal"
                                                        data-target="#traitement-edit-{{ $traitement->id }}"
                                                        class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    {{-- @endcan --}}
                                                    {{-- @can('traitement_delete') --}}
                                                    <a data-toggle="modal"
                                                        data-target="#traitement-remove-{{ $traitement->id }}"
                                                        class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                    {{-- @endcan --}}
                                                    {{-- @can('traitement_display') --}}
                                                    <a data-toggle="modal"
                                                        data-target="#traitement-info-{{ $traitement->id }}"
                                                        class="btn btn-sm btn-secondary"><i class="la la-info"></i></a>
                                                    {{-- @endcan --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                <div class="dataTables_info" id="example3_info" role="status" aria-live="polite">
                                    Showing 1 to 10 of 30 entries</div>
                                <div class="dataTables_paginate paging_simple_numbers" id="example3_paginate"><a
                                        class="paginate_button previous disabled" aria-controls="example3" data-dt-idx="0"
                                        tabindex="0" id="example3_previous">Previous</a><span><a
                                            class="paginate_button current" aria-controls="example3" data-dt-idx="1"
                                            tabindex="0">1</a><a class="paginate_button " aria-controls="example3"
                                            data-dt-idx="2" tabindex="0">2</a><a class="paginate_button "
                                            aria-controls="example3" data-dt-idx="3" tabindex="0">3</a></span><a
                                        class="paginate_button next" aria-controls="example3" data-dt-idx="4" tabindex="0"
                                        id="example3_next">Next</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal edit -->
            @foreach ($traitements as $traitement)
                <div class="modal fade" id="traitement-edit-{{ $traitement->id }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title  text-white">تعديل المعلومات</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('traitement.update', $traitement->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الاسم العلاج</label>
                                                <input type="text" class="form-control" name="nom"
                                                    value="{{ $traitement->nom }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الثمن</label>
                                                <input type="text" class="form-control" name="prix"
                                                    value="{{ $traitement->prix }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الوصف</label>
                                                <textarea type="date" class="form-control" name="description">{{ $traitement->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary">تعديل</button>
                                            <button type="reset" class="btn btn-light">مسح</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach ($traitements as $traitement)
                <!-- Modal remove -->
                <div class="modal fade" id="traitement-remove-{{ $traitement->id }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white">تنبيه</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                هل حقا تريد مسح هذا المريض
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('traitement.destroy', $traitement->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-danger text-white">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Modal info -->
            @foreach ($traitements as $traitement)
                <div class="modal fade" id="traitement-info-{{ $traitement->id }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h5 class="modal-title text-white">المعلومات</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الاسم العلاج</label>
                                            <input type="text" class="form-control" name="nom"
                                                value="{{ $traitement->nom }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> الثمن</label>
                                            <input type="text" class="form-control" name="prix"
                                                value="{{ $traitement->prix }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الوصف</label>
                                            <textarea type="date" class="form-control" name="description" rows="5"
                                                readonly>{{ $traitement->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            @endforeach







            <div id="grid-view" class="tab-pane fade col-lg-12">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic2.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Alexander</h3>
                                    <p class="text-muted">M.COM., P.H.D.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>02</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic3.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Elizabeth</h3>
                                    <p class="text-muted">B.COM., M.COM.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>03</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic4.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Amelia</h3>
                                    <p class="text-muted">M.COM., P.H.D.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>04</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic5.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Charlotte</h3>
                                    <p class="text-muted">B.COM., M.COM.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>05</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic6.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Isabella</h3>
                                    <p class="text-muted">B.A, B.C.A</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>06</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic7.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Sebastian</h3>
                                    <p class="text-muted">M.COM., P.H.D.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>07</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic8.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Olivia</h3>
                                    <p class="text-muted">B.COM., M.COM.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>08</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic9.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Emma</h3>
                                    <p class="text-muted">B.A, B.C.A</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>09</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-profile">
                            <div class="card-header justify-content-end pb-0">
                                <div class="dropdown">
                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                        <span class="dropdown-dots fs--1"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                        <div class="py-2">
                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2">
                                <div class="text-center">
                                    <div class="profile-photo">
                                        <img src="images/profile/small/pic10.jpg" width="100"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <h3 class="mt-4 mb-1">Jackson</h3>
                                    <p class="text-muted">M.COM., P.H.D.</p>
                                    <ul class="list-group mb-3 list-group-flush">
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span>Roll No.</span><strong>10</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Phone No. :</span><strong>+01 123
                                                456
                                                7890</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Admission Date. :</span><strong>01
                                                July
                                                2021</strong>
                                        </li>
                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                            <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                        </li>
                                    </ul>
                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4" href="about-student.html">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection
