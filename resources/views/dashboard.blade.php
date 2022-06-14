@extends('masterPage')
<style>
    ul#menu li {
        display: inline;
        padding: 5px;
    }
    .textpos{
        float: left;
        margin: 10px;
        color: white;
        font-weight: bold;
        font-size: 60px;
        font-family: sans-serif;
    }
    .card{
        margin-bottom: 0 !important;
    }

</style>
@section('etudiantContent')
 
    <div class="row">
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-primary overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title text-white">المرضى</h3>
                </div>
                <div class="card-body text-center mt-3">
                    <div class="ico-sparkline">
                        <div id="sparkline12"class="textpos">{{ count($patients)}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-secondary overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">رعاية طبية</h3>
                </div>
                <div class="card-body text-center mt-4 p-0">
                    <div class="ico-sparkline">
                        <div id="spark-bar-6" class="textpos">{{$traitemnt_total}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-4 col-sm-6">
            <div class="widget-stat card bg-danger overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">المدخول الشهري</h3>
                </div>
                <div class="card-body text-center mt-4 p-0">
                    <div class="ico-sparkline">
                        <div id="spark-bar-8" class="textpos">765</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- paiment consultation -->
        <div class="col-lg-12">
            <div class="card" style="height: 96%; ">
                <div class="card-header" style="background: #DCDCDC;
                padding-bottom: 15px;">
                   
                    <h3 class="card-title">لائحة الدفع للكشف </h3>
                </div>
                <div class="card-body">
                <table id="example3"
                            class="display dataTable no-footer  table-bordered table-responsive-sm"
                            style="min-width: 845px" role="grid" aria-describedby="example3_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                        colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                        اسم المريض الكامل</th>
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                        colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                        التاريخ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                        colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                        الثمن</th>
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                        colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                        الدفع</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                        colspan="1" aria-label="Action: activate to sort column ascending">
                                        الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultationsp as $consultation)
                                    <tr role="row" class="odd">
                                        <td>{{ $consultation->patient_id ? $consultation->patient->nom.''.$consultation->patient->prenom : '-' }}</td>
                                        <td>{{ $consultation->date }}</td>
                                        <td>{{ $consultation->prix }}</td>
                                        <td>
                                            <span class="badge bg-danger">Non</span>
                                        </td>
                                        <td class="text-center">
                                            {{-- @can('consultation_update') --}}
                                            <button type="button"
                                                class=" btn btn-sm text-white btn-update-consult btn-danger"
                                                data-id="{{ $consultation->id }}">Payer
                                            </button>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!-- endpaiment -->
            <!-- paiment consultation -->
        <div class="col-lg-12">
            <div class="card" style="height: 96%; ">
                <div class="card-header" style="background: #DCDCDC;
                padding-bottom: 15px;">
                    @php
                        $date = date('Y-m-d');
                    @endphp
                    <h3 class="card-title">  لائحة الدفع للعلاج </h3>
                </div>
                <div class="card-body">
                    <table id="example3"
                    class="display dataTable no-footer  table-bordered table-responsive-sm"
                    style="min-width: 845px" role="grid" aria-describedby="example3_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                اسم المريض الكامل</th>
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                العلاج</th>
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                الثمن</th>
                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                المسؤول</th>
                            <th class="sorting text-center" tabindex="0" aria-controls="example3"
                                colspan="1" aria-label="Action: activate to sort column ascending">
                                الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($traitement_historiques as $trh)
                            <tr role="row" class="odd">
                                <td>{{ $trh->patient_id ? $trh->patient->nom.' '.$trh->patient->prenom : '-'}}</td>
                                <td>{{ $trh->traitement_id ? $trh->traitement->nom : '-' }}</td>
                                <td>{{ $trh->prix ? $trh->prix : '-' }}</td>
                                <td>{{ $trh->user_id ? $trh->user->name : '-' }}</td>
                                <td class="text-center">
                                    {{-- @can('consultation_update') --}}
                                    <a data-toggle="modal"
                                        data-target="#th-{{ $trh->id }}"
                                        class="btn btn-sm btn-primary"><i
                                            class="la la-pencil"></i></a>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>

                </div>
            </div>
    </div>
    <!-- endpaiment -->
        <div class="col-lg-12">
            <div class="card" style="height: 96%; ">
                <div class="card-header" style="background: #DCDCDC;
                padding-bottom: 15px;">
                    @php
                        $date = date('Y-m-d');
                    @endphp
                    <h3 class="card-title">لائحة المواعيد للكشف : {{ $date }}</h3>
                </div>
                <div class="card-body">
                    <table id="example3" class="display dataTable no-footer">
                        <thead>
                            <th>الاسم الكامل</th>
                            <th>أول زيارة</th>
                            <th>تأكيد الحضور</th>
                            <th>إجراء</th>
                        </thead>
                        <tbody>
                            @foreach ($rendezvous_consultation as $rendezvou)
                            <tr>
                                <td>{{ $rendezvou->patient($rendezvou->id_patient)->nom }} {{ $rendezvou->patient($rendezvou->id_patient)->prenom }}</td>
                                <td>
                                    @if($rendezvou->isFirstTime == "1")
                                        <span class="badge bg-success">نعم</span>
                                    @else
                                        <span class="badge bg-danger">لا</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rendezvou->present == "1")
                                        <span class="badge bg-success">نعم</span>
                                    @else
                                        <span class="badge bg-danger">لا</span>
                                    @endif
                                </td>
                                <td>
                                    @if($rendezvou->present == "1")
                                    <span class="btn btn-warning">نعم</span>
                                @else 
                                    <form action="{{route('addToList')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="rend_id" value="{{ $rendezvou->id_patient}}">
                                        <button type="submit" class="btn btn-secondary">إضافة</button>
                                    </form>
                                @endif
                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card" style="height: 96%; ">
                <div class="card-header" style="background: #DCDCDC;
                padding-bottom: 15px;">
                    <h3 class="card-title">لائحة المواعيد للعلاج: {{ $date }} </h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <table id="example3" class="display dataTable no-footer">
                            <thead>
                                <th>الاسم الكامل</th>
                                <th>أول زيارة</th>
                                <th>تأكيد الحضور</th>
                                <th>إجراء</th>
                            </thead>
                            <tbody>
                                @foreach ($rendezvous_soins as $rendezvou)
                                <tr>
                                    <td>{{ $rendezvou->patient($rendezvou->id_patient)->nom }} {{ $rendezvou->patient($rendezvou->id_patient)->prenom }}</td>
                                    <td>
                                        @if($rendezvou->isFirstTime == "1")
                                            <span class="badge bg-success">نعم</span>
                                        @else
                                            <span class="badge bg-danger">لا</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($rendezvou->present == "1")
                                            <span class="badge bg-success">نعم</span>
                                        @else
                                            <span class="badge bg-danger">لا</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($rendezvou->present == "1")
                                            <span class="btn btn-secondary">نعم</span>
                                        @else 
                                            <form action="{{route('addToList')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="rend_id" value="{{ $rendezvou->id_patient}}">
                                                <button type="submit" class="btn btn-secondary">إضافة</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card" style="height: 96%; ">
                <div class="card-header" style="background: #DCDCDC;
                padding-bottom: 15px;">
                    <h3 class="card-title">لائحة المرضى اليومية</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3">الاسم</th>
                                    <th class="py-3">الحالة</th>
                                    <th class="py-3">الملف الطبي</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                @foreach ($today_patients as $today_p)
                                    <tr class="btn-reveal-trigger">

                                        <td class="py-2">{{ $today_p->patient->nom }}
                                            {{ $today_p->patient->prenom }}</td>
                                        <td>
                                            @if ($today_p->isFirstTime == 1)
                                                <span class="badge badge-rounded badge-success">أول زيارة</span>
                                        </td>
                                    @else
                                        <span class="badge badge-rounded badge-primary">ليست أول زيارة</span></td>
                                @endif
                                <td>
                                    <a href="{{ url('dossier_medical/'.$today_p->patient_id ) }}" class="btn btn-sm btn-danger"><i
                                            class="la la-file-o"></i></a>
                                </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- traitemant liste --}}
       
    </div>
    {{-- Modal Today --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('addToday') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <select name="patient" id="single-select" class="form-control">
                                    <option value="" selected>اختر...</option>
                                    @foreach ($patients as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }} {{ $item->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6" style="padding: 10px;">
                                <label for="">أول زيارة <input type="checkbox" name="firstTime" id="" value="1"></label>
                            </div>
                        </div>
                        {{-- <div style="float: left !important;"> --}}
                        <div>
                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-primary float-right ">حفظ </button>
                            <a href="{{ route('patient.create') }}" class="btn btn-warning">اضف مريض جديد </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end ModalToday --}}
          <!-- Modal edit -->
          @foreach ($traitement_historiques as $traitement_historique)
          <div class="modal fade" id="th-{{ $traitement_historique->id }}">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header bg-primary">
                          <h5 class="modal-title  text-white">تعديل </h5>
                          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('traitement_payer', $traitement_historique->id) }}" method="POST">
                              <input type="hidden" name="_method" value="PUT">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div class="form-group">
                                          <label class="form-label">الثمن</label>
                                          <input type="number" name="prix_" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-lg-12 col-md-12 col-sm-12">
                                      <div class="form-group">
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
      @endforeach
  

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
     $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-update-consult").on('click', function() {
            var consult_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/consult_payer",
                dataType: "json",
                data: {
                    'consult_id': consult_id
                },
                success: function(response) {
                    $("body").load(
                        'http://127.0.0.1:8000/dashboard');
                }
            });
        });
    });
</script>

