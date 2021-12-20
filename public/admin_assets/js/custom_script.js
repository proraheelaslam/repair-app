$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });
});
var delID = 0;
var delUrl = "";
$("document").ready(function () {
    $("#btn-confirm").click(function(e) {
        if(delID != 0){
            $.ajax({
                url: delUrl+delID,
                type: 'DELETE',  // user.destroy
                data:{"csrf-token":"{{ csrf_token() }}", "id": delID},
                success: function(result) {
                    // Do something with the result
                    location.reload();
                }
            });
        }
    });

}); //..... end of ready() .....//
function show_del_confirm_popup(url,del_id){
    delUrl = url;
    delID = del_id;
    $('.confirm_modal-title').html('Confirm Delete');
    $('.confirm_modal-body').html('Are you sure you want to delete?');
    $("#confirm_modal").modal("show");
}
function createDatatable(url,cols){
    var table = $('#kt_datatable').DataTable({
        //order:[[0,'desc']],
        processing: true,
        serverSide: true,
        pageLength: 25,
        searching : true,
        ajax: url,
        initComplete:function( settings, json){
            $('.tooltips').tooltip();
        },
        columns: cols
    });
}
