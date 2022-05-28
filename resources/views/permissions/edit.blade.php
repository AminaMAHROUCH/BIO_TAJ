@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>تعديل الرخصة </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('permissions.index', false) }}">الرخص</a></li>

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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة الزيناء <a
                            href="{{ route('client.index', false) }}">: انقر هنا</a></strong>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">الاستمارة</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('permissions.update', [$permission->id]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="col-12-xl col-lg-12 col-12 form-group">
                            <label class="required" for="title">اسم</label>
                            <input class="form-control " type="text" name="title" id="title"
                                value="{{ old('title', $permission->titre) }}" readonly>
                        </div>
                        <div class="col-12-xl col-lg-12 col-12 form-group">
                            <label class="required" for="titre"> تفاصيل الرخصة </label>
                            <textarea class="textarea form-control" name="description" cols="10" rows="5"
                                placeholder=" ادخل تفاصيل الرخصة"></textarea>
                        </div>


                        <div class="form-group  ">
                            <button class="btn btn-danger" type="submit">
                                تعديل
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
