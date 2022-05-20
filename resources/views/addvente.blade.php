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
                                    <select name="nom_produit" id="test" class="form-control">
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"
                                                {{ old('nom_produit') == $produit->titre ? 'selected' : '' }}>
                                                {{ $produit->titre }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="number" class="form-control bg-light" name="quantite" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 pricehide">
                                <div class="form-group">
                                    <label class="form-label">ثمن الادنى</label>
                                    <input type="number" class="form-control bg-light" name="quantite" readonly>
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
                                    <label class="form-label">هل الشاري من المرضى ؟</label>
                                    <label for="success-outlined" class="ml-4">نعم</label>
                                    <input type="radio" class="btn-check " name="options-outlined" id="isPatient">
                                    <label for="danger-outlined" class="ml-5">لا</label>
                                    <input type="radio" class="btn-check" name="options-outlined" id="isNotPatient">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 isPatientToHidden">
                                <div class="form-group">
                                    <label class="form-label">ر.ب.و للمريض</label>
                                    <input type="text" class="form-control" name="prix" value="{{ old('prix') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 isClientShow">
                                {{-- pour selection le bon patient => utiliser le cni qui unique --}}
                                <div class="form-group">
                                    <label class="form-label">هل الشاري من الزبناء ؟</label>
                                    <div class="form-check form-check-inline ">
                                        <label class="form-check-label" for="inlineRadio1">نعم</label>
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="isClient"
                                            value="option1">
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio2">لا</label>
                                        <input class="form-check-input" type="radio" id="isNotClient"
                                            name="inlineRadioOptions" value="option2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 isClientToHidden">
                                <div class="form-group">
                                    <label class="form-label">اسم الكامل للشاري</label>
                                    <input type="text" class="form-control" name="prix" value="{{ old('prix') }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 clientData">
                                <div class="form-group">
                                    <label class="form-label">هاتفه</label>
                                    <input type="text" class="form-control" name="telephone"
                                        value="{{ old('avance') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 clientData">
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
        $(".isPatientToHidden , .isClientShow , .clientData , .pricehide , .isClientToHidden").hide();

        $('#isPatient').change(function() {
            $(".isPatientToHidden").show();
            $(".isClientShow").hide();
            $('.isClientToHidden').hide();
            $(".clientData").hide();
        })
        $('#isNotPatient').change(function() {
            $(".isClientShow").show();
            $(".isPatientToHidden").hide();
        })

        $('#isClient').change(function() {
            $('.clientData').hide();
            $('.isClientToHidden').show();
        })
        $('#isNotClient').change(function() {
            $('.clientData').show();
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
                    console.log(data);
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
