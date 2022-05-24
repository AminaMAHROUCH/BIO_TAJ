@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة مرض</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('maladie.index', false) }}">المرضى</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة المرض</a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة الامراض <a
                            href="{{ route('maladie.index', false) }}">: انقر هنا</a></strong>
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
                    <form action="{{ route('maladie.store', false) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">اسم المرض</label>
                                    <input type="text" class="form-control" name="maladie">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الرعاية</label>
                                    <select class="form-control" name="soin[]" multiple>
                                        @foreach ($traitements as $traitement)
                                            {{-- using id --}}
                                            {{-- <option value="{{ $traitement->id }}">{{ $traitement->nom }}</option> --}}
                                            <option value="{{ $traitement->nom }}">{{ $traitement->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الوصف</label>
                                    <textarea type="date" class="form-control" name="description" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">اضف</button>
                                <button type="reset" class="btn btn-light">مسح</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
