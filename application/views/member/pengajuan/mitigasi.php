<form class="kt-form" id="formInputMitigasi" name="formInputMitigasi" method="post">
<input type="hidden" name="pengajuan_id_mitigasi" value="<?=$detail->pengajuan_id;?>">

    <?php require 'infoarea.php'; ?>

    <h5 class="kt-section__title">Jenis Bencana :</h5>
    <?php
    $pengajuan_id = $detail->pengajuan_id;
    $no           = 1;
    foreach ($listMitigasi as $r) {
        $mitigasi_id = $r->mitigasi_id;
    ?>
    <h5 class="kt-section__title"><?=$no . '. ' . $r->mitigasi_nama;?></h5>
    <?php
    $listPilihan = $this->db->get_where('destaku_mitigasi_pilihan', array('mitigasi_id' => $mitigasi_id))->result();
        foreach ($listPilihan as $p) {
            $mitigasi_pilihan_id = $p->mitigasi_pilihan_id;
            $listDetail          = $this->db->get_where('v_pengajuan_mitigasi', array('mitigasi_pilihan_id' => $mitigasi_pilihan_id, 'pengajuan_id' => $pengajuan_id))->result();
    ?>
    <h6 class="kt-section__title"><?=$p->mitigasi_pilihan_nama;?></h6>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-11">
            <?php foreach($listDetail as $d) { ?>
            <div class="form-group">
                <div class="kt-checkbox-list">
                    <label class="kt-checkbox">
                        <input type="hidden" name="id[]" value="<?=$d->pengajuan_mitigasi_id;?>"/>
                        <input type="checkbox" id="chk<?=$d->pengajuan_mitigasi_id; ?>" value="1" name="check[<?=$d->pengajuan_mitigasi_id;?>]" <?=($d->pengajuan_mitigasi_checked==1?'checked':'');?>> <?=$d->mitigasi_detail_nama;?>
                        <span></span>
                    </label>
                </div>
                <?php if ($d->mitigasi_detail_tipe=='T') { ?>
                <input type="text" name="nama[<?=$d->pengajuan_mitigasi_id;?>]" class="form-control" autocomplete="off" placeholder="Sebutkan Keterangan" value="<?=$d->pengajuan_mitigasi_keterangan;?>">
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php
        }
        $no++;
    }
    ?>

    <?php if ($detail->pengajuan_status != 'N') { ?>
    <div class="kt-portlet__foot" align="center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
    </div>
    <?php } ?>
</form>

<script type="text/javascript">
$(document).ready(function() {
    $( "#formInputMitigasi" ).validate({
        rules: {
        },
        messages: {
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInputMitigasi').serialize();
            $.ajax({
                url: "<?=site_url('member/pengajuan/updatemitigasi');?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Update Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});
</script>