<form class="kt-form" id="formInputWisatawan" name="formInputWisatawan" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_wisatawan" value="<?=$detail->pengajuan_id;?>">
    <?php require 'infoarea.php'; ?>
    <h6 class="kt-section__title">I. Data Pengunjung / Wisatawan (dalam 1 tahun)</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Mancanegara</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control number" name="mancanegara" autocomplete="off" placeholder="0" value="<?=number_format($detailwisatawan->pengajuan_wisatawan_mancanegara,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nusantara</label>
                <div class="col-lg-4">
                    <input type="text" class="form-control number" name="nusantara" autocomplete="off" placeholder="0" value="<?=number_format($detailwisatawan->pengajuan_wisatawan_nusantara,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control" name="nama_desa" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_nama_desa;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat Sekretariat</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="alamat_desa" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_alamat_desa;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Pengelola</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_kelompok" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_nama_lembaga;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat Pengelola</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="alamat" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_alamat;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Ketua</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_ketua" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_ketua;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Wakil Ketua</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_wakil_ketua" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_wakil_ketua;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Sekretaris</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_sekretaris" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_sekretaris;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 1</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_1" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_1;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 2</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_2" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_2;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 3</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_3" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_3;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 4</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_4" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_4;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Anggota 5</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="nama_anggota_5" autocomplete="off" value="<?=$detailwisatawan->pengajuan_wisatawan_anggota_5;?>" readonly>
                </div>
            </div>
        </div>
    </div>
</form>