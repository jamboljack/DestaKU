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
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Pengajuan
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
                        Daftar Pengajuan
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <a href="javascript:;" onclick="printData()" class="btn btn-clean">
                            <i class="fa fa-print"></i><span class="kt-hidden-mobile">Print</span>
                        </a>
                        <button type="button" class="btn btn-warning btn-elevate btn-icon-sm" data-toggle="modal" data-target="#filterData"><i class="fa fa-search"></i><span class="kt-hidden-mobile"> Filter Data</span></button>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body" id="body-table">
                <table class="table table-striped table-hover table-bordered" id="tableData">
                    <thead>
                        <tr>
                            <th width="7%"></th>
                            <th width="5%">No</th>
                            <th width="5%">Tahun</th>
                            <th width="7%">Tanggal</th>
                            <th width="15%">No. Pendaftaran</th>
                            <th >Kecamatan</th>
                            <th>Desa/Kelurahan</th>
                            <th width="5%">Skor</th>
                            <th width="15%">Kategori</th>
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

<script type="text/javascript">
$(document).ready(function() {
    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    $('.date-picker').datepicker({
        rtl: KTUtil.isRTL(),
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        orientation: "bottom left",
        templates: arrows
    });
});

function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "lengthMenu": [
                [20, 30, 50, 75, 100, -1],
                [20, 30, 50, 75, 100, "All"]
        ],
        "pageLength": 20,
        "ajax": {
            "url": "<?=site_url('admin/pengajuan/data_list');?>",
            "type": "POST",
            "data": function(data) {
                data.tgl_dari    = $('#tgl_dari').val();
                data.tgl_sampai  = $('#tgl_sampai').val();
                data.lstStatus   = $('#lstStatus').val();
                data.lstBobot    = $('#lstBobot').val();
            }
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 2, 3, 9 ],
                "className": "dt-center",
            },
            {
                "targets": [ 7 ],
                "className": "dt-right",
            }
        ],
    });

    $('#btn-filter').click(function() {
        reload_table();
        $('#filterData').modal('hide');
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        reload_table();
        $('#filterData').modal('hide');
    });
});

function hapusData(pengajuan_id) {
    var id = pengajuan_id;
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
                url : "<?=site_url('admin/pengajuan/deletedata')?>/"+id,
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

function undoDataDraft(pengajuan_id) {
    var id = pengajuan_id;
    swal.fire({
        title: 'Anda Yakin ?',
        text: "Data ini akan di Kirim Balik.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url : "<?=site_url('admin/pengajuan/undodatadraft')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Berkas Di Kembalikan ke Desa",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Proses');
                }
            });
        }
    });
}

function undoData(pengajuan_id) {
    var id = pengajuan_id;
    swal.fire({
        title: 'Anda Yakin ?',
        text: "Data ini akan di Undo.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url : "<?=site_url('admin/pengajuan/undodata')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Proses Undo Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Proses Undo');
                }
            });
        }
    });
}

function loadingTable() {
    KTApp.block('#body-table', {
        overlayColor: '#000000',
        type: 'v2',
        state: 'primary',
        message: 'Sedang Proses ...'
    });

    setTimeout(function() {
        KTApp.unblock('#body-table');
    }, 5000);
}

function konfirmData(pengajuan_id) {
    var id = pengajuan_id;
    swal.fire({
        title: 'Anda Yakin ?',
        text: "Data ini akan di Konfirmasi.",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then(function(result) {
        if (result.value) {
            loadingTable();
            $.ajax({
                url : "<?=site_url('admin/pengajuan/konfirmdata')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Konfirmasi Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Proses Data');
                }
            });
        }
    });
}

function printData() {
    var dari  = $('#tgl_dari').val();
    if (dari == '') {
        var tgl_dari = 'all';
    } else {
        var tgl_dari = dari;
    }
    var smp  = $('#tgl_sampai').val();
    if (smp == '') {
        var tgl_sampai = 'all';
    } else {
        var tgl_sampai = smp;
    }
    var sts  = $('#lstStatus').val();
    if (sts == '') {
        var status = 'all';
    } else {
        var status = sts;
    }
    var bbt  = $('#lstBobot').val();
    if (bbt == '') {
        var bobot = 'all';
    } else {
        var bobot = bbt;
    }
    var url        = "<?=site_url('admin/pengajuan/printdata/');?>"+tgl_dari+"/"+tgl_sampai+"/"+status+"/"+bobot;
    window.open(url, "_blank");
}
</script>

<div class="modal fade" id="filterData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-search"></i> Filter Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" id="form-filter">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Periode</label>
                        <div class="input-daterange input-group">
                            <input type="text" class="form-control date-picker" name="tgl_dari" id="tgl_dari" autocomplete="off" placeholder="DD-MM-YYYY" />
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                            </div>
                            <input type="text" class="form-control date-picker" name="tgl_sampai" id="tgl_sampai" autocomplete="off" placeholder="DD-MM-YYYY"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="lstStatus" id="lstStatus">
                            <option value="">- SEMUA -</option>
                            <option value="B">Baru</option>
                            <option value="K">Konfirmasi</option>
                            <option value="N">Penilaian</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="lstBobot" id="lstBobot">
                            <option value="">- SEMUA -</option>
                            <?php foreach($listBobot as $r) { ?>
                            <option value="<?=$r->bobot_id;?>"><?=$r->bobot_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="btn-filter"><i class="fa fa-search"></i> Filter</button>
                    <button type="button" class="btn btn-default" id="btn-reset"><i class="flaticon2-refresh"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>