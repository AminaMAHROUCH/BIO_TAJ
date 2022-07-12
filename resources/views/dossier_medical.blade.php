@extends('masterPage')
<style>
    .position{
        margin: 5px;
    }
    
    .bord{
        border-left: 1px solid black !important;
    }
    .bord_{
        border-right: 1px solid black !important;
    }
</style>
@section('etudiantContent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">معلومات المريض</h4>
            </div>
            <div class="card-body">
                <div class="row position">
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="{{ $patient->nom }} {{ $patient->prenom }}"  readonly style="background-color: #ededed">
                    </div>
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="{{ $patient->situation_familiale }}"  readonly style="background-color: #ededed">
                    </div>
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="{{ $patient->cni }}"  readonly style="background-color: #ededed">
                    </div>
                </div>
                <div class="row position">
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="{{ $patient->email }}"  readonly style="background-color: #ededed">
                    </div>
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="{{ $patient->telephone }}"  readonly style="background-color: #ededed">
                    </div>
                    <div class="col-lg-4">
                        <input type="disabled" class="form-control" value="Fes"  readonly style="background-color: #ededed">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">تشخيص المريض</h4>
            </div>
            <div class="card-body">
                @if($visite)
                @include('updatevisite')
                @else
                    <div class="row position">
                    <a data-toggle="modal"
                        data-target="#visite-add"
                        class="btn btn-sm btn-primary"><i
                            class="la la-plus"></i>إضافة
                    </a>
                    </div>
                @endif
             
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">الملف الطبي</h4>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-maladie-tab" data-toggle="tab" href="#nav-maladie" role="tab" aria-controls="nav-contact" aria-selected="false"> المرض</a>
                      <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">العلاجات الموصوفة   </a>
                      <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> المنتوجات</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                      {{-- consultation --}}
                  
                    <div class="tab-pane fade show active" id="nav-maladie" role="tabpanel" aria-labelledby="nav-maladie-tab">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">المرض </h4>
                                <a data-toggle="modal"
                                data-target="#maladie-add"
                                class="btn btn-sm btn-primary"><i
                                    class="la la-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>المرض</th>
                                                <th>إجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($maladiepatients as $maladiepatient)
                                            <tr>
                                                <td class="bord" style="white-space: normal;">{{ $maladiepatient->maladie_id ? $maladiepatient->maladie->maladie : ''}}</td>                                            
                                                <td class="bord text-center">
                                                    <a data-toggle="modal"
                                                    data-target="#maladie-info-{{ $maladiepatient->id }}"
                                                    class="btn btn-sm btn-secondary"><i
                                                        class="la la-pencil"></i></a>
                                                    
                                                    <!-- <a data-toggle="modal"
                                                    data-target="#maladie-remove-{{ $maladiepatient->id }}"
                                                    class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a> -->
                                                  
                                                    <a href="{{url('details_dossier/'.$maladiepatient->maladie_id)}}" 
                                                        class="btn btn-sm btn-success"><i class="la la-info"></i></a>
                                                </td>                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">المرض </h4>
                                <a data-toggle="modal"
                                data-target="#maladie-add"
                                class="btn btn-sm btn-primary"><i
                                    class="la la-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>العلاج</th>
                                                <th>الثمن</th>
                                                <th>تم إنجازه</th>
                                                <th>المسؤول</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($traitements_hit as $traitement_h)
                                            <tr>
                                                <td class="bord" style="white-space: normal;">{{ $traitement_h->traitement_id ? $traitement_h->traitement->nom : ''}}</td>                                            
                                                <td class="bord" style="white-space: normal;">{{ $traitement_h->prix ? $traitement_h->prix: '-' }}</td>                                            
                                                <td class="bord" style="white-space: normal;">
                                                    @if($traitement_h->isEffected==1)
                                                        <span class="badge bg-success">نعم</span>
                                                    @else
                                                        <span class="badge bg-danger">لا</span>
                                                    @endif
                                                </td>   
                                                <td class="bord" style="white-space: normal;">{{ $traitement_h->user_id ? $traitement_h->user->name : '-'}}</td>                                                                                                                        
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">المرض </h4>
                                <a data-toggle="modal"
                                data-target="#maladie-add"
                                class="btn btn-sm btn-primary"><i
                                    class="la la-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>المنتوج</th>
                                                <th>الكمية </th>
                                                <th>الثمن الإجمالي</th>
                                                <th>التسبيق</th>
                                                <th>الباقي</th>
                                                <th>إجراء</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($produits_ as $produit)
                                            <tr>
                                                <td class="bord" style="white-space: normal;">{{ $produit->produit_id ? $produit->produit->titre : '-' }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $produit->quantite_v }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $produit->prix_total }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $produit->avance }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $produit->reste }}</td>    
                                                <td class="bord" style="white-space: normal;">
                                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#produit-v-{{$produit->id}}">
                                                        تعديل
                                                    </button>
                                                </td>    
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
       
    </div>
