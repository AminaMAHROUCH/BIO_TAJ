@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة مبيعة</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vente.index', false) }}">المبيعات</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> اضافة مبيعة </a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة المبيعات <a
                            href="{{ route('vente.index', false) }}">: انقر هنا</a></strong>
                </div>
            </div>
        </div>
    @endif
    @if (session()->get('error'))
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="alert alert-danger alert-dismissible solid fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                    <strong> {{ session()->get('error') }} </strong>
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
                    <form action="{{ route('vente.store', false) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">اسم المنتوج</label>
                                    {{-- select with search sera tant mieux --}}
                                    <select name="nom_produit" id="" class="form-control">
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"
                                                {{ old('nom_produit') == $produit->titre ? 'selected' : '' }}>
                                                {{ $produit->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                {{-- pour selection le bon patient => utiliser le cni qui unique --}}
                                <div class="form-group">
                                    <label class="form-label">ر.ب.و المريض</label>
                                    <input type="text" class="form-control" name="cni" value="{{ old('cni') }}">
                                    @if (session()->get('error'))
                                        <span class="text-danger"> * املئ مجددا هذا الحقل</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الكمية</label>
                                    <input type="number" class="form-control" name="quantite"
                                        value="{{ old('quantite') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الثمن</label>
                                    <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">التسبيق</label>
                                    <input type="text" class="form-control" name="avance" value="{{ old('avance') }}">
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
