@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4> المستعمل </h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index', false) }}">المستعملين</a></li>

            </ol>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('users.index') }}" class="btn btn-primary">
                                الرجوع الى قائمة المستعملين
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
                                                {{ $user->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                الاسم
                                            </th>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                البريد الالكتروني
                                            </th>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                الادوار
                                            </th>
                                            <td>
                                                @foreach ($user->roles as $key => $roles)
                                                    <span class="label label-info">{{ $roles->titre }}</span>
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
