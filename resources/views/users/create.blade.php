@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة مستعمل</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index', false) }}">المستعملين</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">اضافة مستعمل </a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">الاستمارة</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">الاسم </label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="name" id="name" value="{{ old('name', '') }}" required>

                        </div>
                        <div class="form-group">
                            <label class="required" for="email">البريد الالكتروني</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email">
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">كلمة السر</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" id="password" required>

                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">الدور</label>

                            <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                name="roles[]" id="roles" multiple required>
                                @foreach ($roles as $id => $roles)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>
                                        {{ $roles }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <button class="btn bg-green" type="submit">
                                اضف
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
