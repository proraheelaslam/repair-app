@extends('admin.layout.new_app')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">

        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
           @include('admin/common/flash_messages')
            @include('admin/common/breadcrumbs')
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Manage Customers</h3>
                    </div>
                    <div class="card-toolbar">

                        <!--begin::Button-->
                        <a href="<?php echo URL::to('/')?>/{{$data['resource']}}/create" class="btn btn-primary font-weight-bolder">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo7/dist/assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>New Record</a>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>GST Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->


        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@include('admin/common/confirmation_modal')
@endsection

@section('scripts')
<script type="text/javascript">

    var delID  = 0;
    var passID = 0;
    var ID     = 0;

    //re-init tooltips in custom-scripts-header.js
    //reinittooltips('kt_datatable');

    function delete_record(del_id){
        delID = del_id; ID = 0;
        $('.confirm_modal-title').html('Confirm Delete');
        $('.confirm_modal-body').html('Are you sure you want to delete?');
        $("#confirm_modal").modal("show");
    }


    function delete_record(del_id){
        let url = "{{URL::to('/')}}/{{$data['resource']}}/";
        show_del_confirm_popup(url,del_id);
    }

    $(function () {
        let url = "{{URL::to($data['resource'].'/get-ajax' ) }}";
        let cols = [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone_number', name: 'phone_number' },
            { data: 'gst_number', name: 'gst_number' },
            { data: 'action', orderable: false, searchable: false}
        ];
        createDatatable(url,cols);

    });


</script>
@endsection
