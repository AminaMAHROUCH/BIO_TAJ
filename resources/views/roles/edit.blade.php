@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة زبون</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('client.index', false) }}">الزبناء</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة زبون</a></li>
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
                    <form method="POST" action="{{ route('roles.update', [$role->id]) }}" enctype="multipart/form-data">
                        @method('PUT') @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="required" for="title">الدور</label>
                                <input class="form-control" type="text" name="title" id="title"
                                    value="{{ old('titre', $role->titre) }}" readonly />
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <th>
                                            <label class="required" for="permissions">الرخصة</label>
                                            <div class="checkbox">
                                                <label> <input type="checkbox" id="checkall" onClick="checkAll()" /> حدد
                                                    الكل / إلغاء الكل </label>
                                            </div>
                                        </th>
                                        <th>الوصف</th>
                                    </tr>
                                    @foreach ($help as $h)
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label for="">
                                                        <input type="checkbox" class="checkitem" name="permissions[]"
                                                            id="permissions" value="{{ $h->id }}" checked>
                                                    </label>
                                                </div>
                                                {{ $h->titre }}
                                            </td>
                                            <td>
                                                {{ $h->description }}
                                            </td>
                                        </tr>
                                    @endforeach

                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label for="" class="">
                                                        <input type="checkbox" class="checkitem" name="permissions[]"
                                                            id="permissions" value="{{ $permission->id }}">
                                                    </label>
                                                    <span class="ml-2"> {{ $permission->titre }}</span>

                                                </div>
                                            </td>
                                            <td>
                                                {{ $permission->description }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ url('roles') }}" class="btn bg-gray"> العودة الى لائحة الأدوار</a>
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
