@extends('masterPage')
@section('etudiantContent')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>لائحة الرخص</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/acceuil">الرئيسية</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('permissions.index', false) }}">الرخص</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">لائحة الرخص </a></li>
            </ol>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade col-lg-12 active show">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
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
                                                الرخصة
                                            </th>
                                            <th>
                                                {{-- &nbsp; --}}
                                                الاجراءات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $key => $permission)
                                            <tr data-entry-id="{{ $permission->id }}">
                                                <td>
                                                    {{ $permission->id ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $permission->titre ?? '' }}
                                                </td>
                                                <td class="text-center">

                                                    <a class="btn btn-xs"
                                                        href="{{ route('permissions.show', $permission->id) }}">
                                                        <i class="fas fa-eye text-info"></i>
                                                    </a>

                                                    <a class="btn btn-xs"
                                                        href=" {{ route('permissions.edit', $permission->id) }}">
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
