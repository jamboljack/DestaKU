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
                        Menu Permohonan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="<?=site_url('admin/pengajuan');?>" class="kt-subheader__breadcrumbs-link">
                        Pengajuan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Form Penilaian : <?=$detail->pengajuan_no_pendaftaran.' | DESA '.$detail->nama_kel.' KEC. '.$detail->nama_kec;?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet kt-portlet--head-sm kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--sm">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-edit"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Form Penilaian : <?=$detail->pengajuan_no_pendaftaran.' | DESA '.$detail->nama_kel;?></h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="<?=site_url('admin/pengajuan');?>" class="btn btn-clean">
                                <i class="la la-arrow-left"></i><span class="kt-hidden-mobile"> Batal</span>
                            </a>
                            <a href="<?=site_url('admin/pengajuan/printskor/'.$detail->pengajuan_id);?>" class="btn btn-clean" target="_blank"><i class="la la-print"></i><span class="kt-hidden-mobile"> Print Hasil</span></a>
                            <a href="javascript:;" onclick="KonfirmNilai(<?=$detail->pengajuan_id;?>)" class="btn btn-clean"><i class="flaticon2-checkmark"></i><span class="kt-hidden-mobile"> Konfirmasi Nilai</span></a>
                        </div>
                    </div>
                    <div class="kt-portlet__body" id="body-table">
                        <form class="kt-form" id="formInput" name="formInput" method="post">
                        <input type="hidden" name="pengajuan_id" value="<?=$detail->pengajuan_id;?>">
                            <table class="table table-striped table-bordered" id="tableData">
                                <thead>
                                    <tr>
                                        <td width="5%" align="center">NO</td>
                                        <td width="85%" align="center">INDIKATOR</td>
                                        <td width="10%" align="center">SKOR</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total = 0;
                                    foreach($listIndikatorNilai as $r) {
                                        $pengajuan_nilai_id = $r->pengajuan_nilai_id;
                                        $listSub = $this->db->order_by('indikator_detail_nama', 'asc')->get_where('v_indikator_penilaian_detail', array('pengajuan_nilai_id' => $pengajuan_nilai_id))->result() 
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="2"><b><?=$r->indikator_nama;?></b></td>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach($listSub as $s) {
                                        $pengajuan_nilai_detail_id = $s->pengajuan_nilai_detail_id;
                                    ?>
                                    <tr>
                                        <td align="center"><?=$no;?></td>
                                        <td><?=$s->indikator_detail_nama;?></td>
                                        <td><input type="hidden" name="id[]" value="<?=$pengajuan_nilai_detail_id;?>"/><input type="text" name="nama[<?=$pengajuan_nilai_detail_id;?>]" class="form-control number" autocomplete="off" placeholder="0" value="<?=$s->pengajuan_nilai_detail_skor;?>" maxlength="1"></td>
                                    </tr>
                                    <?php
                                        $total = ($total+$s->pengajuan_nilai_detail_skor);
                                        $no++;
                                        }
                                    } 
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" align="center"><b>JUMLAH TOTAL</b></td>
                                        <td><input type="text" name="total" id="total" class="form-control" value="<?=number_format($total,0,'',',');?>" readonly></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <div class="kt-portlet__foot" align="center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Skor</button>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
input {
    text-align: right;
}
</style>

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.number').maskMoney({thousands:',', precision:0});
});

$(document).ready(function(){
    $(".number").each(function() {
        $(this).keyup(function(){
            calculateSum();
        });
    });
});

function calculateSum() {
    var total = 0;
    $(".number").each(function() {
        if(this.value.length!=0) {
            nilai = this.value;
            total += parseInt(nilai.replace(/[,]/g, ''));
        }
    });
    
    var locale    = 'en';
    var options   = {minimumFractionDigits: 0, maximumFractionDigits: 0};
    var formatter = new Intl.NumberFormat(locale, options);
    document.getElementById("total").value = formatter.format(total);
}

$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
        },
        messages: {
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/pengajuan/updatenilai');?>",
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

function KonfirmNilai(pengajuan_id) {
    var id = pengajuan_id;
    swal.fire({
        title: 'Anda Yakin ?',
        text: "Data Penilaian ini akan di Konfirmasi.",
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
                url : "<?=site_url('admin/pengajuan/konfirmnilai')?>/"+id,
                type: "POST",
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Konfirmasi Nilai Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location="<?=site_url('admin/pengajuan');?>";
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Proses Data');
                }
            });
        }
    });
}
</script>