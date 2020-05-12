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
                    <input type="text" class="form-control" name="batas_utara" autocomplete="off" placeholder="Input Batas Utara" value="<?=$detail->pengajuan_batas_utara;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Timur</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_timur" autocomplete="off" placeholder="Input Batas Timur" value="<?=$detail->pengajuan_batas_timur;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Selatan</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_selatan" autocomplete="off" placeholder="Input Batas Selatan" value="<?=$detail->pengajuan_batas_selatan;?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Batas Barat</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="batas_barat" autocomplete="off" placeholder="Input Batas Barat" value="<?=$detail->pengajuan_batas_barat;?>" readonly>
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
                    <input type="text" class="form-control decimal" name="utara_selatan" autocomplete="off" placeholder="0.00 Km" value="<?=number_format($detail->pengajuan_jarak_utara_selatan,2,'.',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Barat-Timur Terjauh</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="barat_timur" autocomplete="off" placeholder="0.00 Km" value="<?=number_format($detail->pengajuan_jarak_barat_timur,2,'.',',');?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kec. ke Kabupaten</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="jarak_kabupaten" autocomplete="off" placeholder="0 KM" value="<?=number_format($detail->pengajuan_jarak_kabupaten,2,'.',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kec. ke Provinsi</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control decimal" name="jarak_provinsi" autocomplete="off" placeholder="0 KM" value="<?=number_format($detail->pengajuan_jarak_provinsi,2,'.',',');?>" readonly>
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
                    <input type="text" class="form-control digit" name="tinggi" autocomplete="off" placeholder="0.00 M" value="<?=number_format($detail->pengajuan_tinggi,3,'.',',');?>" readonly>
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
                    <input type="text" class="form-control" name="iklim" autocomplete="off" placeholder="Input Iklim" value="<?=$detail->pengajuan_iklim;?>" readonly>
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
                    <input type="text" class="form-control digit" name="tanah_sawah" autocomplete="off" placeholder="0.000 ha" value="<?=number_format($detail->pengajuan_luas_sawah,3,'.',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanah Kering (ha)</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control digit" name="tanah_kering" autocomplete="off" placeholder="0.000 ha" value="<?=number_format($detail->pengajuan_luas_kering,3,'.',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="dusun" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_dusun,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah RW</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="rw" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_rw,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jumlah RT</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="rt" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_rt,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="aparat_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_lk_aparat,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="aparat_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pr_aparat,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="tps" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_tps,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pemilih Laki-Laki</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="pemilih_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pemilih_lk,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pemilih Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="pemilih_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pemilih_pr,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="nikah" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_nikah,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Cerai Talak / Gugat</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="cerai_talak" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_cerai_talak,0,'',',');?>" readonly>
                </div>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="cerai_gugat" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_cerai_gugat,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="warga_lk" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_lk_warga,0,'',',');?>" readonly>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-lg-3 col-form-label">Perempuan</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control number" name="warga_pr" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_pr_warga,0,'',',');?>" readonly>
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
                    <input type="text" class="form-control number" name="kb" autocomplete="off" placeholder="0" value="<?=number_format($detail->pengajuan_kb,0,'',',');?>" readonly>
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
</form>

<script type="text/javascript">
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
            "url": "<?=site_url('admin/pengajuan/data_tenaga_kerja_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_pendidikan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3, 4 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2, 3, 4 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_hiburan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_olahraga_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_kesehatan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_ibadah_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_pertanian_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_palawija_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_perkebunan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_peternakan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_perikanan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_industri_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_air_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_jalan_list/');?>"+pengajuan_id,
            "type": "POST",
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 2, 3 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 2, 3 ],
                "className": "dt-center",
            }
        ],
    });
});

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
            "url": "<?=site_url('admin/pengajuan/data_angkutan_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_telekomunikasi_list/');?>"+pengajuan_id,
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
            "url": "<?=site_url('admin/pengajuan/data_perdagangan_list/');?>"+pengajuan_id,
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
</script>