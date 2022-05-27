@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة كشف</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('consultation.index', false) }}">الكشف</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة كشف</a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة الكشف <a
                            href="{{ route('consultation.index', false) }}">: انقر هنا</a></strong>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">الاستمارة</h5>
                    <a class="float-start btn btn-primary" href="{{ route('patient.create') }}">اضف مريض</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('consultation.store', false) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الاسم المريض الكامل</label>
                                    <select id="single-select" class="form-control w-100 " name="nom_patient">
                                        <option value="">اختر...</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">
                                                {{ $patient->nom }}{{ $patient->prenom }}</option>
                                        @endforeach>
                                    </select>
                                    {{-- <select name="nom_patient" id="test" class="form-control">
                                        <option value=""> اختر ... </option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">
                                                {{ $patient->nom }} {{ $patient->prenom }}</option>
                                        @endforeach
                                    </select> --}}
                                    @if ($patients->count() == 0)
                                        <span class="text-danger"> * لائحة المرضى فارغة </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">ملاحظة أو تعليق</label>
                                    <textarea type="date" class="form-control" name="remarque"></textarea>
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
@endsection
