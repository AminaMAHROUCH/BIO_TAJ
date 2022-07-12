@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة المبيعات</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vente.index', false) }}">المبيعات</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة المبيعات </a></li>
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
                            <h4 class="card-title"> لائحة المبيعات للمرضى</h4>
                            {{-- @can('vente_add') --}}
                            <a href="{{ route('vente.create', false) }}" class="btn btn-primary">اضف</a>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                              
                                    <table id="example3"
                                        class="display dataTable no-footer  table-bordered table-responsive-sm"
                                        style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    اسم المريض</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    اسم المنتوج </th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    الكمية</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    ثمن الاجمالي</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    التسبيق</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    الباقي</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                    colspan="1" aria-label="Action: activate to sort column ascending">
                                                    الإجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($patients as $patient)
                                            
                                                <tr role="row" class="odd">
                                                    <td>{{ $patient->patient->nom }} {{ $patient->patient->prenom }} </td>
                                                    <td>{{ $patient->produit_id ? $patient->produit->titre : ' ' }}</td>
                                                    <td>{{ $patient->quantite_v }}</td>
                                                    <td>{{ $patient->prix_total }}</td>
                                                    <td>{{ $patient->avance }}</td>
                                                    <td>{{ $patient->reste }}</td>
                                                    <td class="text-center">
                                                        {{-- @can('vente_update') --}}
                                                        <a data-toggle="modal"
                                                            data-target="#vente-edit-{{ $patient->id }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="la la-pencil"></i></a>
                                                        {{-- @endcan --}}
                                                        {{-- @can('vante_delete') --}}
                                                        <a data-toggle="modal"
                                                            data-target="#vente-remove-{{ $patient->id }}"
                                                            class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit -->
                @foreach ($patients as $vente)
                    <div class="modal fade" id="vente-edit-{{ $vente->id }}">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title  text-white">تعديل المعلومات</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('vente.update', $vente->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الكمية</label>
                                                    <input type="number" class="form-control" name="quantite_v"
                                                        value="{{ $vente->quantite_v }}">
                                                </div>
                                            </div>
                                            <!--<div class="col-lg-6 col-md-6 col-sm-12 pricehide">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label class="form-label">ثمن البيع</label>-->
                                            <!--        <input type="text" class="form-control bg-light prixvente" name="prix_total" readonly value="{{ $vente->prix_total }}">-->
                                            <!--    </div>-->
                                            <!--</div>-->
        
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الثمن</label>
                                                    <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">المبلغ المؤدى</label>
                                                    <input type="text" class="form-control" name="avance"  value="{{ $vente->avance }}">
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
                @endforeach
                @foreach ($patients as $vente)
                    <!-- Modal remove -->
                    <div class="modal fade" id="vente-remove-{{ $vente->id }}">
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
                                    <form action="{{ route('vente.destroy', $vente->id) }}" method="POST">
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
                @foreach ($patients as $vente)
                    <div class="modal fade" id="vente-info-{{ $vente->id }}">
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
                                                    value="{{ $vente->nom }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الوصف</label>
                                                <textarea type="date" class="form-control" name="description" rows="5">{{ $vente->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                @endforeach


            </div>
        </div>
    </div>
    <br><br>
    <div class="row">


        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> لائحة المبيعات للزبائن</h4>
                            {{-- @can('vente_add') --}}
                            <a href="{{ route('vente.create', false) }}" class="btn btn-primary">اضف</a>
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                              
                                    <table id="example3"
                                        class="display dataTable no-footer  table-bordered table-responsive-sm"
                                        style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    اسم الزبون </th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    اسم المنتوج </th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    الكمية</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    ثمن الاجمالي</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    التسبيق</th>
                                                <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                    colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                    الباقي</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                    colspan="1" aria-label="Action: activate to sort column ascending">
                                                    الإجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($clients as $patient)
                                            
                                                <tr role="row" class="odd">
                                                    <td>{{ $patient->patient->nom }} {{ $patient->patient->prenom }} </td>
                                                    <td>{{ $patient->produit_id ? $patient->produit->titre : ' ' }}</td>
                                                    <td>{{ $patient->quantite_v }}</td>
                                                    <td>{{ $patient->prix_total }}</td>
                                                    <td>{{ $patient->avance }}</td>
                                                    <td>{{ $patient->reste }}</td>
                                                    <td class="text-center">
                                                        {{-- @can('vente_update') --}}
                                                        <a data-toggle="modal"
                                                            data-target="#vente-edit-{{ $patient->id }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="la la-pencil"></i></a>
                                                        {{-- @endcan --}}
                                                        {{-- @can('vante_delete') --}}
                                                        <a data-toggle="modal"
                                                            data-target="#vente-remove-{{ $patient->id }}"
                                                            class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal edit -->
                @foreach ($patients as $vente)
                    <div class="modal fade" id="vente-edit-{{ $vente->id }}">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h5 class="modal-title  text-white">تعديل المعلومات</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('vente.update', $vente->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الكمية</label>
                                                    <input type="number" class="form-control" name="quantite_v"
                                                        value="{{ $vente->quantite_v }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pricehide">
                                                <div class="form-group">
                                                    <label class="form-label">ثمن البيع</label>
                                                    <input type="text" class="form-control bg-light prixvente" name="prix_total" readonly value="{{ $vente->prix_total }}">
                                                </div>
                                            </div>
        
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الثمن</label>
                                                    <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">المبلغ المؤدى</label>
                                                    <input type="text" class="form-control" name="avance"  value="{{ $vente->avance }}">
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
                @endforeach
                @foreach ($patients as $vente)
                    <!-- Modal remove -->
                    <div class="modal fade" id="vente-remove-{{ $vente->id }}">
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
                                    <form action="{{ route('vente.destroy', $vente->id) }}" method="POST">
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
                @foreach ($patients as $vente)
                    <div class="modal fade" id="vente-info-{{ $vente->id }}">
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
                                                    value="{{ $vente->nom }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الوصف</label>
                                                <textarea type="date" class="form-control" name="description" rows="5">{{ $vente->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"
integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"
    integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $("#select2").chosen();
    $("#select1").chosen();
</script>
