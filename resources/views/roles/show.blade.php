@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4> الدور </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('roles.index', false) }}">الادوار</a></li>

            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary">
                                الرجوع الى قائمة الادوار
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>الرقم</th>
                                            <td>{{ $role->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>المستعمل بالعربية</th>
                                            <td>{{ $role->titre_arabe }}</td>
                                        </tr>
                                        <tr>
                                            <th>المستعمل بالفرنسية</th>
                                            <td>{{ $role->titre }}</td>
                                        </tr>
                                        <tr>
                                            <th>الرخص</th>
                                            <td>
                                                @foreach ($role->permissions as $key => $permissions)
                                                    <span class="label label-info">{{ $permissions->titre }} :
                                                        {{ $permissions->description }}</span><br />
                                                @endforeach
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
