@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة الادوار</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('permissions.index', false) }}">الادوار</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة الادوار </a></li>
            </ol>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">
                                اضف
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <table id="example3" class="display dataTable no-footer  table-bordered table-responsive-sm"
                                    style="min-width: 845px" role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr>
                                            <th>
                                                الرقم
                                            </th>
                                            <th>
                                                المستعمل بالعربية
                                            </th>
                                            <th>
                                                المستعمل بالفرنسية
                                            </th>
                                            <th class="text-center">
                                                الرخص
                                            </th>
                                            <th>
                                                &nbsp;
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $role)
                                            <tr data-entry-id="{{ $role->id }}">
                                                <td>
                                                    {{ $role->id }}
                                                </td>
                                                <td>
                                                    {{ $role->titre_arabe }}
                                                </td>
                                                <td>
                                                    {{ $role->titre }}
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#modal-show-{{ $role->id }}"
                                                        data-id="{{ $role->id }}">
                                                        تفاصيل
                                                    </a>
                                                </td>
                                                <td class="text-center">

                                                    <a class="btn btn-xs " href="{{ route('roles.show', $role->id) }}">
                                                        <i class="fas fa-eye text-info"></i>
                                                    </a>

                                                    <a class="btn btn-xs " href="{{ route('roles.edit', $role->id) }}">
                                                        <i class="fas fa-edit text-wanrning"></i>
                                                    </a>


                                                </td>
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

    <!-- Modal  details-->
    @foreach ($roles as $role)
        <div class="col-lg-12">
            <div class="modal fade" id="modal-show-{{ $role->id }}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div id="container" class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-orange ">
                            <h3 class="modal-title text-center" id="exampleModalLabel">الرخص</h3>
                            <button type="button" class="close" style="font-size: 40px !important"
                                data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-black">×</span></button>
                        </div>
                        <div class="modal-body">
                            {{-- <ul type="square" class="popup "> --}}
                            @foreach ($role->permissions as $key => $item)
                                {{-- <li  class="ml-1">{{ $item->titre }}</li> --}}
                                <i class="fas fa-square mr-2"></i> <span
                                    class="text-bold">{{ $item->titre }}</span><br>
                            @endforeach
                            {{-- </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection
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
