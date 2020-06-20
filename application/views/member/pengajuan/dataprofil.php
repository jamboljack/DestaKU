<form class="kt-form" id="formInput" name="formInput" method="post">
<input type="hidden" name="id" value="<?=$detail->pengajuan_id;?>">
    <?php require 'infoarea.php'; ?>
    <h6 class="kt-section__title">I. Data Geografi</h6>
    <h6 class="kt-section__title">1. Batas-Batas</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Utara</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_utara" autocomplete="off" placeholder="Input Batas Utara" value="<?=$detail->pengajuan_batas_utara;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Timur</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_timur" autocomplete="off" placeholder="Input Batas Timur" value="<?=$detail->pengajuan_batas_timur;?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Selatan</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_selatan" autocomplete="off" placeholder="Input Batas Selatan" value="<?=$detail->pengajuan_batas_selatan;?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Barat</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_barat" autocomplete="off" placeholder="Input Batas Barat" value="<?=$detail->pengajuan_batas_barat;?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">2. Jarak</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Utara-Selatan Terjauh</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="utara_selatan" autocomplete="off" placeholder="0.00 Km" value="<?=number_format($detail->pengajuan_jarak_utara_selatan,2,'.',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Barat-Timur Terjauh</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="barat_timur" autocomplete="off" placeholder="0.00 Km" value="<?=number_format($detail->pengajuan_jarak_barat_timur,2,'.',',');?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kec. ke Kabupaten</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="jarak_kabupaten" autocomplete="off" placeholder="0 KM" value="<?=number_format($detail->pengajuan_jarak_kabupaten,2,'.',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kec. ke Provinsi</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="jarak_provinsi" autocomplete="off" placeholder="0 KM" value="<?=number_format($detail->pengajuan_jarak_provinsi,2,'.',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">3. Tinggi</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tinggi Rata-Rata (M)</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control digit" name="tinggi" autocomplete="off" placeholder="0.00 M" value="<?=number_format($detail->pengajuan_tinggi,3,'.',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">4. Iklim</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Iklim</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="iklim" autocomplete="off" placeholder="Input Iklim" value="<?=$detail->pengajuan_iklim;?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">5. Luas</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanah Sawah (ha)</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control digit" name="tanah_sawah" autocomplete="off" placeholder="0.00 ha" value="<?=number_format($detail->pengajuan_luas_sawah,3,'.',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanah Kering (ha)</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control digit" name="tanah_kering" autocomplete="off" placeholder="0.00 ha" value="<?=number_format($detail->pengajuan_luas_kering,3,'.',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">II. Pemerintahan</h6>
    <h6 class="kt-section__title">1. Wilayah Administrasi</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah Dusun</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="dusun" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_dusun,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah RW</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="rw" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_rw,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah RT</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="rt" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_rt,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">2. Kepegawaian / Aparat Pemerintah Desa</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Laki-Laki</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="aparat_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_lk_aparat,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="aparat_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pr_aparat,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">3. Pemilu</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah TPS</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="tps" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_tps,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pemilih Laki-Laki</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="pemilih_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pemilih_lk,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pemilih Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="pemilih_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pemilih_pr,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">4. Catatan Sipil</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pernikahan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="nikah" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_nikah,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cerai Talak / Gugat</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="cerai_talak" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_cerai_talak,0,'',',');?>">
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="cerai_gugat" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_cerai_gugat,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">III. Penduduk dan Tenaga Kerja</h6>
    <h6 class="kt-section__title">1. Kependudukan / Populasi</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Laki-Laki</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="warga_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_lk_warga,0,'',',');?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="warga_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pr_warga,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">2. Keluarga Berencana</h6>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah KB</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="kb" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_kb,0,'',',');?>">
                </div>
            </div>
        </div>
    </div>
    <h6 class="kt-section__title">3. Tenaga Kerja</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataTenagaKerja">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalTenagaKerja">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Keterangan</th>
                        <th width="15%">Jumlah (Orang)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">IV. Sosial Budaya</h6>
    <h6 class="kt-section__title">1. Pendidikan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPendidikan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPendidikan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Pendidikan</th>
                        <th width="10%">Jumlah Sarana</th>
                        <th width="10%">Jumlah Siswa</th>
                        <th width="10%">Jumlah Guru</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">2. Sarana Hiburan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataHiburan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalHiburan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Sarana</th>
                        <th width="15%">Jumlah (Unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">3. Sarana Olahraga</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataOlahraga">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalOlahraga">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Sarana</th>
                        <th width="15%">Jumlah (Unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">4. Kesehatan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataKesehatan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalKesehatan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Tempat</th>
                        <th width="15%">Jumlah (Unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">5. Tempat Ibadah</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataIbadah">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalIbadah">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Tempat Ibadah</th>
                        <th width="15%">Jumlah (Unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">V. Pertanian (Produksi dalam 1 Tahun)</h6>
    <h6 class="kt-section__title">1. Pertanian Tanaman Pangan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPertanian">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPertanian">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Sawah</th>
                        <th width="15%">Luas Panen (ha)</th>
                        <th width="15%">Luas Produksi (kuintal)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">2. Tanaman Palawija</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPalawija">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPalawija">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Tanaman</th>
                        <th width="15%">Jumlah (kuintal)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">3. Perkebunan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPerkebunan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPerkebunan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Perkebunan</th>
                        <th width="15%">Jumlah (kuintal)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">4. Peternakan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPeternakan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPeternakan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Peternakan</th>
                        <th width="15%">Jumlah (ekor)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">5. Perikanan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPerikanan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPerikanan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Perikanan</th>
                        <th width="15%">Jumlah (ekor)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">VI. Industri Air Bersih</h6>
    <h6 class="kt-section__title">1. Perindustrian</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataIndustri">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalIndustri">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Perusahaan</th>
                        <th width="15%">Jumlah</th>
                        <th width="15%">Tenaga Kerja (orang)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">2. Air Bersih</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataAir">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalAir">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Jenis Air Bersih</th>
                        <th width="10%">Jumlah Pelanggan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">VII. Perhubungan dan Perdagangan</h6>
    <h6 class="kt-section__title">1. Jalan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataJalan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalJalan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Ruas Jalan</th>
                        <th width="15%">Panjang (km)</th>
                        <th width="15%">Lebar (m)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">2. Angkutan Darat : Kendaraan Tidak Bermotor</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataAngkutan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalAngkutan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Kendaraan</th>
                        <th width="15%">Jumlah (unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">3. POS dan Telekomunikasi</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataTelekomunikasi">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalTelekomunikasi">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama POS dan Telekomunikasi</th>
                        <th width="15%">Jumlah (unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <h6 class="kt-section__title">4. Perdagangan</h6>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-bordered" id="tableDataPerdagangan">
                <thead>
                    <tr>
                        <th width="5%">
                            <?php if ($detail->pengajuan_status != 'N') { ?>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#formModalPerdagangan">Tambah</button>
                            <?php } ?>
                        </th>
                        <th width="5%">No</th>
                        <th>Nama Perdagangan</th>
                        <th width="15%">Jumlah (unit)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($detail->pengajuan_status != 'N') { ?>
    <div class="kt-portlet__foot" align="center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
    </div>
    <?php } ?>
</form>

<script type="text/javascript">
var statustenagakerja, statuspendidikan, statuskesehatan, statushiburan, statusolahraga, statusibadah, statuspertanian, 
statuspalawija, statusperkebunan, statuspeternakan, statusperikanan, statusindustri, statusair, statusjalan, 
statusangkutan, statustelekomunikasi, statusperdagangan; 
statustenagakerja = 'Tambah';
statuspendidikan  = 'Tambah';
statuskesehatan   = 'Tambah';
statushiburan     = 'Tambah';
statusolahraga    = 'Tambah';
statusibadah      = 'Tambah';
statuspertanian   = 'Tambah';
statuspalawija    = 'Tambah';
statusperkebunan  = 'Tambah';
statuspeternakan  = 'Tambah';
statusperikanan   = 'Tambah';
statusindustri    = 'Tambah';
statusair         = 'Tambah';
statusjalan       = 'Tambah';
statusangkutan    = 'Tambah';
statustelekomunikasi = 'Tambah';
statusperdagangan    = 'Tambah';

function reload_table() {
    tableDataTenagaKerja.ajax.reload(null,false);
    tableDataPendidikan.ajax.reload(null,false);
    tableDataHiburan.ajax.reload(null,false);
    tableDataOlahraga.ajax.reload(null,false);
    tableDataKesehatan.ajax.reload(null,false);
    tableDataIbadah.ajax.reload(null,false);
    tableDataPertanian.ajax.reload(null,false);
    tableDataPalawija.ajax.reload(null,false);
    tableDataPerkebunan.ajax.reload(null,false);
    tableDataPeternakan.ajax.reload(null,false);
    tableDataPerikanan.ajax.reload(null,false);
    tableDataIndustri.ajax.reload(null,false);
    tableDataAir.ajax.reload(null,false);
    tableDataJalan.ajax.reload(null,false);
    tableDataAngkutan.ajax.reload(null,false);
    tableDataTelekomunikasi.ajax.reload(null,false);
    tableDataPerdagangan.ajax.reload(null,false);
}

// Tenaga Kerja
var tableDataTenagaKerja;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataTenagaKerja = $('#tableDataTenagaKerja').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_tenaga_kerja_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputTenagaKerja" ).validate({
        rules: { 
            lstTenagaKerja: { required: true },
            jumlah_tenaga: { required: true }
        },
        messages: { 
            lstTenagaKerja: { required :'Jenis Tenaga Kerja required' },
            jumlah_tenaga: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputTenagaKerja").serialize();
            if (statustenagakerja === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatatenagakerja');?>',
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
                        $('#formModalTenagaKerja').modal('hide');
                        reload_table();
                        resetformTenagaKerja();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalTenagaKerja').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatatenagakerja');?>',
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
                        $('#formModalTenagaKerja').modal('hide');
                        reload_table();
                        resetformTenagaKerja();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalTenagaKerja').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformTenagaKerja() {
    statustenagakerja = 'Tambah';
    $("#lstTenagaKerja").val('');
    $("#jumlah_tenaga").val('');

    var MValid = $("#formInputTenagaKerja");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataTenagaKerja(id) {
    statustenagakerja = 'Edit';
    $('#formInputTenagaKerja')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_tenaga_kerja/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_tenaga_kerja_id').val(data.pengajuan_tenaga_kerja_id);
            $('#lstTenagaKerja').val(data.tenaga_kerja_id);
            $('#jumlah_tenaga').val(formatNumber(data.pengajuan_tenaga_kerja_jumlah));
            $('#formModalTenagaKerja').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataTenagaKerja(pengajuan_tenaga_kerja_id) {
    var id = pengajuan_tenaga_kerja_id;
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
                url : "<?=site_url('member/pengajuan/deletedatatenagakerja')?>/"+id,
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

// Pendidikan
var tableDataPendidikan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPendidikan = $('#tableDataPendidikan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_pendidikan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4, 5 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3, 4, 5 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPendidikan" ).validate({
        rules: { 
            lstPendidikan: { required: true }
        },
        messages: { 
            lstPendidikan: { required :'Jenis Pendidikan required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPendidikan").serialize();
            if (statuspendidikan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatapendidikan');?>',
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
                        $('#formModalPendidikan').modal('hide');
                        reload_table();
                        resetformPendidikan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPendidikan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatapendidikan');?>',
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
                        $('#formModalPendidikan').modal('hide');
                        reload_table();
                        resetformPendidikan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPendidikan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPendidikan() {
    statuspendidikan = 'Tambah';
    $("#lstPendidikan").val('');
    $("#jumlah_sarana").val('');
    $("#jumlah_siswa").val('');
    $("#jumlah_guru").val('');

    var MValid = $("#formInputPendidikan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPendidikan(id) {
    statuspendidikan = 'Edit';
    $('#formInputPendidikan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_pendidikan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_pendidikan_id').val(data.pengajuan_pendidikan_id);
            $('#lstPendidikan').val(data.pendidikan_id);
            $('#jumlah_sarana').val(formatNumber(data.pengajuan_pendidikan_sarana));
            $('#jumlah_siswa').val(formatNumber(data.pengajuan_pendidikan_siswa));
            $('#jumlah_guru').val(formatNumber(data.pengajuan_pendidikan_guru));
            $('#formModalPendidikan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPendidikan(pengajuan_pendidikan_id) {
    var id = pengajuan_pendidikan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatapendidikan')?>/"+id,
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

// Sarana Hiburan
var tableDataHiburan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataHiburan = $('#tableDataHiburan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_hiburan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputHiburan" ).validate({
        rules: { 
            lstHiburan: { required: true },
            jumlah_hiburan: { required: true }
        },
        messages: { 
            lstHiburan: { required :'Jenis Hiburan required' },
            jumlah_hiburan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputHiburan").serialize();
            if (statushiburan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatahiburan');?>',
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
                        $('#formModalHiburan').modal('hide');
                        reload_table();
                        resetformHiburan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalHiburan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatahiburan');?>',
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
                        $('#formModalHiburan').modal('hide');
                        reload_table();
                        resetformHiburan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalHiburan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformHiburan() {
    statushiburan = 'Tambah';
    $("#lstHiburan").val('');
    $("#jumlah_hiburan").val('');

    var MValid = $("#formInputHiburan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataHiburan(id) {
    statushiburan = 'Edit';
    $('#formInputHiburan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_hiburan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_hiburan_id').val(data.pengajuan_hiburan_id);
            $('#lstHiburan').val(data.sarana_hiburan_id);
            $('#jumlah_hiburan').val(formatNumber(data.pengajuan_hiburan_jumlah));
            $('#formModalHiburan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataHiburan(pengajuan_hiburan_id) {
    var id = pengajuan_hiburan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatahiburan')?>/"+id,
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

// Sarana Olahraga
var tableDataOlahraga;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataOlahraga = $('#tableDataOlahraga').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_olahraga_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputOlahraga" ).validate({
        rules: { 
            lstOlahraga: { required: true },
            jumlah_olahraga: { required: true }
        },
        messages: { 
            lstOlahraga: { required :'Jenis Olahraga required' },
            jumlah_olahraga: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputOlahraga").serialize();
            if (statusolahraga === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataolahraga');?>',
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
                        $('#formModalOlahraga').modal('hide');
                        reload_table();
                        resetformOlahraga();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalOlahraga').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataolahraga');?>',
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
                        $('#formModalOlahraga').modal('hide');
                        reload_table();
                        resetformOlahraga();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalOlahraga').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformOlahraga() {
    statusolahraga = 'Tambah';
    $("#lstOlahraga").val('');
    $("#jumlah_olahraga").val('');

    var MValid = $("#formInputOlahraga");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataOlahraga(id) {
    statusolahraga = 'Edit';
    $('#formInputOlahraga')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_olahraga/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_olahraga_id').val(data.pengajuan_olahraga_id);
            $('#lstOlahraga').val(data.sarana_olahraga_id);
            $('#jumlah_olahraga').val(formatNumber(data.pengajuan_olahraga_jumlah));
            $('#formModalOlahraga').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataOlahraga(pengajuan_olahraga_id) {
    var id = pengajuan_olahraga_id;
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
                url : "<?=site_url('member/pengajuan/deletedataolahraga')?>/"+id,
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

// Kesehatan
var tableDataKesehatan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataKesehatan = $('#tableDataKesehatan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_kesehatan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputKesehatan" ).validate({
        rules: { 
            lstKesehatan: { required: true },
            jumlah_kesehatan: { required: true }
        },
        messages: { 
            lstKesehatan: { required :'Jenis Kesehatan required' },
            jumlah_kesehatan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputKesehatan").serialize();
            if (statuskesehatan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatakesehatan');?>',
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
                        $('#formModalKesehatan').modal('hide');
                        reload_table();
                        resetformKesehatan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalKesehatan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatakesehatan');?>',
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
                        $('#formModalKesehatan').modal('hide');
                        reload_table();
                        resetformKesehatan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalKesehatan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformKesehatan() {
    statuskesehatan = 'Tambah';
    $("#lstKesehatan").val('');
    $("#jumlah_kesehatan").val('');

    var MValid = $("#formInputKesehatan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataKesehatan(id) {
    statuskesehatan = 'Edit';
    $('#formInputKesehatan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_kesehatan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_kesehatan_id').val(data.pengajuan_kesehatan_id);
            $('#lstKesehatan').val(data.kesehatan_id);
            $('#jumlah_kesehatan').val(formatNumber(data.pengajuan_kesehatan_jumlah));
            $('#formModalKesehatan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataKesehatan(pengajuan_kesehatan_id) {
    var id = pengajuan_kesehatan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatakesehatan')?>/"+id,
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

// Ibadah
var tableDataIbadah;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataIbadah = $('#tableDataIbadah').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_ibadah_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputIbadah" ).validate({
        rules: { 
            lstIbadah: { required: true },
            jumlah_ibadah: { required: true }
        },
        messages: { 
            lstIbadah: { required :'Jenis Tempat Ibadah required' },
            jumlah_ibadah: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputIbadah").serialize();
            if (statusibadah === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataibadah');?>',
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
                        $('#formModalIbadah').modal('hide');
                        reload_table();
                        resetformIbadah();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalIbadah').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataibadah');?>',
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
                        $('#formModalIbadah').modal('hide');
                        reload_table();
                        resetformIbadah();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalIbadah').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformIbadah() {
    statusibadah = 'Tambah';
    $("#lstIbadah").val('');
    $("#jumlah_ibadah").val('');

    var MValid = $("#formInputIbadah");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataIbadah(id) {
    statusibadah = 'Edit';
    $('#formInputIbadah')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_ibadah/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_ibadah_id').val(data.pengajuan_ibadah_id);
            $('#lstIbadah').val(data.tempat_ibadah_id);
            $('#jumlah_ibadah').val(formatNumber(data.pengajuan_ibadah_jumlah));
            $('#formModalIbadah').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataIbadah(pengajuan_ibadah_id) {
    var id = pengajuan_ibadah_id;
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
                url : "<?=site_url('member/pengajuan/deletedataibadah')?>/"+id,
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

// Pertanian
var tableDataPertanian;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPertanian = $('#tableDataPertanian').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_pertanian_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPertanian" ).validate({
        rules: { 
            lstPertanian: { required: true },
            jumlah_panen: { required: true },
            jumlah_produksi: { required: true }
        },
        messages: { 
            lstPertanian: { required :'Jenis Sawah required' },
            jumlah_panen: { required :'Luas Panen required' },
            jumlah_produksi: { required :'Luas Produksi required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPertanian").serialize();
            if (statuspertanian === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatapertanian');?>',
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
                        $('#formModalPertanian').modal('hide');
                        reload_table();
                        resetformPertanian();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPertanian').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatapertanian');?>',
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
                        $('#formModalPertanian').modal('hide');
                        reload_table();
                        resetformPertanian();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPertanian').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPertanian() {
    statuspertanian = 'Tambah';
    $("#lstPertanian").val('');
    $("#jumlah_panen").val('');
    $("#jumlah_produksi").val('');

    var MValid = $("#formInputPertanian");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPertanian(id) {
    statuspertanian = 'Edit';
    $('#formInputPertanian')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_pertanian/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            var locale     = 'en';
            var options    = {minimumFractionDigits: 3, maximumFractionDigits: 3};
            var formatter  = new Intl.NumberFormat(locale, options);
            $('#pengajuan_pertanian_id').val(data.pengajuan_pertanian_id);
            $('#lstPertanian').val(data.pertanian_id);
            $('#jumlah_panen').val(formatter.format(data.pengajuan_pertanian_panen));
            $('#jumlah_produksi').val(formatNumber(data.pengajuan_pertanian_produksi));
            $('#formModalPertanian').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPertanian(pengajuan_pertanian_id) {
    var id = pengajuan_pertanian_id;
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
                url : "<?=site_url('member/pengajuan/deletedatapertanian')?>/"+id,
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

// Palawija
var tableDataPalawija;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPalawija = $('#tableDataPalawija').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_palawija_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPalawija" ).validate({
        rules: { 
            nama_palawija: { required: true },
            jumlah_palawija: { required: true }
        },
        messages: { 
            nama_palawija: { required :'Nama Tanaman required' },
            jumlah_palawija: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPalawija").serialize();
            if (statuspalawija === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatapalawija');?>',
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
                        $('#formModalPalawija').modal('hide');
                        reload_table();
                        resetformPalawija();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPalawija').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatapalawija');?>',
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
                        $('#formModalPalawija').modal('hide');
                        reload_table();
                        resetformPalawija();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPalawija').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPalawija() {
    statuspalawija = 'Tambah';
    $("#nama_palawija").val('');
    $("#jumlah_palawija").val('');

    var MValid = $("#formInputPalawija");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPalawija(id) {
    statuspalawija = 'Edit';
    $('#formInputPalawija')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_palawija/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_palawija_id').val(data.pengajuan_palawija_id);
            $('#nama_palawija').val(data.pengajuan_palawija_nama);
            $('#jumlah_palawija').val(formatNumber(data.pengajuan_palawija_jumlah));
            $('#formModalPalawija').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPalawija(pengajuan_palawija_id) {
    var id = pengajuan_palawija_id;
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
                url : "<?=site_url('member/pengajuan/deletedatapalawija')?>/"+id,
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

// Perkebunan
var tableDataPerkebunan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPerkebunan = $('#tableDataPerkebunan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_perkebunan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPerkebunan" ).validate({
        rules: { 
            nama_perkebunan: { required: true },
            jumlah_perkebunan: { required: true }
        },
        messages: { 
            nama_perkebunan: { required :'Nama Perkebunan required' },
            jumlah_perkebunan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPerkebunan").serialize();
            if (statusperkebunan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataperkebunan');?>',
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
                        $('#formModalPerkebunan').modal('hide');
                        reload_table();
                        resetformPerkebunan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerkebunan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataperkebunan');?>',
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
                        $('#formModalPerkebunan').modal('hide');
                        reload_table();
                        resetformPerkebunan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerkebunan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPerkebunan() {
    statusperkebunan = 'Tambah';
    $("#nama_perkebunan").val('');
    $("#jumlah_perkebunan").val('');

    var MValid = $("#formInputPerkebunan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPerkebunan(id) {
    statusperkebunan = 'Edit';
    $('#formInputPerkebunan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_perkebunan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_perkebunan_id').val(data.pengajuan_perkebunan_id);
            $('#nama_perkebunan').val(data.pengajuan_perkebunan_nama);
            $('#jumlah_perkebunan').val(formatNumber(data.pengajuan_perkebunan_jumlah));
            $('#formModalPerkebunan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPerkebunan(pengajuan_perkebunan_id) {
    var id = pengajuan_perkebunan_id;
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
                url : "<?=site_url('member/pengajuan/deletedataperkebunan')?>/"+id,
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

// Peternakan
var tableDataPeternakan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPeternakan = $('#tableDataPeternakan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_peternakan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPeternakan" ).validate({
        rules: { 
            nama_peternakan: { required: true },
            jumlah_peternakan: { required: true }
        },
        messages: { 
            nama_peternakan: { required :'Nama Peternakan required' },
            jumlah_peternakan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPeternakan").serialize();
            if (statuspeternakan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatapeternakan');?>',
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
                        $('#formModalPeternakan').modal('hide');
                        reload_table();
                        resetformPeternakan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPeternakan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatapeternakan');?>',
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
                        $('#formModalPeternakan').modal('hide');
                        reload_table();
                        resetformPeternakan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPeternakan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPeternakan() {
    statuspeternakan = 'Tambah';
    $("#nama_peternakan").val('');
    $("#jumlah_peternakan").val('');

    var MValid = $("#formInputPeternakan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPeternakan(id) {
    statuspeternakan = 'Edit';
    $('#formInputPeternakan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_peternakan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_peternakan_id').val(data.pengajuan_peternakan_id);
            $('#nama_peternakan').val(data.pengajuan_peternakan_nama);
            $('#jumlah_peternakan').val(formatNumber(data.pengajuan_peternakan_jumlah));
            $('#formModalPeternakan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPeternakan(pengajuan_peternakan_id) {
    var id = pengajuan_peternakan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatapeternakan')?>/"+id,
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

// Perikanan
var tableDataPerikanan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPerikanan = $('#tableDataPerikanan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_perikanan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPerikanan" ).validate({
        rules: { 
            nama_perikanan: { required: true },
            jumlah_perikanan: { required: true }
        },
        messages: { 
            nama_perikanan: { required :'Nama Perikanan required' },
            jumlah_perikanan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPerikanan").serialize();
            if (statusperikanan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataperikanan');?>',
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
                        $('#formModalPerikanan').modal('hide');
                        reload_table();
                        resetformPerikanan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerikanan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataperikanan');?>',
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
                        $('#formModalPerikanan').modal('hide');
                        reload_table();
                        resetformPerikanan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerikanan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPerikanan() {
    statusperikanan = 'Tambah';
    $("#nama_perikanan").val('');
    $("#jumlah_perikanan").val('');

    var MValid = $("#formInputPerikanan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPerikanan(id) {
    statusperikanan = 'Edit';
    $('#formInputPerikanan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_perikanan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_perikanan_id').val(data.pengajuan_perikanan_id);
            $('#nama_perikanan').val(data.pengajuan_perikanan_nama);
            $('#jumlah_perikanan').val(formatNumber(data.pengajuan_perikanan_jumlah));
            $('#formModalPerikanan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPerikanan(pengajuan_perikanan_id) {
    var id = pengajuan_perikanan_id;
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
                url : "<?=site_url('member/pengajuan/deletedataperikanan')?>/"+id,
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

// Industri
var tableDataIndustri;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataIndustri = $('#tableDataIndustri').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_industri_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputIndustri" ).validate({
        rules: { 
            lstIndustri: { required: true },
            jumlah_industri: { required: true },
            jumlah_orang: { required: true }
        },
        messages: { 
            lstIndustri: { required :'Jenis Perusahaan required' },
            jumlah_industri: { required :'Jumlah required' },
            jumlah_orang: { required :'Jumlah Tenaga Kerja required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputIndustri").serialize();
            if (statusindustri === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataindustri');?>',
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
                        $('#formModalIndustri').modal('hide');
                        reload_table();
                        resetformIndustri();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalIndustri').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataindustri');?>',
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
                        $('#formModalIndustri').modal('hide');
                        reload_table();
                        resetformIndustri();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalIndustri').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformIndustri() {
    statusindustri = 'Tambah';
    $("#lstIndustri").val('');
    $("#jumlah_industri").val('');
    $("#jumlah_orang").val('');

    var MValid = $("#formInputIndustri");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataIndustri(id) {
    statusindustri = 'Edit';
    $('#formInputIndustri')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_industri/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_industri_id').val(data.pengajuan_industri_id);
            $('#lstIndustri').val(data.jenis_perusahaan_id);
            $('#jumlah_industri').val(formatNumber(data.pengajuan_industri_jumlah));
            $('#jumlah_orang').val(formatNumber(data.pengajuan_industri_orang));
            $('#formModalIndustri').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataIndustri(pengajuan_industri_id) {
    var id = pengajuan_industri_id;
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
                url : "<?=site_url('member/pengajuan/deletedataindustri')?>/"+id,
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

// Air
var tableDataAir;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataAir = $('#tableDataAir').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_air_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputAir" ).validate({
        rules: { 
            nama_air: { required: true },
            jumlah_air: { required: true }
        },
        messages: { 
            nama_air: { required :'Nama Air required' },
            jumlah_air: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputAir").serialize();
            if (statusair === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataair');?>',
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
                        $('#formModalAir').modal('hide');
                        reload_table();
                        resetformAir();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAir').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataair');?>',
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
                        $('#formModalAir').modal('hide');
                        reload_table();
                        resetformAir();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAir').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformAir() {
    statusair = 'Tambah';
    $("#nama_air").val('');
    $("#jumlah_air").val('');

    var MValid = $("#formInputAir");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataAir(id) {
    statusair = 'Edit';
    $('#formInputAir')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_air/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_air_id').val(data.pengajuan_air_id);
            $('#nama_air').val(data.pengajuan_air_nama);
            $('#jumlah_air').val(formatNumber(data.pengajuan_air_jumlah));
            $('#formModalAir').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataAir(pengajuan_air_id) {
    var id = pengajuan_air_id;
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
                url : "<?=site_url('member/pengajuan/deletedataair')?>/"+id,
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

// Jalan
var tableDataJalan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataJalan = $('#tableDataJalan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_jalan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputJalan" ).validate({
        rules: { 
            nama_jalan: { required: true },
            jumlah_panjang: { required: true },
            jumlah_lebar: { required: true }
        },
        messages: { 
            nama_jalan: { required :'Nama Ruas Jalan required' },
            jumlah_panjang: { required :'Panjang required' },
            jumlah_lebar: { required :'Lebar required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputJalan").serialize();
            if (statusjalan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatajalan');?>',
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
                        $('#formModalJalan').modal('hide');
                        reload_table();
                        resetformJalan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalJalan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatajalan');?>',
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
                        $('#formModalJalan').modal('hide');
                        reload_table();
                        resetformJalan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalJalan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformJalan() {
    statusjalan = 'Tambah';
    $("#nama_jalan").val('');
    $("#jumlah_panjang").val('');
    $("#jumlah_lebar").val('');

    var MValid = $("#formInputJalan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataJalan(id) {
    statusjalan = 'Edit';
    $('#formInputJalan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_jalan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_jalan_id').val(data.pengajuan_jalan_id);
            $('#nama_jalan').val(data.pengajuan_jalan_nama);
            $('#jumlah_panjang').val(formatNumber(data.pengajuan_jalan_panjang));
            $('#jumlah_lebar').val(formatNumber(data.pengajuan_jalan_lebar));
            $('#formModalJalan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataJalan(pengajuan_jalan_id) {
    var id = pengajuan_jalan_id;
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
                url : "<?=site_url('member/pengajuan/deletedatajalan')?>/"+id,
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

// Angkutan
var tableDataAngkutan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataAngkutan = $('#tableDataAngkutan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_angkutan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputAngkutan" ).validate({
        rules: { 
            lstAngkutan: { required: true },
            jumlah_angkutan: { required: true }
        },
        messages: { 
            lstAngkutan: { required :'Jenis Angkutan required' },
            jumlah_angkutan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputAngkutan").serialize();
            if (statusangkutan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataangkutan');?>',
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
                        $('#formModalAngkutan').modal('hide');
                        reload_table();
                        resetformAngkutan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAngkutan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataangkutan');?>',
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
                        $('#formModalAngkutan').modal('hide');
                        reload_table();
                        resetformAngkutan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalAngkutan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformAngkutan() {
    statusangkutan = 'Tambah';
    $("#lstAngkutan").val('');
    $("#jumlah_angkutan").val('');

    var MValid = $("#formInputAngkutan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataAngkutan(id) {
    statusangkutan = 'Edit';
    $('#formInputAngkutan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_angkutan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_angkutan_id').val(data.pengajuan_angkutan_id);
            $('#lstAngkutan').val(data.angkutan_darat_id);
            $('#jumlah_angkutan').val(formatNumber(data.pengajuan_angkutan_jumlah));
            $('#formModalAngkutan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataAngkutan(pengajuan_angkutan_id) {
    var id = pengajuan_angkutan_id;
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
                url : "<?=site_url('member/pengajuan/deletedataangkutan')?>/"+id,
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

// Telekomunikasi
var tableDataTelekomunikasi;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataTelekomunikasi = $('#tableDataTelekomunikasi').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_telekomunikasi_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputTelekomunikasi" ).validate({
        rules: { 
            lstTelekomunikasi: { required: true },
            jumlah_telekomunikasi: { required: true }
        },
        messages: { 
            lstTelekomunikasi: { required :'Jenis Telekomunikasi required' },
            jumlah_telekomunikasi: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputTelekomunikasi").serialize();
            if (statustelekomunikasi === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedatatelekomunikasi');?>',
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
                        $('#formModalTelekomunikasi').modal('hide');
                        reload_table();
                        resetformTelekomunikasi();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalTelekomunikasi').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedatatelekomunikasi');?>',
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
                        $('#formModalTelekomunikasi').modal('hide');
                        reload_table();
                        resetformTelekomunikasi();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalTelekomunikasi').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformTelekomunikasi() {
    statustelekomunikasi = 'Tambah';
    $("#lstTelekomunikasi").val('');
    $("#jumlah_telekomunikasi").val('');

    var MValid = $("#formInputTelekomunikasi");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataTelekomunikasi(id) {
    statustelekomunikasi = 'Edit';
    $('#formInputTelekomunikasi')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_telekomunikasi/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_telekomunikasi_id').val(data.pengajuan_telekomunikasi_id);
            $('#lstTelekomunikasi').val(data.telekomunikasi_id);
            $('#jumlah_telekomunikasi').val(formatNumber(data.pengajuan_telekomunikasi_jumlah));
            $('#formModalTelekomunikasi').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataTelekomunikasi(pengajuan_telekomunikasi_id) {
    var id = pengajuan_telekomunikasi_id;
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
                url : "<?=site_url('member/pengajuan/deletedatatelekomunikasi')?>/"+id,
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

// Perdagangan
var tableDataPerdagangan;
$(document).ready(function() {
    var pengajuan_id = '<?=$detail->pengajuan_id;?>';
    tableDataPerdagangan = $('#tableDataPerdagangan').DataTable({
        "info": false,
        "paging": false,
        "searching": false,
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('member/pengajuan/data_perdagangan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

$(document).ready(function() {
    $( "#formInputPerdagangan" ).validate({
        rules: { 
            lstPerdagangan: { required: true },
            jumlah_perdagangan: { required: true }
        },
        messages: { 
            lstPerdagangan: { required :'Jenis Perdagangan required' },
            jumlah_perdagangan: { required :'Jumlah required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInputPerdagangan").serialize();
            if (statusperdagangan === 'Tambah') {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/savedataperdagangan');?>',
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
                        $('#formModalPerdagangan').modal('hide');
                        reload_table();
                        resetformPerdagangan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Simpan Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerdagangan').modal('hide');
                    }
                });
            } else {
                $.ajax({
                    url: '<?=site_url('member/pengajuan/updatedataperdagangan');?>',
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
                        $('#formModalPerdagangan').modal('hide');
                        reload_table();
                        resetformPerdagangan();
                    },
                    error: function() {
                        swal.fire({
                            title:"Error",
                            text: "Update Data Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                        $('#formModalPerdagangan').modal('hide');
                    }
                });
            }
        }
    });
});

function resetformPerdagangan() {
    statusperdagangan = 'Tambah';
    $("#lstPerdagangan").val('');
    $("#jumlah_perdagangan").val('');

    var MValid = $("#formInputPerdagangan");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

function editDataPerdagangan(id) {
    statusperdagangan = 'Edit';
    $('#formInputPerdagangan')[0].reset();
    $.ajax({
        url : "<?=site_url('member/pengajuan/get_data_perdagangan/');?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#pengajuan_perdagangan_id').val(data.pengajuan_perdagangan_id);
            $('#lstPerdagangan').val(data.perdagangan_id);
            $('#jumlah_perdagangan').val(formatNumber(data.pengajuan_perdagangan_jumlah));
            $('#formModalPerdagangan').modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    });
}

function hapusDataPerdagangan(pengajuan_perdagangan_id) {
    var id = pengajuan_perdagangan_id;
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
                url : "<?=site_url('member/pengajuan/deletedataperdagangan')?>/"+id,
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
            batas_utara: { required: true },
            batas_timur: { required: true },
            batas_selatan: { required: true },
            batas_barat: { required: true },
            utara_selatan: { required: true },
            barat_timur: { required: true },
            jarak_kabupaten: { required: true },
            jarak_provinsi: { required: true },
            tinggi: { required: true },
            iklim: { required: true }
        },
        messages: {
            batas_utara: { required:'Field required' },
            batas_timur: { required:'Field required' },
            batas_selatan: { required:'Field required' },
            batas_barat: { required:'Field required' },
            utara_selatan: { required:'Field required' },
            barat_timur: { required:'Field required' },
            jarak_kabupaten: { required:'Field required' },
            jarak_provinsi: { required:'Field required' },
            tinggi: { required:'Field required' },
            iklim: { required:'Field required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: '<?=site_url('member/pengajuan/updatedata');?>',
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

<!-- Tenaga Kerja --->
<div class="modal fade" id="formModalTenagaKerja" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Tenaga Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputTenagaKerja" id="formInputTenagaKerja">
            <input type="hidden" name="pengajuan_id_tenaga_kerja" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_tenaga_kerja_id" id="pengajuan_tenaga_kerja_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Tenaga Kerja</label>
                        <select class="form-control" name="lstTenagaKerja" id="lstTenagaKerja">
                            <option value="">- Pilih Jenis Tenaga Kerja -</option>
                            <?php foreach($listTenagaKerja as $r) { ?>
                            <option value="<?=$r->tenaga_kerja_id;?>"><?=$r->tenaga_kerja_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (Orang)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_tenaga" id="jumlah_tenaga" autocomplete="off">
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

<!-- Pendidikan --->
<div class="modal fade" id="formModalPendidikan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPendidikan" id="formInputPendidikan">
            <input type="hidden" name="pengajuan_id_pendidikan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_pendidikan_id" id="pengajuan_pendidikan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Pendidikan</label>
                        <select class="form-control" name="lstPendidikan" id="lstPendidikan">
                            <option value="">- Pilih Jenis Pendidikan -</option>
                            <?php foreach($listPendidikan as $r) { ?>
                            <option value="<?=$r->pendidikan_id;?>"><?=$r->pendidikan_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Sarana</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_sarana" id="jumlah_sarana" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Siswa</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_siswa" id="jumlah_siswa" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Guru</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_guru" id="jumlah_guru" autocomplete="off">
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

<!-- Hiburan --->
<div class="modal fade" id="formModalHiburan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Sarana Hiburan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputHiburan" id="formInputHiburan">
            <input type="hidden" name="pengajuan_id_hiburan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_hiburan_id" id="pengajuan_hiburan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Sarana Hiburan</label>
                        <select class="form-control" name="lstHiburan" id="lstHiburan">
                            <option value="">- Pilih Jenis Sarana Hiburan -</option>
                            <?php foreach($listHiburan as $r) { ?>
                            <option value="<?=$r->sarana_hiburan_id;?>"><?=$r->sarana_hiburan_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (Unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_hiburan" id="jumlah_hiburan" autocomplete="off">
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

<!-- Olahraga --->
<div class="modal fade" id="formModalOlahraga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Sarana Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputOlahraga" id="formInputOlahraga">
            <input type="hidden" name="pengajuan_id_olahraga" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_olahraga_id" id="pengajuan_olahraga_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Sarana Olahraga</label>
                        <select class="form-control" name="lstOlahraga" id="lstOlahraga">
                            <option value="">- Pilih Jenis Sarana Olahraga -</option>
                            <?php foreach($listOlahraga as $r) { ?>
                            <option value="<?=$r->sarana_olahraga_id;?>"><?=$r->sarana_olahraga_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (Unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_olahraga" id="jumlah_olahraga" autocomplete="off">
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

<!-- Kesehatan --->
<div class="modal fade" id="formModalKesehatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Sarana Kesehatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputKesehatan" id="formInputKesehatan">
            <input type="hidden" name="pengajuan_id_kesehatan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_kesehatan_id" id="pengajuan_kesehatan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Kesehatan</label>
                        <select class="form-control" name="lstKesehatan" id="lstKesehatan">
                            <option value="">- Pilih Jenis Kesehatan -</option>
                            <?php foreach($listKesehatan as $r) { ?>
                            <option value="<?=$r->kesehatan_id;?>"><?=$r->kesehatan_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (Unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_kesehatan" id="jumlah_kesehatan" autocomplete="off">
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

<!-- Ibadah --->
<div class="modal fade" id="formModalIbadah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Tempat Ibadah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputIbadah" id="formInputIbadah">
            <input type="hidden" name="pengajuan_id_ibadah" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_ibadah_id" id="pengajuan_ibadah_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Tempat Ibadah</label>
                        <select class="form-control" name="lstIbadah" id="lstIbadah">
                            <option value="">- Pilih Jenis Tempat Ibadah -</option>
                            <?php foreach($listIbadah as $r) { ?>
                            <option value="<?=$r->tempat_ibadah_id;?>"><?=$r->tempat_ibadah_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (Unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_ibadah" id="jumlah_ibadah" autocomplete="off">
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

<!-- Pertanian --->
<div class="modal fade" id="formModalPertanian" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Pertanian Tanaman Pangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPertanian" id="formInputPertanian">
            <input type="hidden" name="pengajuan_id_pertanian" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_pertanian_id" id="pengajuan_pertanian_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Jenis Sawah</label>
                        <select class="form-control" name="lstPertanian" id="lstPertanian">
                            <option value="">- Pilih Jenis Sawah -</option>
                            <?php foreach($listPertanian as $r) { ?>
                            <option value="<?=$r->pertanian_id;?>"><?=$r->pertanian_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Luas Panen (ha)</label>
                        <input type="text" class="form-control col-md-6 digit" placeholder="0" name="jumlah_panen" id="jumlah_panen" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Luas Produksi (kuintal)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_produksi" id="jumlah_produksi" autocomplete="off">
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

<!-- Palawija --->
<div class="modal fade" id="formModalPalawija" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Tanaman Palawija</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPalawija" id="formInputPalawija">
            <input type="hidden" name="pengajuan_id_palawija" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_palawija_id" id="pengajuan_palawija_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tanaman</label>
                        <input type="text" class="form-control" placeholder="Input Nama Tanaman Palawija" name="nama_palawija" id="nama_palawija" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (kuintal)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_palawija" id="jumlah_palawija" autocomplete="off">
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

<!-- Perkebunan --->
<div class="modal fade" id="formModalPerkebunan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Perkebunan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPerkebunan" id="formInputPerkebunan">
            <input type="hidden" name="pengajuan_id_perkebunan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_perkebunan_id" id="pengajuan_perkebunan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tanaman</label>
                        <input type="text" class="form-control" placeholder="Input Nama Tanaman Perkebunan" name="nama_perkebunan" id="nama_perkebunan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (kuintal)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_perkebunan" id="jumlah_perkebunan" autocomplete="off">
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

<!-- Peternakan --->
<div class="modal fade" id="formModalPeternakan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Peternakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPeternakan" id="formInputPeternakan">
            <input type="hidden" name="pengajuan_id_peternakan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_peternakan_id" id="pengajuan_peternakan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Peternakan</label>
                        <input type="text" class="form-control" placeholder="Input Nama Peternakan" name="nama_peternakan" id="nama_peternakan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (ekor)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_peternakan" id="jumlah_peternakan" autocomplete="off">
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

<!-- Perikanan --->
<div class="modal fade" id="formModalPerikanan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Perikanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPerikanan" id="formInputPerikanan">
            <input type="hidden" name="pengajuan_id_perikanan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_perikanan_id" id="pengajuan_perikanan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Perikanan</label>
                        <input type="text" class="form-control" placeholder="Input Nama Perikanan" name="nama_perikanan" id="nama_perikanan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (ekor)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_perikanan" id="jumlah_perikanan" autocomplete="off">
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

<!-- Industri --->
<div class="modal fade" id="formModalIndustri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Perindustrian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputIndustri" id="formInputIndustri">
            <input type="hidden" name="pengajuan_id_industri" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_industri_id" id="pengajuan_industri_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Perusahaan</label>
                        <select class="form-control" name="lstIndustri" id="lstIndustri">
                            <option value="">- Pilih Jenis Perusahaan -</option>
                            <?php foreach($listJenisPerusahaan as $r) { ?>
                            <option value="<?=$r->jenis_perusahaan_id;?>"><?=$r->jenis_perusahaan_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_industri" id="jumlah_industri" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tenaga Kerja</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_orang" id="jumlah_orang" autocomplete="off">
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

<!-- Air --->
<div class="modal fade" id="formModalAir" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Air Bersih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputAir" id="formInputAir">
            <input type="hidden" name="pengajuan_id_air" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_air_id" id="pengajuan_air_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Air Bersih</label>
                        <input type="text" class="form-control" placeholder="Input Nama Air Bersih" name="nama_air" id="nama_air" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Jumlah (orang)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_air" id="jumlah_air" autocomplete="off">
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

<!-- Jalan --->
<div class="modal fade" id="formModalJalan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Jalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputJalan" id="formInputJalan">
            <input type="hidden" name="pengajuan_id_jalan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_jalan_id" id="pengajuan_jalan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Ruas Jalan</label>
                        <input type="text" class="form-control" placeholder="Input Nama Ruas Jalan" name="nama_jalan" id="nama_jalan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Panjang (Km)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_panjang" id="jumlah_panjang" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Lebar (m)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_lebar" id="jumlah_lebar" autocomplete="off">
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

<!-- Angkutan --->
<div class="modal fade" id="formModalAngkutan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Angkutan Darat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputAngkutan" id="formInputAngkutan">
            <input type="hidden" name="pengajuan_id_angkutan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_angkutan_id" id="pengajuan_angkutan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Angkutan</label>
                        <select class="form-control" name="lstAngkutan" id="lstAngkutan">
                            <option value="">- Pilih Jenis Angkutan -</option>
                            <?php foreach($listAngkutan as $r) { ?>
                            <option value="<?=$r->angkutan_darat_id;?>"><?=$r->angkutan_darat_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_angkutan" id="jumlah_angkutan" autocomplete="off">
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

<!-- Telekomunikasi --->
<div class="modal fade" id="formModalTelekomunikasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Telekomunikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputTelekomunikasi" id="formInputTelekomunikasi">
            <input type="hidden" name="pengajuan_id_telekomunikasi" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_telekomunikasi_id" id="pengajuan_telekomunikasi_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Telekomunikasi</label>
                        <select class="form-control" name="lstTelekomunikasi" id="lstTelekomunikasi">
                            <option value="">- Pilih Jenis Telekomunikasi -</option>
                            <?php foreach($listTelekomunikasi as $r) { ?>
                            <option value="<?=$r->telekomunikasi_id;?>"><?=$r->telekomunikasi_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_telekomunikasi" id="jumlah_telekomunikasi" autocomplete="off">
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

<!-- Perdagangan --->
<div class="modal fade" id="formModalPerdagangan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-edit"></i> Form Perdagangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" method="post" name="formInputPerdagangan" id="formInputPerdagangan">
            <input type="hidden" name="pengajuan_id_perdagangan" value="<?=$detail->pengajuan_id;?>">
            <input type="hidden" name="pengajuan_perdagangan_id" id="pengajuan_perdagangan_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Jenis Perdagangan</label>
                        <select class="form-control" name="lstPerdagangan" id="lstPerdagangan">
                            <option value="">- Pilih Jenis Perdagangan -</option>
                            <?php foreach($listPerdagangan as $r) { ?>
                            <option value="<?=$r->perdagangan_id;?>"><?=$r->perdagangan_nama;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah (unit)</label>
                        <input type="text" class="form-control col-md-6 number" placeholder="0" name="jumlah_perdagangan" id="jumlah_perdagangan" autocomplete="off">
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