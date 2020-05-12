<?php require 'infoarea.php'; ?>
<h6 class="kt-section__title">I. Wisata Alam</h6>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered" id="tableDataWisataAlam">
            <thead>
                <tr>
                    <th width="5%">
                        <?php if ($detail->pengajuan_status != 'N') { ?>
                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalAlam">Tambah</button>
                        <?php } ?>
                    </th>
                    <th width="5%">No</th>
                    <th>Daya Tarik Wisata</th>
                    <th width="20%">Tema</th>
                    <th width="10%">Foto</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<h6 class="kt-section__title">II. Wisata Budaya</h6>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered" id="tableDataWisataBudaya">
            <thead>
                <tr>
                    <th width="5%">
                        <?php if ($detail->pengajuan_status != 'N') { ?>
                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalBudaya">Tambah</button>
                        <?php } ?>
                    </th>
                    <th width="5%">No</th>
                    <th>Daya Tarik Wisata</th>
                    <th width="20%">Tema</th>
                    <th width="10%">Foto</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<h6 class="kt-section__title">III. Wisata Buatan</h6>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered" id="tableDataWisataBuatan">
            <thead>
                <tr>
                    <th width="5%">
                        <?php if ($detail->pengajuan_status != 'N') { ?>
                        <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalBuatan">Tambah</button>
                        <?php } ?>
                    </th>
                    <th width="5%">No</th>
                    <th>Daya Tarik Wisata</th>
                    <th width="20%">Tema</th>
                    <th width="10%">Foto</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
var statusalam, statusbudaya, statusbuatan;
statusalam   = 'Tambah';
statusbudaya = 'Tambah';
statusbuatan = 'Tambah';

function reload_table_potensi() {
    tableDataWisataAlam.ajax.reload(null,false);
    tableDataWisataBudaya.ajax.reload(null,false);
    tableDataWisataBuatan.ajax.reload(null,false);
}

// Alam
var tableDataWisataAlam;
$(document).ready(function() {
    var pengajuan_id    = '<?=$detail->pengajuan_id;?>';
    tableDataWisataAlam = $('#tableDataWisataAlam').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_wisata_alam_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputAlam" ).validate({
        rules: { 
            nama_alam: { required: true },
            tema_alam: { required: true }
        },
        messages: { 
            nama_alam: { required :'Daya Tarik Wisata required' },
            tema_alam: { required :'Tema required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputAlam").serialize();
            if (statusalam === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataalam');?>',
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
                        $('#formModalAlam').modal('hide');
                        reload_table_potensi();
                        resetformAlam();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAlam').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataalam');?>',
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
                        $('#formModalAlam').modal('hide');
                        reload_table_potensi();
                        resetformAlam();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAlam').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformAlam() {
    statusalam = 'Tambah';
    var MValid = $("#formInputAlam");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataWisataAlam(id) {
    statusalam = 'Edit';
    $('#formInputAlam')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_alam/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_wisata_alam_id').val(data.pengajuan_wisata_alam_id);
            $('#nama_alam').val(data.pengajuan_wisata_alam_nama);
            $('#tema_alam').val(data.pengajuan_wisata_alam_tema);
            $('#formModalAlam').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataWisataAlam(pengajuan_wisata_alam_id) {
    var id = pengajuan_wisata_alam_id;
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
                url : "<?=site_url('member/pengajuan/deletedataalam')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Hapus Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table_potensi();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus Data');
                }
            });
        }
    });
}

