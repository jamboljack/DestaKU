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
                        Menu Master
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Data Master
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Mitigasi Bencana : <?=$detail->mitigasi_nama.' - '.$detail->mitigasi_pilihan_nama;?>
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
                        Daftar Mitigasi Bencana : <?=$detail->mitigasi_nama.' - '.$detail->mitigasi_pilihan_nama;?>
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="<?=site_url('admin/mitigasi/listpilihan/'.$detail->mitigasi_id);?>" class="btn btn-clean"><i class="la la-arrow-left"></i><span class="kt-hidden-mobile">Kembali</span></a>
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
                            <th>Keterangan</th>
                            <th width="10%">Status</th>
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
    var mitigasi_pilihan_id = '<?=$detail->mitigasi_pilihan_id;?>';
    table = $('#tableData').DataTable({
        "info": false,
        "searching": false,
        "paging": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/mitigasi/data_detail_list/');?>"+mitigasi_pilihan_id,
            "type": "POST"
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

function hapusData(mitigasi_detail_id) {
    var id = mitigasi_detail_id;
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
                url : "<?=site_url('admin/mitigasi/deletedatadetail')?>/"+id,
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
            nama: { required: true },
            lstStatus: { required: true }
        },
        messages: { 
            nama: { required :'Keterangan required' },
            lstStatus: { required :'Status required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInput").serialize();
            $.ajax({
                url: '<?=site_url('admin/mitigasi/savedatadetail');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Simpan Data Sukses",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    $('#formModalAdd').modal('hide');
                    resetformInput();
                    reload_table();
                },
                error: function() {
                    swal.fire({
                        title:"Error",
                        text: "Simpan Data Gagal",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    $('#formModalAdd').modal('hide');
                    resetformInput();
                }
            });
        }
    });
});

function resetformInput() {
    $("#nama").val('');
    $("#lstStatus").val('');

    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function edit_data(id) {
    $('#formEdit')[0].reset();
    $.ajax({
        url : "<?=site_url('admin/mitigasi/get_data_detail/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.mitigasi_detail_id);
            $('#mitigasi_detail_nama').val(data.mitigasi_detail_nama);
            $('#mitigasi_detail_tipe').val(data.mitigasi_detail_tipe);
            $('#formModalEdit').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

$(document).ready(function() {
    $( "#formEdit" ).validate({
        rules: { 
            nama: { required: true },
            lstStatus: { required: true }
        },
        messages: { 
            nama: { required :'Keterangan required' },
            lstStatus: { required :'Status required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formEdit").serialize();
            $.ajax({
                url: '<?=site_url('admin/mitigasi/updatedatadetail');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Update Data Sukses",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "success"
                    });
                    $('#formModalEdit').modal('hide');
                    reload_table();
                },
                error: function() {
                    swal.fire({
                        title:"Error",
                        text: "Update Data Gagal",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "error"
                    });
                    $('#formModalEdit').modal('hide');
                }
            });
        }
    });
});
</script>

<div class="modal fade" id="formModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-add"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInput" id="formInput">
            <input type="hidden" name="mitigasi_pilihan_id" value="<?=$detail->mitigasi_pilihan_id;?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Input Keterangan" name="nama" id="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="lstStatus" id="lstStatus">
                            <option value="">- Pilih Status -</option>
                            <option value="P">Pilihan</option>
                            <option value="T">Tanya</option>
                        </select>
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

<div class="modal fade" id="formModalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formEdit" id="formEdit">
            <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Input Keterangan" name="nama" id="mitigasi_detail_nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="lstStatus" id="mitigasi_detail_tipe">
                            <option value="">- Pilih Status -</option>
                            <option value="P">Pilihan</option>
                            <option value="T">Tanya</option>
                        </select>
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