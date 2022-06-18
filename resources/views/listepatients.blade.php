@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة المرضى</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('patient.index', false) }}">المرضى</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة المرضى</a></li>
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
                            <h4 class="card-title">لائحة المرضى </h4>
                            @can('patient_add')
                            <a href="{{ route('patient.create', false) }}" class="btn btn-primary">اضف</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                        <table id="example3"
                                            class="display dataTable no-footer  table-bordered table-responsive-sm"
                                            style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                            <thead>
                                                <tr role="row">

                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Roll No.: activate to sort column ascending">
                                                        الاسم العائلي</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Name: activate to sort column ascending">الاسم
                                                        الشخصي</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Education: activate to sort column ascending">
                                                        رقم البطاقة الوطنية</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Mobile: activate to sort column ascending">
                                                        الهاتف النقال</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Email: activate to sort column ascending">البريد
                                                        الالكتروني</th>

                                                    <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                        colspan="1" aria-label="Action: activate to sort column ascending">
                                                        الإجراء</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($patients as $patient)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $patient->nom }}</td>
                                                        <td>{{ $patient->prenom }}</td>
                                                        <td>{{ $patient->cni }}</td>
                                                        <td>{{ $patient->telephone }}</td>
                                                        <td>{{ $patient->email }}</td>
                                                        <td class="text-center">
                                                            @can('patient_update')
                                                            <a data-toggle="modal"
                                                                data-target="#patient-edit-{{ $patient->id }}"
                                                                class="btn btn-sm btn-primary"><i
                                                                    class="la la-pencil"></i></a>
                                                            @endcan
                                                            @can('patient_delete')
                                                            <a data-toggle="modal"
                                                                data-target="#patient-remove-{{ $patient->id }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="la la-trash-o"></i></a>
                                                            @endcan
                                                            @can('patient_display')
                                                            <a data-toggle="modal"
                                                                data-target="#patient-info-{{ $patient->id }}"
                                                                class="btn btn-sm btn-warning"><i
                                                                    class="la la-info"></i></a>
                                                            @endcan
                                                            @can('dossier_medical')
                                                           
                                                                <a href="{{ url('dossier_medical/'.$patient->id ) }}" class="btn btn-sm btn-danger"><i
                                                                        class="la la-file-o"></i></a>
                                                          @endcan
                                                           
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
                    @foreach ($patients as $patient)
                        <div class="modal fade" id="patient-edit-{{ $patient->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title  text-white">تعديل المعلومات</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('patient.update', $patient->id) }}" method="POST">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">الاسم العائلي</label>
                                                        <input type="text" class="form-control" name="nom"
                                                            value="{{ $patient->nom }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">الاسم الشخصي</label>
                                                        <input type="text" class="form-control" name="prenom"
                                                            value="{{ $patient->prenom }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">تاريخ الازدياد</label>
                                                        <input type="date" class="form-control" name="date_naissance"
                                                            value="{{ $patient->date_naissance }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">مكان الازدياد</label>
                                                        <input type="text" class="form-control" name="lieu_naissance"
                                                            value="{{ $patient->lieu_naissance }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">الحالة العائلية</label>
                                                        <select class="form-control" name="situation_familiale">
                                                            @switch($patient->situation_familiale)
                                                                @case('متزوج(ة)')
                                                                    <option value="متزوج(ة)" selected>متزوج(ة)</option>
                                                                    <option value="عازب(ة)">عازب(ة)</option>
                                                                    <option value="ارمل(ة)">ارمل(ة)</option>
                                                                @break

                                                                @case('عازب(ة)')
                                                                    <option value="عازب(ة)" selected>عازب(ة)</option>
                                                                    <option value="ارمل(ة)">ارمل(ة)</option>
                                                                    <option value="متزوج(ة)">متزوج(ة)</option>
                                                                @break

                                                                @case('ارمل(ة)')
                                                                    <option value="ارمل(ة)" selected>ارمل(ة)</option>
                                                                    <option value="متزوج(ة)">متزوج(ة)</option>
                                                                    <option value="عازب(ة)">عازب(ة)</option>
                                                                @break

                                                                @default
                                                                    <option value="" selected></option>
                                                                    <option value="عازب(ة)">عازب(ة)</option>
                                                                    <option value="ارمل(ة)">ارمل(ة)</option>
                                                                    <option value="متزوج(ة)">متزوج(ة)</option>
                                                            @endswitch
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">المهنة</label>
                                                        <input type="text" class="form-control" name="profession"
                                                            value="{{ $patient->profession }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">رقم البطاقة الوطنية</label>
                                                        <input type="text" class="form-control" name="cni"
                                                            value="{{ $patient->cni }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">البلد</label>
                                                        <input type="text" class="form-control" name="id_pays"
                                                            value="{{ $patient->id_pays }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">المدينة</label>
                                                        <input type="text" class="form-control" name="id_ville"
                                                            value="Fes ">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">الهاتف النقال</label>
                                                        <input type="tel" class="form-control" name="telephone"
                                                            value="{{ $patient->telephone }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">الهاتف الفاكس</label>
                                                        <input type="tel" class="form-control" name="tel_fixe"
                                                            value="{{ $patient->tel_fixe }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label"> البريد الالكتروني</label>
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $patient->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label class="form-label">العنوان</label>
                                                        <textarea class="form-control" rows="3" name="adresse">{{ $patient->adresse }}</textarea>
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
                    @foreach ($patients as $patient)
                        <!-- Modal remove -->
                        <div class="modal fade" id="patient-remove-{{ $patient->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title text-white">تنبيه</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        هل حقا تريد مسح هذا المريض
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('patient.destroy', $patient->id) }}" method="POST">
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
                    @foreach ($patients as $patient)
                        <div class="modal fade" id="patient-info-{{ $patient->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-secondary">
                                        <h5 class="modal-title text-white">المعلومات</h5>
                                        <button type="button" class="close"
                                            data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الاسم العائلي</label>
                                                    <input type="text" class="form-control bg-light" name="nom" readonly
                                                        value="{{ $patient->nom }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الاسم الشخصي</label>
                                                    <input type="text" class="form-control bg-light" name="prenom" readonly
                                                        value="{{ $patient->prenom }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">تاريخ الازدياد</label>
                                                    <input type="date" class="form-control bg-light" name="date_naissance"
                                                        readonly value="{{ $patient->date_naissance }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">مكان الازدياد</label>
                                                    <input type="text" class="form-control bg-light" name="lieu_naissance"
                                                        value="{{ $patient->lieu_naissance }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الحالة العائلية</label>
                                                    <input class="form-control bg-light" readonly
                                                        value="{{ $patient->situation_familiale }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">المهنة</label>
                                                    <input type="text" class="form-control bg-light" name="profession"
                                                        readonly value="{{ $patient->profession }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">رقم البطاقة الوطنية</label>
                                                    <input type="text" class="form-control bg-light" name="cni" readonly
                                                        value="{{ $patient->cni }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">البلد</label>
                                                    <input type="text" class="form-control bg-light" name="id_pays"
                                                        readonly value="{{ $patient->id_pays }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">المدينة</label>
                                                    <input type="text" class="form-control bg-light" name="id_ville"
                                                        readonly value="fes">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الهاتف النقال</label>
                                                    <input type="tel" class="form-control bg-light" name="telephone"
                                                        readonly value="{{ $patient->telephone }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">الهاتف الفاكس</label>
                                                    <input type="tel" class="form-control bg-light" name="tel_fixe"
                                                        readonly value="{{ $patient->tel_fixe }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label"> البريد الالكتروني</label>
                                                    <input type="email" class="form-control bg-light" name="email" readonly
                                                        value="{{ $patient->email }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="form-label">العنوان</label>
                                                    <textarea class="form-control bg-light" rows="3" name="adresse" readonly>{{ $patient->adresse }}</textarea>
                                                </div>
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
    </div>
@endsection
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script><script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
  
<script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#example1").dataTable();
    });
   </script> --}}