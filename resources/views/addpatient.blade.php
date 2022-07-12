@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة مريض</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="patients/liste">المرضى</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة المريض</a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة المرضى <a
                            href="{{ route('patient.index', false) }}">: انقر هنا</a></strong>
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
                    <form action="{{ route('patient.store', false) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الاسم العائلي</label>
                                    <input type="text" class="form-control" name="nom">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الاسم الشخصي</label>
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">تاريخ الازدياد</label>
                                    <input type="text" class="form-control" name="date_naissance" placeholder="jj/mm/aaaa">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">مكان الازدياد</label>
                                    <input type="text" class="form-control" name="lieu_naissance">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الحالة العائلية</label>
                                    <select class="form-control" name="situation_familiale">
                                        <option value="" selected> ....اختر</option>
                                        <option value="متزوج(ة)">متزوج(ة)</option>
                                        <option value="عازب(ة)">عازب(ة)</option>
                                        <option value="ارمل(ة)">ارمل(ة)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">المهنة</label>
                                    <input type="text" class="form-control" name="profession">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">رقم البطاقة الوطنية</label>
                                    <input type="text" class="form-control" name="cni">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">البلد</label>
                                    <input type="text" class="form-control" name="id_pays">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">المدينة</label>
                                    <select name="id_ville" class="form-control selectpicker" data-live-search="true" >
                                        
                                    @foreach($villes as $ville)
                                    <option value="{{$ville->id_ville}}">{{$ville->ville}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الهاتف النقال</label>
                                    <input type="tel" class="form-control" name="telephone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الهاتف الفاكس</label>
                                    <input type="tel" class="form-control" name="tel_fixe">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label"> البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">العنوان</label>
                                    <textarea class="form-control" rows="5" name="adresse"></textarea>
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
