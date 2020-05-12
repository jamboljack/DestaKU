<form class="kt-form" id="formInputProposal" name="formInputProposal" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_proposal" value="<?=$detail->pengajuan_id;?>">
    <?php require 'infoarea.php'; ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataBerkas">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Berkas</th>
                        <th width="10%">Preview</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script type="text/javascript">
function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    table = $('#tableDataBerkas').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/pengajuan/data_berkas_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 2 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2 ],
                "className": "dt-center",
            }
        ],
    });
});

function viewBerkas(id) {
    $('#formViewBerkas')[0].reset();
    $.ajax({
        url : "<?=site_url('admin/pengajuan/get_data_preview/');?>"+id,
        type: "GET",
        dataType: "html",
        success: function(data) {
            $("#body-preview").html(data);
            $('#formModalViewBerkas').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}
</script>

<div class="modal fade" id="formModalViewBerkas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-search"></i> Preview Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formViewBerkas" id="formViewBerkas">
                <div class="modal-body" id="body-preview">
                    <a class="media"></a>
                </div>
            </form>
        </div>
    </div>
</div>