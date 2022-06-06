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
                <li class="breadcrumb-item active"><a href="#">المواعيد</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">إضافة موعد </a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة المواعيد <a
                            href="{{ route('rendez-vous', false) }}">: انقر هنا</a></strong>
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
                    <form action="{{ url('add_rendezvous') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="contrainer-fluid">
                                <div class="row">
                                    <div class="col-lg-6" style="display: flex;">
                                        {{-- <select id="single-select" class="form-control w-100 " name="id_patient"> --}}
                                            {{-- <option value="">المريض</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">
                                                    {{ $patient->nom }}{{ $patient->prenom }}</option>
                                            @endforeach> --}}
                                        {{-- </select> --}}
                                        <input type="text" name="id_patient" value="" id="myInput" class="form-control" style="width: 50%;">
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#rendezvous-add">المرضى</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="type" class="form-control">
                                            <option value="">-اختر-</option>
                                            <option value="soins">الرعاية</option>
                                            <option value="consultation">الكشف</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"> <label class="form-label">التاريخ</label>
                                        <input type="date" class="form-control" name="date">
                                    </div>
                                    <div class="col-lg-6"><label class="form-label">الساعة</label>
                                        <input type="time" class="form-control" name="time">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><label class="form-label">اسم المرض (ليس
                                            ضروري)</label>
                                        <input type="text" class="form-control" name="nom_malade">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><label class="form-label">الوصف</label>
                                        <textarea class="form-control" rows="3" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="checkbox" name="isFirstTime">
                                        <label class="form-label ml-1"> أول زيارة ؟ </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary  ">تعديل</button>
                            <button type="reset" class="btn btn-light  ">مسح</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <div class="modal fade" id="rendezvous-add">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title  text-white">لائحة المرضى</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                           
                           <a class="btn btn-primary" data-toggle="modal" data-target="#patient-add">المرضى</a>


                            <div class="table-responsive">
                                <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                    <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                                        <table id="example1"
                                            class="display dataTable no-footer  table-bordered table-responsive-sm"
                                            style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                            <thead>
                                                <tr role="row">
                                                    <th style="font-size: 10px;white-space: nowrap;text-align: center;" class="sorting text-center" tabindex="0" aria-controls="example3"
                                                    colspan="1" aria-label="Action: activate to sort column ascending">
                                                    الإجراء</th>
                                                    <th style="font-size: 10px;white-space: nowrap;text-align: center;" class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Roll No.: activate to sort column ascending">
                                                        الاسم العائلي</th>
                                                    <th style="font-size: 10px;white-space: nowrap;text-align: center;" class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Education: activate to sort column ascending">
                                                        رقم البطاقة الوطنية</th>
                                                    <th style="font-size: 10px;white-space: nowrap;text-align: center;" class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Mobile: activate to sort column ascending">
                                                        الهاتف النقال</th>
                                                    <th style="font-size: 10px;white-space: nowrap;text-align: center;" class="sorting" tabindex="0" aria-controls="example3"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Email: activate to sort column ascending">البريد
                                                        الالكتروني</th>

                                                   
                                                </tr>
                                            </thead>
                                             @foreach ($patients as $patient)
                                                <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="text-center">
                                                          <button class="btn btn-success btndata" data-id="{{ $patient->id }}"><i class="icon-check"></i></button>
                                                        </td>
                                                        <td style="white-space: nowrap;">{{ $patient->nom }} {{ $patient->prenom }}</td>
                                                        <td style="white-space: nowrap;">{{ $patient->cni }}</td>
                                                        <td style="white-space: nowrap;">{{ $patient->telephone }}</td>
                                                        <td style="white-space: nowrap;">{{ $patient->email }}</td>
                                                    </tr>
                                                </tbody>
                                            @endforeach
                                           
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add patient --}}
            <div class="modal fade" id="patient-add">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title  text-white">إضافة مريض</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <form id="myForm">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الاسم العائلي</label>
                                            <input type="text" class="form-control" name="nom" id="nom">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الاسم الشخصي</label>
                                            <input type="text" class="form-control" name="prenom" id="prenom">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">تاريخ الازدياد</label>
                                            <input type="date" class="form-control" name="date_naissance" id="date_naissance">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">مكان الازدياد</label>
                                            <input type="text" class="form-control" name="lieu_naissance" id="lieu_naissance">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الحالة العائلية</label>
                                            <select class="form-control" name="situation_familiale" id="situation_familiale">
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
                                            <input type="text" class="form-control" name="profession" id="profession">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">رقم البطاقة الوطنية</label>
                                            <input type="text" class="form-control" name="cni" id="cni">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">البلد</label>
                                            <input type="text" class="form-control" name="id_pays" id="id_pays">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">المدينة</label>
                                            <input type="text" class="form-control" name="id_ville" id="id_ville">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الهاتف النقال</label>
                                            <input type="tel" class="form-control" name="telephone" id="telephone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">الهاتف الفاكس</label>
                                            <input type="tel" class="form-control" name="tel_fixe" id="tel_fixe">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label"> البريد الالكتروني</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">العنوان</label>
                                            <textarea class="form-control" rows="5" name="adresse" id="adresse"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary" id="ajaxSubmit">اضف</button>
                                        <button type="reset" class="btn btn-light">مسح</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    // $("b.edit-todo").on("click", function(){
    $(document).ready(function(){
        $(".btndata").on("click", function(){
        var task = $(this).data("id");
        console.log(task);
        $("#myInput").val(task);
        $("#rendezvous-add").modal('hide');

//    $(".todo-form .todo-task").val(task);
//    $(".todo-form .key").val(todoID);
});
});

</script>
<<script>
    $(document).ready(function(){
       $('#ajaxSubmit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          $.ajax({
             url: "{{route('patient.add')}}",
             method: 'POST',
             data: {
               "_token": "{{ csrf_token() }}",
                nom : $('#nom').val(), 
                prenom : $('#prenom').val(),  
                date_naissance : $('#date_naissance').val(),  
                lieu_naissance : $('#lieu_naissance').val(),  
                situation_familiale : $('#situation_familiale').val(),  
                email : $('#email').val(),
                profession : $('#profession').val(), 
                telephone : $('#telephone').val(), 
                tel_fixe : $('#tel_fixe').val(), 
                adresse : $('#adresse').val(), 
                cni : $('#cni').val(), 
                id_pays : $('#id_pays').val(),  
                id_ville : $('#id_ville').val(),
             },
             success: function(result){
                console.log(result);
                $("#patient-add").modal('hide');
                $("#rendezvous-add").modal('show');

             }});
          });
       });
</script>



<script type="text/javascript">
    $(document).ready(function () {
        $("#example1").dataTable();
    });
</script>

