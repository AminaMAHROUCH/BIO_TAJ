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
                <h4 class="card-title">الملف الطبي</h4>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">الكشف</a>
                      <a class="nav-link" id="nav-maladie-tab" data-toggle="tab" href="#nav-maladie" role="tab" aria-controls="nav-contact" aria-selected="false"> المرض</a>
                      <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">العلاجات الموصوفة   </a>
                      <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> المنتوجات</a>
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                      {{-- consultation --}}
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">كل الاستشارات </h4>
                                <a data-toggle="modal"
                                data-target="#consultation-add-{{ $patient->id }}"
                                class="btn btn-sm btn-primary"><i
                                    class="la la-plus"></i></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>ملاحضات</th>
                                                <th>تعديل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($consultations as $consult)
                                            <tr>
                                                <td class="bord bord_">{{date('d-m-Y', strtotime($consult->date)) }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $consult->remarque}}</td>											
                                                <td class="bord text-center">
                                                    <a data-toggle="modal"
                                                    data-target="#consultation-edit-{{ $consult->id }}"
                                                    class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                    
                                                    <a data-toggle="modal"
                                                    data-target="#consultation-remove-{{ $consult->id }}"
                                                    class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>											
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-maladie" role="tabpanel" aria-labelledby="nav-maladie-tab">
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
                                                <th>العلاجات الموصوفة</th>
                                                <th>تعديل</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($maladiepatients as $maladiepatient)
                                            <tr>
                                                <td class="bord bord_">{{ $maladiepatient->patient_id ?( $maladiepatient->patient->nom.''.$maladiepatient->patient->prenom) : '' }}</td>
                                                <td class="bord" style="white-space: normal;">{{ $maladiepatient->maladie_id ? $maladiepatient->maladie->maladie : ''}}</td>											
                                                <td class="bord text-center">
                                                    <a data-toggle="modal"
                                                    data-target="#maladie-edit-{{ $maladiepatient->id }}"
                                                    class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                    
                                                    <a data-toggle="modal"
                                                    data-target="#maladie-remove-{{ $maladiepatient->id }}"
                                                    class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>											
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Efzefefzefeféefzef</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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
                                <input type="hidden" name="patient" value=5>
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
                            <button type="submit" class="btn btn-primary">تعديل</button>
                            <button type="reset" class="btn btn-light">مسح</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end --}}
{{-- end  --}}
@endsection