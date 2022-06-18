@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>تفاصيل المرض</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
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
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">ملاحضات</label>
                                    <textarea class="form-control" cols="30" rows="10" readonly style="background-color: floralwhite">{!!  $maladie ? $maladie->remarque: '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="">تفاصيل أخر كشف</label>
                                    <textarea class="form-control" cols="30" rows="10" readonly style="background-color: floralwhite">{!! $consultation ? $consultation->remarque: '' !!}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <br><br>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <h3>العلاجات الوصوفة</h3>

                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>العلاج</th>
                                        <th>الثمن</th>
                                        <th>تم إنجازه</th>
                                        <th>المسؤول</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($traitement_historiques as $traitement_h)
                                    <tr>
                                        <td class="bord" style="white-space: normal;">{{ $traitement_h->traitement_id ? $traitement_h->traitement->nom : ''}}</td>                                            
                                        <td class="bord" style="white-space: normal;">{{ $traitement_h->prix ? $traitement_h->prix: '-' }}</td>                                            
                                        <td class="bord" style="white-space: normal;">
                                            @if($traitement_h->isEffected==1)
                                                <span class="badge bg-success">نعم</span>
                                            @else
                                                <span class="badge bg-danger">لا</span>
                                            @endif
                                        </td>   
                                        <td class="bord" style="white-space: normal;">{{ $traitement_h->user_id ? $traitement_h->user->name : '-'}}</td>                                                                                                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <br><br>
                        <div class="col-lg-12 col-md-6 col-sm-12">

                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <h3>المنتوجات</h3>
                                <div class="table-responsive">
                                    <table id="example3" class="display dataTable no-footer" style="padding: 10px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                الاسم المنتوج</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1" aria-label="Roll No.: activate to sort column ascending">
                                                الكمية</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($produits as $produit)
                                            <tr role="row" class="odd">
                                                
                                                <td>{{ $produit->produit_id ? $produit->produit->titre : '' }}</td>
                                                <td>{{ $produit->quantite_v }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
@endsection
