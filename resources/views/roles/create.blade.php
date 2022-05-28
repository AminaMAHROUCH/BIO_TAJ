@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة دور</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('roles.index', false) }}">الادوار</a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة الزيناء <a
                            href="{{ route('client.index', false) }}">: انقر هنا</a></strong>
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
                    <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body  ">
                            <div class="form-group">
                                <label class="required" for="title">الدور بالعربية</label>
                                <input class="form-control" type="text" name="titre_arabe" required>

                            </div>
                            <div class="form-group">
                                <label class="required" for="title">الدور بالفرنسية</label>
                                <input class="form-control" type="text" name="titre" required>

                            </div>
                            <div class="form-group">
                                <table id="example3" class="display dataTable no-footer  table-bordered table-responsive-sm"
                                    style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="required" for="permissions">الرخصة</label>
                                                <div style="padding-bottom: 4px">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" id="checkall" onClick="checkAll()" /> حدد
                                                            الكل / إلغاء الكل
                                                        </label>
                                                    </div>
                                            </th>
                                            <th>الوصف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>
                                                    <div class="checkbox">
                                                        <label for="">
                                                            <input type="checkbox" class="checkitem"
                                                                name="permissions[]" id="permissions"
                                                                value=" {{ $permission->id }}">
                                                            {{ $permission->titre }}
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $permission->description }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ url('/roles') }}" class="btn bg-gray"> العودة الى لائحة الأدوار</a>
                    <button class="btn btn-success" type="submit">
                        حفظ
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection


<script>
    function checkAll() {
        var input = document.getElementById('checkall');
        if (input.checked) {
            selectAll()
        } else {
            unSelectAll()
        }

    }

    function selectAll() {
        var inputs = document.getElementsByClassName('checkitem')
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = true
        }
    }

    function unSelectAll() {
        var inputs = document.getElementsByClassName('checkitem')
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = false
        }
    }
</script>
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