// Budaya
var tableDataWisataBudaya;
$(document).ready(function() {
    var pengajuan_id    = '<?=$detail->pengajuan_id;?>';
    tableDataWisataBudaya = $('#tableDataWisataBudaya').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_wisata_budaya_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputBudaya" ).validate({
        rules: { 
            nama_budaya: { required: true },
            tema_budaya: { required: true }
        },
        messages: { 
            nama_budaya: { required :'Daya Tarik Wisata required' },
            tema_budaya: { required :'Tema required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputBudaya").serialize();
            if (statusbudaya === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatabudaya');?>',
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
                        $('#formModalBudaya').modal('hide');
                        reload_table_potensi();
                        resetformBudaya();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalBudaya').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatabudaya');?>',
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
                        $('#formModalBudaya').modal('hide');
                        reload_table_potensi();
                        resetformBudaya();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalBudaya').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformBudaya() {
    statusbudaya = 'Tambah';
    var MValid = $("#formInputBudaya");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataWisataBudaya(id) {
    statusbudaya = 'Edit';
    $('#formInputBudaya')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_budaya/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_wisata_budaya_id').val(data.pengajuan_wisata_budaya_id);
            $('#nama_budaya').val(data.pengajuan_wisata_budaya_nama);
            $('#tema_budaya').val(data.pengajuan_wisata_budaya_tema);
            $('#formModalBudaya').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataWisataBudaya(pengajuan_wisata_budaya_id) {
    var id = pengajuan_wisata_budaya_id;
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
                url : "<?=site_url('member/pengajuan/deletedatabudaya')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Hapus Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table_potensi();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus Data');
                }
            });
        }
    });
}

// Buatan
var tableDataWisataBuatan;
$(document).ready(function() {
    var pengajuan_id    = '<?=$detail->pengajuan_id;?>';
    tableDataWisataBuatan = $('#tableDataWisataBuatan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_wisata_buatan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputBuatan" ).validate({
        rules: { 
            nama_buatan: { required: true },
            tema_buatan: { required: true }
        },
        messages: { 
            nama_buatan: { required :'Daya Tarik Wisata required' },
            tema_buatan: { required :'Tema required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputBuatan").serialize();
            if (statusbuatan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatabuatan');?>',
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
                        $('#formModalBuatan').modal('hide');
                        reload_table_potensi();
                        resetformBuatan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalBuatan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatabuatan');?>',
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
                        $('#formModalBuatan').modal('hide');
                        reload_table_potensi();
                        resetformBuatan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalBuatan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformBuatan() {
    statusbuatan = 'Tambah';
    var MValid = $("#formInputBuatan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataWisataBuatan(id) {
    statusbuatan = 'Edit';
    $('#formInputBuatan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_buatan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_wisata_buatan_id').val(data.pengajuan_wisata_buatan_id);
            $('#nama_buatan').val(data.pengajuan_wisata_buatan_nama);
            $('#tema_buatan').val(data.pengajuan_wisata_buatan_tema);
            $('#formModalBuatan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataWisataBuatan(pengajuan_wisata_buatan_id) {
    var id = pengajuan_wisata_buatan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatabuatan')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Hapus Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table_potensi();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Hapus Data');
                }
            });
        }
    });
}
</script>

<!-- Alam --->
<div class="modal fade" id="formModalAlam" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Wisata Alam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputAlam" id="formInputAlam" enctype="multipart/form-data">
            <input type="hidden" name="pengajuan_id_alam" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_wisata_alam_id" id="pengajuan_wisata_alam_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Daya Tarik Wisata</label>
                        <input type="text" class="form-control" placeholder="Input Daya Tarik Wisata" name="nama_alam" id="nama_alam" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Tema</label>
                        <input type="text" class="form-control" placeholder="Input Tema" name="tema_alam" id="tema_alam" autocomplete="off">
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

<!-- Budaya --->
<div class="modal fade" id="formModalBudaya" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Wisata Budaya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputBudaya" id="formInputBudaya" enctype="multipart/form-data">
            <input type="hidden" name="pengajuan_id_budaya" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_wisata_budaya_id" id="pengajuan_wisata_budaya_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Daya Tarik Wisata</label>
                        <input type="text" class="form-control" placeholder="Input Daya Tarik Wisata" name="nama_budaya" id="nama_budaya" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Tema</label>
                        <input type="text" class="form-control" placeholder="Input Tema" name="tema_budaya" id="tema_budaya" autocomplete="off">
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

<!-- Buatan --->
<div class="modal fade" id="formModalBuatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Wisata Buatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputBuatan" id="formInputBuatan" enctype="multipart/form-data">
            <input type="hidden" name="pengajuan_id_buatan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_wisata_buatan_id" id="pengajuan_wisata_buatan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Daya Tarik Wisata</label>
                        <input type="text" class="form-control" placeholder="Input Daya Tarik Wisata" name="nama_buatan" id="nama_buatan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Tema</label>
                        <input type="text" class="form-control" placeholder="Input Tema" name="tema_buatan" id="tema_buatan" autocomplete="off">
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