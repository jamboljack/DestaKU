<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard</h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Menu Permohonan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="<?=site_url('member/pengajuan');?>" class="kt-subheader__breadcrumbs-link">
                        Pengajuan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Daftar Foto Wisata Budaya : <?=$detail->pengajuan_wisata_budaya_nama;?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--sm">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-list-1"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Daftar Foto Wisata Budaya : <?=$detail->pengajuan_wisata_budaya_nama;?>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="<?=site_url('member/pengajuan/editdata/'.$detail->pengajuan_id);?>" class="btn btn-clean">
                            <i class="la la-arrow-left"></i><span class="kt-hidden-mobile"> Batal</span>
                        </a>
                        <button type="button" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#formModalAdd"><i class="fa fa-plus-circle"></i><span class="kt-hidden-mobile"> Tambah</span></button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <table class="table table-striped table-hover table-bordered" id="tableData">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="5%">No</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
    var pengajuan_wisata_budaya_id = '<?=$detail->pengajuan_wisata_budaya_id;?>';
    table = $('#tableData').DataTable({
        "info": false,
        "searching": false,
        "paging": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_wisata_budaya_foto_list/');?>"+pengajuan_wisata_budaya_id,
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [ 0, 1 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1 ],
                "className": "dt-center",
            }
        ],
    });
});

function hapusData(pengajuan_wisata_budaya_foto_id) {
    var id = pengajuan_wisata_budaya_foto_id;
    swal.fire({
        title: 'Anda Yakin ?',
        text: "Data ini akan di Hapus.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url : "<?=site_url('member/pengajuan/deletedatafotobudaya')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Hapus Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus Data');
                }
            });
        }
    });
}

$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: { 
            foto: { required: true }
        },
        messages: { 
            foto: { required :'Foto required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            var formData = new FormData($('#formInput')[0]);
            $.ajax({
                url: '<?=site_url('member/pengajuan/savedatafotobudaya');?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal.fire({
                            title:"Sukses",
                            text: "Simpan Data Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        });
                    } else {
                        swal.fire({
                            title:"Info",
                            text: "File tidak Sesuai",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "info"
                        });
                    }
                    $('#formModalAdd').modal('hide');
                    resetformInput();
                    reload_table();
                },
                error: function (response) {
                    swal.fire({
                        title:"Error",
                        text: "Simpan Data Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                    $('#formModalAdd').modal('hide');
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});

function resetformInput() {
    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}
</script>

<div class="modal fade" id="formModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-add"></i> Form Tambah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInput" id="formInput" enctype="multipart/form-data">
            <input type="hidden" name="pengajuan_wisata_budaya_id" value="<?=$detail->pengajuan_wisata_budaya_id;?>">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Upload Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control" autocomplete="off" accept=".png,.jpg,.jpeg">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="flaticon2-cancel-music"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>