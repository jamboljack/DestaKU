<form class="kt-form" id="formInputWisatawan" name="formInputWisatawan" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_wisatawan" value="<?=$detail->pengajuan_id;?>">
    <?php require 'infoarea.php'; ?>
    <h6 class="kt-section__title">I. Data Pengunjung / Wisatawan (dalam 1 tahun)</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Mancanegara</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control number" name="mancanegara" autocomplete="off" placeholder="0" value="<?=number_format($detailwisatawan->pengajuan_wisatawan_mancanegara,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nusantara</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control number" name="nusantara" autocomplete="off" placeholder="0" value="<?=number_format($detailwisatawan->pengajuan_wisatawan_nusantara,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">II. Calon Pengelola Desa Wisata</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Desa Wisata</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_desa" autocomplete="off" placeholder="Input Nama Desa Wisata" value="<?=$detailwisatawan->pengajuan_wisatawan_nama_desa;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="alamat_desa" autocomplete="off" placeholder="Input Alamat Sekretariat" value="<?=$detailwisatawan->pengajuan_wisatawan_alamat_desa;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Pengelola</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_kelompok" autocomplete="off" placeholder="Input Nama Pengelola" value="<?=$detailwisatawan->pengajuan_wisatawan_nama_lembaga;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat Pengelola</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="alamat" autocomplete="off" placeholder="Input Alamat Pengelola" value="<?=$detailwisatawan->pengajuan_wisatawan_alamat;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">No. SK kepala Desa</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="no_sk" autocomplete="off" placeholder="Input No. SK Kepala Desa" value="<?=$detailwisatawan->pengajuan_wisatawan_no_sk;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Ketua</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_ketua" autocomplete="off" placeholder="Input Nama Ketua" value="<?=$detailwisatawan->pengajuan_wisatawan_ketua;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Wakil Ketua</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_wakil_ketua" autocomplete="off" placeholder="Input Nama Wakil Ketua" value="<?=$detailwisatawan->pengajuan_wisatawan_wakil_ketua;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Sekretaris</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_sekretaris" autocomplete="off" placeholder="Input Nama Sekretaris" value="<?=$detailwisatawan->pengajuan_wisatawan_sekretaris;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 1</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_1" autocomplete="off" placeholder="Input Nama Anggota 1" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_1;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 2</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_2" autocomplete="off" placeholder="Input Nama Anggota 2" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_2;?>">
                </div>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 3</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_3" autocomplete="off" placeholder="Input Nama Anggota 3" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_3;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 4</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_4" autocomplete="off" placeholder="Input Nama Anggota 4" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_4;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 5</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_5" autocomplete="off" placeholder="Input Nama Anggota 5" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_5;?>">
                </div>
            </div>
        </div>
    </div>
    <?php if ($detail->pengajuan_status != 'N') { ?>
    <div class="kt-portlet__foot" align="center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
    </div>
    <?php } ?>
</form>

<script type="text/javascript">
$(document).ready(function() {
    $( "#formInputWisatawan" ).validate({
        rules: { 
            mancanegara: { required: true },
            nusantara: { required: true },
            nama_desa: { required: true },
            alamat_desa: { required: true },
            nama_kelompok: { required: true },
            alamat: { required: true },
            no_sk: { required: true },
            nama_ketua: { required: true },
            nama_wakil_ketua: { required: true },
            nama_sekretaris: { required: true }
        },
        messages: { 
            mancanegara: { required :'Mancanegara required' },
            nusantara: { required :'Nusantara required' },
            nama_desa: { required :'Nama Desa Wisata required' },
            alamat_desa: { required :'Alamat required' },
            nama_kelompok: { required :'Nama Pengelola required' },
            alamat: { required :'Alamat Pengelola required' },
            no_sk: { required :'No. SK Kepala Desa required' },
            nama_ketua: { required :'Nama Ketua required' },
            nama_wakil_ketua: { required :'Nama Wakil Ketua required' },
            nama_sekretaris: { required :'Nama Sekretaris required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInputWisatawan').serialize();
            $.ajax({
                url: '<?=site_url('member/pengajuan/updatedatawisatawan');?>',
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