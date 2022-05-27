@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة المواعيد</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="/rendez-vous">الموعد</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة المواعيد</a></li>
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
                            <h4 class="card-title">لائحة المواعيد </h4>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#rendezvous-add">اضف</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display dataTable no-footer  table-bordered table-responsive-sm"
                                    style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                الاسم العائلي</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Name: activate to sort column ascending">الاسم
                                                الشخصي</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Mobile: activate to sort column ascending">
                                                الهاتف</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Email: activate to sort column ascending">
                                                الحالة</th>

                                            <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                                colspan="1" aria-label="Action: activate to sort column ascending">
                                                الإجراء</th>
                                        </tr>
                                    </thead>
                                    @foreach ($rendezvouss as $rendezvous)
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{ $rendezvous->nom }}</td>
                                                <td>{{ $rendezvous->prenom }}</td>
                                                <td>{{ $rendezvous->telephone }}</td>
                                                <td>{{ $rendezvous->type }}</td>
                                                <td class="text-center">
                                                    <a data-toggle="modal"
                                                        data-target="#rendezvous-edit-{{ $rendezvous->id }}"
                                                        class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a data-toggle="modal"
                                                        data-target="#rendezvous-remove-{{ $rendezvous->id }}"
                                                        class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                    <a data-toggle="modal"
                                                        data-target="#rendezvous-info-{{ $rendezvous->id }}"
                                                        class="btn btn-sm btn-secondary"><i class="la la-info"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal add -->
            <div class="modal fade" id="rendezvous-add">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title  text-white"> اضافة موعد</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('add_rendezvous') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6" style="padding: 10px;">
                                        <button class="btn btn-warning">
                                            <a href="{{ route('patient.create') }}">اضف مريض جديد</a>
                                        </button>
                                    </div>
                                    <div lass="col-lg-6">
                                        <div class="input-group mb-2">
                                            <select id="select2" name="id_patient" class="form-control">
                                                <option value="">المريض</option>
                                                @foreach ($patients as $patient)
                                                    <option value="{{ $patient->id }}">
                                                        {{ $patient->nom }}{{ $patient->prenom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">التاريخ</label>
                                            <input type="date" class="form-control" name="date">
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الساعة</label>
                                            <input type="time" class="form-control" name="time">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">اسم المرض (ليس ضروري)</label>
                                            <input type="text" class="form-control" name="nom_malade">
                                        </div>
                                    </div>
                                    <div lass="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group mb-2">
                                            <select id="select2" name="type" class="form-control">
                                                <option value="">-اختر-</option>
                                                <option value="soins">الرعاية</option>
                                                <option value="consultation">الكشف</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الوصف</label>
                                            <textarea class="form-control" rows="3" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="checkbox" name="isFirstTime">
                                            <label class="form-label ml-1"> أول زيارة ؟ </label>
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

            {{-- @foreach ($rendezvouss as $rendezvous)
                    <!-- Modal remove -->
                    <div class="modal fade" id="rendezvous-remove-{{ $rendezvous->id }}">
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
                                    <form action="{{ route('rendezvous.destroy', $rendezvous->id) }}" method="POST">
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
                @foreach ($rendezvouss as $rendezvous)
                    <div class="modal fade" id="rendezvous-info-{{ $rendezvous->id }}">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-secondary">
                                    <h5 class="modal-title text-white">المعلومات</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الاسم العائلي</label>
                                                <input type="text" class="form-control bg-light" name="nom" readonly
                                                    value="{{ $rendezvous->nom }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الاسم الشخصي</label>
                                                <input type="text" class="form-control bg-light" name="prenom" readonly
                                                    value="{{ $rendezvous->prenom }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">تاريخ الازدياد</label>
                                                <input type="date" class="form-control bg-light" name="date_naissance"
                                                    readonly value="{{ $rendezvous->date_naissance }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">مكان الازدياد</label>
                                                <input type="text" class="form-control bg-light" name="lieu_naissance"
                                                    value="{{ $rendezvous->lieu_naissance }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الحالة العائلية</label>
                                                <input class="form-control bg-light" readonly
                                                    value="{{ $rendezvous->situation_familiale }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">المهنة</label>
                                                <input type="text" class="form-control bg-light" name="profession" readonly
                                                    value="{{ $rendezvous->profession }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">رقم البطاقة الوطنية</label>
                                                <input type="text" class="form-control bg-light" name="cni" readonly
                                                    value="{{ $rendezvous->cni }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">البلد</label>
                                                <input type="text" class="form-control bg-light" name="id_pays" readonly
                                                    value="{{ $rendezvous->id_pays }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">المدينة</label>
                                                <input type="text" class="form-control bg-light" name="id_ville" readonly
                                                    value="{{ $rendezvous->id_ville }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الهاتف النقال</label>
                                                <input type="tel" class="form-control bg-light" name="telephone" readonly
                                                    value="{{ $rendezvous->telephone }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">الهاتف الفاكس</label>
                                                <input type="tel" class="form-control bg-light" name="tel_fixe" readonly
                                                    value="{{ $rendezvous->tel_fixe }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label"> البريد الالكتروني</label>
                                                <input type="email" class="form-control bg-light" name="email" readonly
                                                    value="{{ $rendezvous->email }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">العنوان</label>
                                                <textarea class="form-control bg-light" rows="3" name="adresse" readonly>{{ $rendezvous->adresse }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach --}}



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
