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
                    <a href="<?=site_url('member/pengajuan');?>" class="kt-subheader__breadcrumbs-link">
                        Pengajuan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Form Tambah Pengajuan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet kt-portlet--last kt-portlet--head-sm kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--sm">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-add"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Form Data Pengajuan</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="<?=site_url('member/pengajuan');?>" class="btn btn-clean">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile"> Batal</span>
                            </a>
                        </div>
                    </div>
                    <form class="kt-form" id="formInput" name="formInput" method="post">
                    <input type="hidden" name="no_kec" value="<?=$dataArea->no_kec;?>">
                    <input type="hidden" name="no_kel" value="<?=$dataArea->no_kel;?>">

                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kecamatan</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="kecamatan" autocomplete="off" value="<?=$dataArea->nama_kec;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Desa/Kelurahan</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="desa" autocomplete="off" value="<?=$dataArea->nama_kel;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="kt-section__title">I. Data Geografi</h6>
                            <h6 class="kt-section__title">1. Batas-Batas</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Batas Utara</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="batas_utara" autocomplete="off" placeholder="Input Batas Utara">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Batas Timur</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="batas_timur" autocomplete="off" placeholder="Input Batas Timur">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Batas Selatan</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="batas_selatan" autocomplete="off" placeholder="Input Batas Selatan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Batas Barat</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="batas_barat" autocomplete="off" placeholder="Input Batas Barat">
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
                                            <input type="text" class="form-control decimal" name="utara_selatan" autocomplete="off" placeholder="0.00 Km">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Barat-Timur Terjauh</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control decimal" name="barat_timur" autocomplete="off" placeholder="0.00 Km">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kec. ke Kabupaten</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control decimal" name="jarak_kabupaten" autocomplete="off" placeholder="0.00 Km">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kec. ke Provinsi</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control decimal" name="jarak_provinsi" autocomplete="off" placeholder="0.00 Km">
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
                                            <input type="text" class="form-control digit" name="tinggi" autocomplete="off" placeholder="0.000 M">
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
                                            <input type="text" class="form-control" name="iklim" autocomplete="off" placeholder="Input Iklim">
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
                                            <input type="text" class="form-control digit" name="tanah_sawah" autocomplete="off" placeholder="0.000 ha">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Tanah Kering (ha)</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control digit" name="tanah_kering" autocomplete="off" placeholder="0.000 ha">
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
                                            <input type="text" class="form-control number" name="dusun" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Jumlah RW</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="rw" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Jumlah RT</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="rt" autocomplete="off" placeholder="0">
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
                                            <input type="text" class="form-control number" name="aparat_lk" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Perempuan</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="aparat_pr" autocomplete="off" placeholder="0">
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
                                            <input type="text" class="form-control number" name="tps" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Pemilih Laki-Laki</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="pemilih_lk" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Pemilih Perempuan</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="pemilih_pr" autocomplete="off" placeholder="0">
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
                                            <input type="text" class="form-control number" name="nikah" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Cerai Talak / Gugat</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="cerai_talak" autocomplete="off" placeholder="0">
                                        </div>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="cerai_gugat" autocomplete="off" placeholder="0">
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
                                            <input type="text" class="form-control number" name="warga_lk" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Perempuan</label>
                                        <div class="col-lg-3">
                                            <input type="text" class="form-control number" name="warga_pr" autocomplete="off" placeholder="0">
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
                                            <input type="text" class="form-control number" name="kb" autocomplete="off" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.number').maskMoney({thousands:',', precision:0});
    $('.digit').maskMoney({thousands:',', precision:3});
    $('.decimal').maskMoney({thousands:',', precision:2});
});

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
            iklim: { required: true },
            tanah_sawah: { required: true },
            tanah_kering: { required: true },
            dusun: { required: true },
            rt: { required: true },
            rw: { required: true },
            aparat_lk: { required: true },
            aparat_pr: { required: true },
            tps: { required: true },
            pemilih_lk: { required: true },
            pemilih_pr: { required: true },
            nikah: { required: true },
            warga_lk: { required: true },
            warga_pr: { required: true }
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
            iklim: { required:'Field required' },
            tanah_sawah: { required:'Field required' },
            tanah_kering: { required:'Field required' },
            dusun: { required:'Field required' },
            rt: { required:'Field required' },
            rw: { required:'Field required' },
            aparat_lk: { required:'Field required' },
            aparat_pr: { required:'Field required' },
            tps: { required:'Field required' },
            pemilih_lk: { required:'Field required' },
            pemilih_pr: { required:'Field required' },
            nikah: { required:'Field required' },
            warga_lk: { required:'Field required' },
            warga_pr: { required:'Field required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: '<?=site_url('member/pengajuan/savedata');?>',
                type: "POST",
                data: dataString,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status === 'success') {
                        swal.fire({
                            title:"Sukses",
                            text: "Simpan Data Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        }).then(function() {
                            window.location="<?=site_url('member/pengajuan/editdata/');?>"+data.id;
                        });
                    } else {
                        swal.fire({
                            title:"Error",
                            text: "Error",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Simpan Data');
                }
            });
        }
    });
});
</script>