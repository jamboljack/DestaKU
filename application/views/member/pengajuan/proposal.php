<form class="kt-form" id="formInputProposal" name="formInputProposal" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_proposal" value="<?=$detail->pengajuan_id;?>">
    <?php require 'infoarea.php'; ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataBerkas">
                <thead>
                    <tr>
                        <th width="5%"></th>
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
function reload_table_proposal() {
    tableProposal.ajax.reload(null,false);
}

var tableProposal;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableProposal = $('#tableDataBerkas').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_berkas_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

function edit_data(id) {
    $('#formUploadBerkas')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_berkas/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_berkas_id').val(data.pengajuan_berkas_id);
            $('#berkas_nama').val(data.berkas_nama);
            $('#formModalUploadBerkas').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

$(document).ready(function() {
    $( "#formUploadBerkas" ).validate({
        rules: { 
            pdf: { required: true }
        },
        messages: { 
            pdf: { required :'PDF required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            var formData = new FormData($('#formUploadBerkas')[0]);
            $.ajax({
                url: '<?=site_url('member/pengajuan/uploadberkas');?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal.fire({
                            title:"Sukses",
                            text: "Upload Data Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        });
                    } else {
                        swal.fire({
                            title:"Error",
                            text: "Gagal ! Type File harus PDF",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                    }
                    $('#formModalUploadBerkas').modal('hide');
                    reload_table_proposal();
                },
                error: function (response) {
                    swal({
                        title:"Error",
                        text: "Upload Data Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                    $('#formModalUploadBerkas').modal('hide');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});

function viewBerkas(id) {
    $('#formViewBerkas')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_preview/');?>"+id,
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

<div class="modal fade" id="formModalUploadBerkas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand fa fa-upload"></i> Form Upload Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formUploadBerkas" id="formUploadBerkas" enctype="multipart/form-data">
                <input type="hidden" name="pengajuan_berkas_id" id="pengajuan_berkas_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Berkas</label>
                        <input type="text" class="form-control" name="berkas_nama" id="berkas_nama" readonly>
                    </div>
                    <div class="form-group">
                        <label>Upload File (PDF)</label>
                        <input type="file" class="form-control" name="pdf" accept=".pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="flaticon2-cancel-music"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

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