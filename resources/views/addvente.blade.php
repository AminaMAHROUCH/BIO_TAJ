@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>اضافة مبيعة</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('vente.index', false) }}">المبيعات</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> اضافة مبيعة </a></li>
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
                    <strong> {{ session()->get('message') }} . و للذهاب الى لائحة المبيعات <a
                            href="{{ route('vente.index', false) }}">: انقر هنا</a></strong>
                </div>
            </div>
        </div>
    @endif
    @if (session()->get('error'))
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="alert alert-danger alert-dismissible solid fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                    <strong> {{ session()->get('error') }} </strong>
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
                    <form action="{{ route('vente.store', false) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">اسم المنتوج</label>
                                    {{-- select with search sera tant mieux --}}
                                    <select id="single-select" name="id_produit" class="form-control w-100 ">
                                        <option value="">اختر...</option>
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"
                                                {{ old('nom_produit') == $produit->titre ? 'selected' : '' }}>
                                                {{ $produit->titre }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <select name="id_produit" id="test" class="form-control">
                                        <option value="">اختر...</option>
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"
                                                {{ old('nom_produit') == $produit->titre ? 'selected' : '' }}>
                                                {{ $produit->titre }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الكمية</label>
                                    <input type="number" class="form-control" name="quantite"
                                        value="{{ old('quantite') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 pricehide">
                                <div class="form-group">
                                    <label class="form-label">ثمن البيع</label>
                                    <input type="text" class="form-control bg-light prixvente" name="" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 pricehide">
                                <div class="form-group">
                                    <label class="form-label">ثمن الادنى</label>
                                    <input type="text" class="form-control bg-light prixminimal" name="" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">الثمن</label>
                                    <input type="number" class="form-control" name="prix" value="{{ old('prix') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">التسبيق</label>
                                    <input type="text" class="form-control" name="avance" value="{{ old('avance') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 patient">
                                {{-- pour selection le bon patient => utiliser le cni qui unique --}}
                                <div class="form-group">
                                    <label class="form-label">الشاري ؟ </label>
                                    <label for="success-outlined" class="ml-4">مريض</label>
                                    <input type="radio" class="btn-check " name="options-outlined" id="isPatient">
                                    <label for="danger-outlined" class="ml-5">زبون</label>
                                    <input type="radio" class="btn-check" name="options-outlined" id="isClient">
                                    <label for="danger-outlined" class="ml-5">جديد</label>
                                    <input type="radio" class="btn-check" name="options-outlined" id="newClient">
                                </div>
                            </div>


                            {{-- patient --}}
                            <div class="col-lg-12 col-md-12 col-sm-12 patientInfo">
                                <div class="form-group">
                                    <label class="form-label">اسم المريض </label>
                                    <select name="patient_id" id="single-select" class="form-control">
                                        <option value="">اختر...</option>
                                        @foreach ($patients as $patient)
                                            <option value="{{ $patient->id }}">{{ $patient->nom }}
                                                {{ $patient->prenom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- client --}}
                            <div class="col-lg-12 col-md-12 col-sm-12 clientInfo">
                                <div class="form-group">
                                    <label class="form-label">اسم الزبون </label>
                                    <select name="client_id" class="form-control">
                                        <option value="">اختر...</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->fullname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- nouveau client --}}
                            <div class="col-lg-6 col-md-6 col-sm-12 newClientDisplay">
                                <div class="form-group">
                                    <label class="form-label">اسم الكامل للشاري</label>
                                    <input type="text" class="form-control" name="fullname">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 newClientDisplay">
                                <div class="form-group">
                                    <label class="form-label">هاتفه</label>
                                    <input type="text" class="form-control" name="telephone">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 newClientDisplay">
                                <div class="form-group">
                                    <label class="form-label">عنوانه</label>
                                    <textarea class="form-control" name="adresse" rows="3"> </textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary">اضف</button>
                                <button type="reset" class="btn btn-light">مسح</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(".newClientDisplay , .pricehide , .patientInfo , .clientInfo").hide();

        $('#isPatient').change(function() {
            $('.patientInfo').show();
            $(".newClientDisplay").hide();
            $(".clientInfo").hide();
        })

        $('#newClient').change(function() {
            $(".newClientDisplay").show();
            $('.patientInfo').hide();
            $(".clientInfo").hide();
        })

        $('#isClient').change(function() {
            $(".newClientDisplay").hide();
            $('.patientInfo').hide();
            $(".clientInfo").show();
        })


        $('#test').change(function() {
            var prd = $(this).val();
            var _token = $("input[name='_token']").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = {
                _token: _token,
                prd: prd,
            }

            $.ajax({
                url: "{{ route('getproduit') }}",
                type: 'GET',
                data: {
                    _token: _token,
                    prd: prd
                },
                success: function(data) {
                    $('.pricehide').show();
                    $('.prixvente').attr('value', data['prix_vente']);
                    $('.prixminimal').attr('value', data['prix_minimal']);
                }
            });
        })
    </script>

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-submit").click(function(e) {
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var email = $("#email").val();
                var pswd = $("#pwd").val();
                var address = $("#address").val();

                $.ajax({
                    // url: "{{ route('ajax.request.store') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        email: email,
                        pswd: pswd,
                        address: address
                    },
                    success: function(data) {
                        printMsg(data);
                    }
                });
            });

            function printMsg(msg) {
                if ($.isEmptyObject(msg.error)) {
                    console.log(msg.success);
                    $('.alert-block').css('display', 'block').append('<strong>' + msg.success + '</strong>');
                } else {
                    $.each(msg.error, function(key, value) {
                        $('.' + key + '_err').text(value);
                    });
                }
            }
        });
    </script> --}}
@endsection
