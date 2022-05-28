@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4> الرخصة </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('permissions.index', false) }}">الرخص</a></li>

            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary">
                                الرجوع الى قائمة الرخص
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>
                                                الرقم
                                            </th>
                                            <td>
                                                {{ $permission->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                اسم الرخصة
                                            </th>
                                            <td>
                                                {{ $permission->titre }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                تفاصيل الرخصة
                                            </th>
                                            <td>
                                                {{ $permission->description }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
@endsection
