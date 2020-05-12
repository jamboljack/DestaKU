<script src="<?=base_url('backend/assets/js/jquery.maskMoney.min.js');?>"></script>

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
                        Data Penilaian
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Bobot
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
                        Daftar Bobot
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
                            <th>Nama Bobot</th>
                            <th width="10%">Minimal</th>
                            <th width="10%">Maksimal</th>
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
$(document).ready(function() {
    $('.number').maskMoney({thousands:',', precision:0});
});

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
            "url": "<?=site_url('admin/bobot/data_list');?>",
            "type": "POST"
        },
        "columnDefs": [
            {
                "targets": [ 0, 1 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

function hapusData(bobot_id) {
    var id = bobot_id;
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
                url : "<?=site_url('admin/bobot/deletedata')?>/"+id,
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
                    url: "<?=site_url('admin/bobot/register_nama_exists'); ?>",
                    type: "post",
                    data: {
                        nama: function() { 
                            return $("#nama").val(); 
                        }
                    }
                }
            },
            minimal: { required: true },
            maksimal: { required: true }
        },
        messages: { 
            nama: { required :'Nama Bobot required', remote:'Nama Bobot sudah Ada' },
            minimal: { required :'Nilai Minimal required' },
            maksimal: { required :'Nilai Maksimal required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInput").serialize();
            $.ajax({
                url: '<?=site_url('admin/bobot/savedata');?>',
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
    $("#minimal").val('');
    $("#maksimal").val('');

    var MValid = $("#formInput");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

function edit_data(id) {
    $('#formEdit')[0].reset();
    $.ajax({
        url : "<?=site_url('admin/bobot/get_data/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#id').val(data.bobot_id);
            $('#bobot_nama').val(data.bobot_nama);
            $('#bobot_minimal').val(formatNumber(data.bobot_minimal));
            $('#bobot_maksimal').val(formatNumber(data.bobot_maksimal));
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
            minimal: { required: true },
            maksimal: { required: true }
        },
        messages: { 
            nama: { required :'Nama Bobot required' },
            minimal: { required :'Nilai Minimal required' },
            maksimal: { required :'Nilai Maksimal required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formEdit").serialize();
            $.ajax({
                url: '<?=site_url('admin/bobot/updatedata');?>',
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
                        <label>Nama Bobot</label>
                        <input type="text" class="form-control" placeholder="Input Nama Bobot" name="nama" id="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nilai Minimal</label>
                        <input type="text" class="form-control number col-md-6" placeholder="0" name="minimal" id="minimal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nilai Maksimal</label>
                        <input type="text" class="form-control number col-md-6" placeholder="0" name="maksimal" id="maksimal" autocomplete="off">
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
                        <label>Nama Bobot</label>
                        <input type="text" class="form-control" placeholder="Input Nama Bobot" name="nama" id="bobot_nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nilai Minimal</label>
                        <input type="text" class="form-control number col-md-6" placeholder="0" name="minimal" id="bobot_minimal" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Nilai Maksimal</label>
                        <input type="text" class="form-control number col-md-6" placeholder="0" name="maksimal" id="bobot_maksimal" autocomplete="off">
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