</div>
{{-- edit consultation --}}
@foreach ($consultations as $consultation)
<div class="modal fade" id="consultation-edit-{{ $consultation->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">تعديل </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('consultation.update', $consultation->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">اسم المريض</label>
                                <select class="form-control" name="nom_patient">
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ $patient->id == $consultation->patient_id ? 'selected' : '' }}>
                                            {{ $patient->nom }}
                                            {{ $patient->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">ملاحظة أو تعليق</label>
                                <textarea type="date" class="form-control" name="remarque" rows="4">{{ $consultation->remarque }}</textarea>
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
{{--  --}}
<div class="modal fade" id="consultation-add-{{ $consultation->patient_id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">إضافة ملاحضة</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add_consult') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="patient_id" value="{{$consultation->patient_id}}">
                                <label class="form-label">ملاحظة أو تعليق</label>
                                <textarea type="date" class="form-control" name="remarque" rows="4"></textarea>
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
{{--  --}}
<div class="modal fade" id="consultation-remove-{{ $consultation->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">تنبيه</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل حقا تريد مسح  
            </div>
            <div class="modal-footer">
                <form action="{{ route('consultation.destroy', $consultation->id) }}" method="POST">
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
{{-- add maladie --}}
<div class="modal fade" id="maladie-add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">إضافة </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('add_maladie') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            
                            <div class="form-group">
                                <input type="hidden" name="patient" value={{$patient->id}}>
                                <label class="form-label">المرض</label>
                                <select id="single-select" class="form-control w-100 " name="maladie_id">
                                    <option value="">اختر...</option>
                                    @foreach ($maladies as $maladie)
                                        <option value="{{ $maladie->id }}">
                                            {{ $maladie->maladie }}</option>
                                    @endforeach>
                                </select>
                                @if ($maladies->count() == 0)
                                    <span class="text-danger"> * لائحة الامراض فارغة </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-primary">إضافة</button>
                            <button type="reset" class="btn btn-light">إلغاء</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="visite-add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">إضافة </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('visite');
            </div>
        </div>
    </div>
</div>
<!-- {{-- end --}}
{{-- end  --}}
 {{-- form dossier medical --}} -->
@foreach($maladiepatients as $maladiepatient)
<div class="modal fade" id="maladie-info-{{$maladiepatient->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">إضافة </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{url('add_dossier_medical')}}" method="post">
                @csrf
            <input type="hidden" value="{{ $patient->id }}" name="patient_id">
            <input type="hidden" value="{{ $maladiepatient->maladie_id }}" name="maladie_id">
            <input type="hidden" value="{{ $maladiepatient->id }}" name="maladie">
            <input type="hidden" value="{{ $maladiepatient->order_ }}" name="order_">
                <div class="card">
                    <div class="card-header">
                        <h5>الكشف</h5>
                    </div>
                    <div class="card-body">
                        <label for="">الثمن</label>
                        <input type="number" name="prix" class="form-control">
                        <label for="">ملاحضات</label>
                        <textarea name="consultation_remarque" class="form-control " id="summary-ckeditor" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>العلاجات الموصوفة</h5>
                    </div>
                    <div class="card-body">
                        <label for="">العلاجات</label>
                        <div style="display:flex;">
                            <input type="hidden" value="" name="soins[]" id="soins">
                            <input type="text" value="" class="form-control " style="margin-left: 1%;width: 80%;" id="soins_" readonly>
                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#soins-add">Soins</a>
                        </div>
                        <label for="">المنتوجات</label>
                        <div style="display:flex;">
                            <input type="hidden" value="" name="produits[]" id="produits">
                            <input type="text" value="" class="form-control " style="margin-left: 1%;width: 80%;" id="produits_" readonly>
                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#produits-add">Produits</a>

                        </div>
                    </div>
                </div>
                <label for="">ملاحضات</label>
                <textarea name="maladie_remarque" id="" class="form-control " cols="30" rows="5"></textarea>

                <hr>
                <button type="submit" class="btn btn-warning">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- show -->
<div class="modal fade" id="maladie-show-{{$maladiepatient->id}}">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">إضافة </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5>الكشف</h5>
                    </div>
                    <div class="card-body">
                        <label for="">ملاحضات</label>
                        <textarea name="consultation_remarque" class="form-control" cols="30" rows="5" readonly></textarea>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>العلاجات الموصوفة</h5>
                    </div>
                    <div class="card-body">
                        <label for="">العلاجات</label>
                        <div style="display:flex;">
                            <input type="hidden" value="" name="soins[]" id="soins">
                            <input type="text" value="" class="form-control " style="margin-left: 1%;width: 80%;" id="soins_" readonly>
                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#soins-add">Soins</a>
                        </div>
                        <label for="">المنتوجات</label>
                        <div style="display:flex;">
                            <input type="hidden" value="" name="produits[]" id="produits">
                            <input type="text" value="" class="form-control " style="margin-left: 1%;width: 80%;" id="produits_" readonly>
                            <a class="btn btn-warning text-white" data-toggle="modal" data-target="#produits-add">Produits</a>

                        </div>
                    </div>
                </div>
                <label for="">ملاحضات</label>
                <textarea name="maladie_remarque" id="" class="form-control " cols="30" rows="5"></textarea>

                <hr>
                <button type="submit" class="btn btn-warning">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
{{-- produits --}}
<div class="modal fade" id="produits-add">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">لائحة العلاجات</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>          
            <div class="table-responsive">
                <table id="example3" class="display dataTable no-footer" style="padding: 10px;">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                            colspan="1" aria-label="Roll No.: activate to sort column ascending">
                             #</th>
                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                            colspan="1" aria-label="Roll No.: activate to sort column ascending">
                            الاسم المنتوج</th>
                       
                    </tr>
                </thead>
                <tbody>
                        @foreach ($produits as $produit)
                        <tr role="row" class="odd">
                            <td class="text-center">
                                <button class="btn btn-success btndatap_" data-id="{{ $produit->id }}" data-name="{{ $produit->titre }}"><i class="icon-check"></i></button>
                            </td> 
                            <td>{{ $produit->titre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
{{-- produits end --}}
<!-- soins -->
<div class="modal fade" id="soins-add">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title  text-white">لائحة العلاجات</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>                
            <div class="table-responsive">
                <table style=" padding: 10px;" id="example3"
                class="display  table-bordered">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                #</th>
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                اسم العلاج</th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                colspan="1" aria-label="Action: activate to sort column ascending">
                                التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($traitements as $traitement)
                            <tr role="row" class="odd">
                                <td class="text-center">
                                    <button class="btn btn-success btndata_" data-id="{{ $traitement->id }}" data-name="{{ $traitement->nom }}"><i class="icon-check"></i></button>
                                </td>                                                
                                <td>{{ $traitement->nom }}</td>
                                <td class="text-center">
                                    {{-- @can('traitement_display') --}}
                                    <a data-toggle="modal"
                                        data-target="#traitement-info-{{ $traitement->id }}"
                                        class="btn btn-sm btn-secondary"><i class="la la-info"></i></a>
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
@foreach ($produits_ as $vente)
    <div class="modal fade" id="produit-v-{{ $vente->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title  text-white">تعديل المعلومات</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vente.update', $vente->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="patient_id"value="{{$patient->id}}">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">اسم المنتوج</label>
                                    {{-- select with search sera tant mieux --}}
                                    <select id="single-select" name="produit_id" class="form-control w-100 ">
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"
                                                {{ old('nom_produit') == $produit->titre ? 'selected' : '' }}>
                                                {{ $produit->titre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الكمية</label>
                                    <input type="number" class="form-control" name="quantite_v"
                                        value="{{ $vente->quantite_v }}">
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
@foreach ($maladiepatients as $maladie)
<!-- Modal remove -->
<div class="modal fade" id="maladie-remove-{{ $maladie->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">تنبيه</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                هل حقا تريد مسح هذا المرض
            </div>
            <div class="modal-footer">
                <form action="{{ route('maladie.destroy', $maladie->id) }}" method="POST">
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
@foreach ($traitements as $traitement)
    <div class="modal fade" id="traitement-info-{{ $traitement->id }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title text-white">العلاج</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">اسم العلاج</label>
                                <input style="background-color:#f8f9fa;" type="text" class="form-control" name="nom"
                                    value="{{ $traitement->nom }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">الوصف</label>
                                <textarea style="background-color:#f8f9fa;" type="date" class="form-control" name="description" rows="5"
                                    readonly>{{ $traitement->description }}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endforeach

<!-- endsoins -->
<!--  -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

<script>
    // $("b.edit-todo").on("click", function(){
    $(document).ready(function(){
        var trai_row = []; var trai_name = [];
        $(".btndata_").on("click", function(e){
            e.preventDefault();    
            trai_row.push( $(this).data('id') );
            trai_name.push( $(this).data('name') );
            $("#soins").val(trai_row);
            $("#soins_").val(trai_name);
        // $("#rendezvous-add").modal('hide');

//    $(".todo-form .todo-task").val(task);
//    $(".todo-form .key").val(todoID);
});
});

</script>
<script>
    // $("b.edit-todo").on("click", function(){
    $(document).ready(function(){
        var prod_row = []; var prod_name = [];
        $(".btndatap_").on("click", function(e){
            e.preventDefault();    
            prod_row.push( $(this).data('id') );
            prod_name.push( $(this).data('name') );
            $("#produits").val(prod_row);
            $("#produits_").val(prod_name);
        // $("#rendezvous-add").modal('hide');

//    $(".todo-form .todo-task").val(task);
//    $(".todo-form .key").val(todoID);
});
});

</script>

