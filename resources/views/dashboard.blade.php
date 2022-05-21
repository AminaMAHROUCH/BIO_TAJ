@extends('masterPage')
<style>
    ul#menu li {
    display:inline;
    padding: 5px;
    }
</style>
@section('etudiantContent')
<ul id="menu" style="padding: 5px;">
    <li><a href="{{url('rendez-vous')}}">لائحة المواعيد</a></li>
    <li><a data-toggle="modal" data-target="#exampleModal" href="#" id="modalToday">أضف إلى قائمة اليوم</a></li>
    <li>JavaScript</li>
    <li>PHP</li>
  </ul> 
    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-primary overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title text-white">Total Students</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 422</h5>
                </div>
                <div class="card-body text-center mt-3">
                    <div class="ico-sparkline">
                        <div id="sparkline12"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-success overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title text-white">New Students</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 357</h5>
                </div>
                <div class="card-body text-center mt-4 p-0">
                    <div class="ico-sparkline">
                        <div id="spark-bar-2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-secondary overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">Total Course</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 547</h5>
                </div>
                <div class="card-body p-0 mt-2">
                    <div class="px-4"><span class="bar1"
                            data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-sm-6">
            <div class="widget-stat card bg-danger overflow-hidden">
                <div class="card-header pb-3">
                    <h3 class="card-title text-white">Fees Collection</h3>
                    <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 3280$</h5>
                </div>
                <div class="card-body p-0 mt-1">
                    <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-6 col-sm-6" >
            <div class="card" style=" overflow-y: scroll">
                <div class="card-header">
                    @php
                      $date= date("Y-m-d");  
                    @endphp
                    <h3 class="card-title">لائحة المواعيد : {{$date}}</h3>
                </div>
                <div class="card-body">
                    <table id="example3" class="display dataTable no-footer">
                        <thead>
                            <th>الاسم الكامل</th>
                            <th>أول زيارة</th>
                        </thead>
                        <tbody>
                            @foreach ($rendezvous as $rendezvou)  
                                <td>{{$rendezvou->nom}} {{$rendezvou->prenom}}</td>
                                <td>{{$rendezvou->isFirstTime}}</td>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-xxl-6 col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لائحة المرضى اليومية</h3>
                </div>
                <div class="card-body">
                    <canvas id="areaChart_1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لائحة المرضى اليومية</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3">Name</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3">Edit</th>
                                </tr>
                            </thead>
                            <tbody id="customers">
                                <tr class="btn-reveal-trigger">
                                   
                                    <td class="py-2">Herman Beck</td>
                                    <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                class="la la-trash-o"></i></a>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Today --}}
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end ModalToday --}}
@endsection
