<link href="<?=base_url('backend/assets/vendors/general/summernote/dist/summernote.css');?>" rel="stylesheet" type="text/css" />

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
                        Setting
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Petugas Penilai
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
                                <i class="kt-font-brand la la-users"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Daftar Petugas Penilai</h3>
                        </div>
                    </div>
                    <form class="kt-form" id="formInput">
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIP Ketua</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nip_ketua" placeholder="Input NIP Ketua" value="<?=$detail->petugas_nip_ketua;?>" autocomplete="off" autofocus />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jabatan Ketua</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="jabatan_ketua" placeholder="Input Jabatan Ketua" value="<?=$detail->petugas_jabatan_ketua;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Ketua</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_ketua" placeholder="Input Nama Ketua" value="<?=$detail->petugas_nama_ketua;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIP Sekretaris</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nip_sekretaris" placeholder="Input NIP Sekretaris" value="<?=$detail->petugas_nip_sekretaris;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jabatan Sekretaris</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="jabatan_sekretaris" placeholder="Input Jabatan Sekretaris" value="<?=$detail->petugas_jabatan_sekretaris;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Sekretaris</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_sekretaris" placeholder="Input Nama Sekretaris" value="<?=$detail->petugas_nama_sekretaris;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIP Anggota 1</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nip_anggota_1" placeholder="Input NIP Anggota 1" value="<?=$detail->petugas_nip_anggota_1;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jabatan Anggota 1</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="jabatan_anggota_1" placeholder="Input Jabatan Anggota 1" value="<?=$detail->petugas_jabatan_anggota_1;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Anggota 1</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_anggota_1" placeholder="Input Nama Anggota 1" value="<?=$detail->petugas_nama_anggota_1;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIP Anggota 2</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nip_anggota_2" placeholder="Input NIP Anggota 2" value="<?=$detail->petugas_nip_anggota_2;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jabatan Anggota 2</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="jabatan_anggota_2" placeholder="Input Jabatan Anggota 2" value="<?=$detail->petugas_jabatan_anggota_2;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Anggota 2</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_anggota_2" placeholder="Input Nama Anggota 2" value="<?=$detail->petugas_nama_anggota_2;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">NIP Anggota 3</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" name="nip_anggota_3" placeholder="Input NIP Anggota 3" value="<?=$detail->petugas_nip_anggota_3;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Jabatan Anggota 3</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="jabatan_anggota_3" placeholder="Input Jabatan Anggota 3" value="<?=$detail->petugas_jabatan_anggota_3;?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Anggota 3</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_anggota_3" placeholder="Input Nama Anggota 3" value="<?=$detail->petugas_nama_anggota_3;?>" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('backend/assets/vendors/general/summernote/dist/summernote.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.summernote').summernote({
        height: 150
    });
});

$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
            nip_ketua: { required: true },
            jabatan_ketua: { required: true },
            nama_ketua: { required: true },
            nip_sekretaris: { required: true },
            jabatan_sekretaris: { required: true },
            nama_sekretaris: { required: true },
            jabatan_anggota_1: { required: true },
            nama_anggota_1: { required: true },
            jabatan_anggota_2: { required: true },
            nama_anggota_2: { required: true },
            jabatan_anggota_3: { required: true },
            nama_anggota_3: { required: true }
        },
        messages: {
            nip_ketua: { required :'NIP Ketua required' },
            jabatan_ketua: { required :'Jabatan Ketua required' },
            nama_ketua: { required :'Nama Ketua required' },
            nip_sekretaris: { required :'NIP Sekretaris required' },
            jabatan_sekretaris: { required :'Jabatan Sekretaris required' },
            nama_sekretaris: { required :'Nama Sekretaris required' },
            jabatan_anggota_1: { required :'Jabatan Anggota 1 required' },
            nama_anggota_1: { required :'Nama Anggota 1 required' },
            jabatan_anggota_2: { required :'Jabatan Anggota 2 required' },
            nama_anggota_2: { required :'Nama Anggota 2 required' },
            jabatan_anggota_3: { required :'Jabatan Anggota 3 required' },
            nama_anggota_3: { required :'Nama Anggota 3 required' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/petugas/updatedata');?>",
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