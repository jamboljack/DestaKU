<?php require 'infoarea.php'; ?>
<h6 class="kt-section__title">I. Wisata Alam</h6>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered" id="tableDataWisataAlam">
            <thead>
                <tr>
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
            "url": "<?=site_url('admin/pengajuan/data_wisata_alam_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_wisata_budaya_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_wisata_buatan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 3 ],
                "className": "dt-center",
            }
        ],
    });
});
</script>