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
                        Pendidikan
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
                        Daftar Pendidikan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
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
                            <th>Nama Pendidikan</th>
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
    table = $('#tableData').DataTable({
        "info": false,
        "searching": false,
        "paging": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/pendidikan/data_list');?>",
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

function hapusData(pendidikan_id) {
    var id = pendidikan_id;
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
                url : "<?=site_url('admin/pendidikan/deletedata')?>/"+id,
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
            nama: {
                required: true,
                remote: {
                    url: "<?=site_url('admin/pendidikan/register_nama_exists'); ?>",
                    type: "post",
                    data: {
                        nama: function() { 
                            return $("#nama").val(); 
                        }
                    }
                }
            }
        },
        messages: { 
            nama: { required :'Nama Pendidikan required', remote:'Nama Pendidikan sudah Ada' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInput").serialize();
            $.ajax({
                url: '<?=site_url('admin/pendidikan/savedata');?>',
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

    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function edit_data(id) {
    $('#formEdit')[0].reset();
    $.ajax({
        url : "<?=site_url('admin/pendidikan/get_data/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.pendidikan_id);
            $('#pendidikan_nama').val(data.pendidikan_nama);
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
            nama: { required: true }
        },
        messages: { 
            nama: { required :'Nama Pendidikan required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formEdit").serialize();
            $.ajax({
                url: '<?=site_url('admin/pendidikan/updatedata');?>',
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-add"></i> Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInput" id="formInput">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pendidikan</label>
                        <input type="text" class="form-control" placeholder="Input Nama Pendidikan" name="nama" id="nama" autocomplete="off">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                        <label>Nama Pendidikan</label>
                        <input type="text" class="form-control" placeholder="Input Nama Pendidikan" name="nama" id="pendidikan_nama" autocomplete="off">
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