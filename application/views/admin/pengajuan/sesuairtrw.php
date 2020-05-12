<?php require 'infoarea.php'; ?>

<?php 
$no = 1;
foreach($listRTRWGrup as $r) { 
?>
<h6 class="kt-section__title"><?=$no.'. '.$r->rtrw_grup_nama;?></h6>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered" id="tableDataRTRW<?=$no;?>">
            <thead>
                <tr>
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
<?php 
    $no++;
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
            <div class="alert-text">
                <b>KETERANGAN :</b><br>
                <p>Apabila semua jawaban <b>TIDAK</b>, maka harus ada <b>REKOMENDASI KAJIAN TEKNIS</b> dari Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Kudus.</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function reload_table_rtrw() {
    <?php 
    $no = 1;
    foreach($listRTRWGrup as $r) { 
    ?>
    tableDataRTRW<?=$no;?>.ajax.reload(null,false);
    <?php 
        $no++;
    } 
    ?>
}

<?php 
$no = 1;
foreach($listRTRWGrup as $r) { 
?>
var tableDataRTRW<?=$no;?>;
$(document).ready(function() {
    var pengajuan_id       = '<?=$detail->pengajuan_id;?>';
    var rtrw_grup_id       = '<?=$r->rtrw_grup_id;?>';
    tableDataRTRW<?=$no;?> = $('#tableDataRTRW<?=$no;?>').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/pengajuan/data_rtrw_list/');?>"+pengajuan_id+"/"+rtrw_grup_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2 ],
                "className": "dt-center",
            }
        ],
    });
});
<?php 
    $no++;
} 
?>

function YaData(pengajuan_rtrw_id) {
    var id = pengajuan_rtrw_id;
    $.ajax({
        url : "<?=site_url('admin/pengajuan/pilihya')?>/"+id,
        type: "POST",
        success: function(data) {
            reload_table_rtrw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error Proses Data');
        }
    }); 
}

function TidakData(pengajuan_rtrw_id) {
    var id = pengajuan_rtrw_id;
    $.ajax({
        url : "<?=site_url('admin/pengajuan/pilihtidak')?>/"+id,
        type: "POST",
        success: function(data) {
            reload_table_rtrw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error Proses Data');
        }
    }); 
}
</script>