<?php
$username = $this->session->userdata('username');
$dataUser = $this->menu_m->select_user($username)->row();
?>
<link href="<?=base_url('backend/assets/js/bootstrap-fileinput/bootstrap-fileinput.css');?>" rel="stylesheet" type="text/css"/>

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
                        Profil Saya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                <i class="la la-close"></i>
            </button>

            <?=$_sidebaruser;?>

            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="kt-portlet">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title"> Informasi Personal <small>Update Data dan Avatar Anda</small></h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right" id="formInput" method="post" enctype="multipart/form-data">
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="<?=base_url('img/no-avatar.png');?>" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 200px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                            <span class="fileinput-new">
                                                            Ganti Avatar </span>
                                                            <span class="fileinput-exists">
                                                            Ubah </span>
                                                            <input type="file" name="foto" accept=".png,.jpg,.jpeg,.gif">
                                                            </span>
                                                            <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                            Hapus </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" name="name" value="<?=$detail->user_name;?>" placeholder="Input Nama Lengkap Anda" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">No. Handphone/WA</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="text" name="phone" value="<?=$detail->user_phone;?>" placeholder="Input No. Handphone/WA Anda" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="email" name="email" value="<?=$detail->user_email;?>" placeholder="Input Email Anda" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <div class="row">
                                            <div class="col-lg-3 col-xl-3">
                                            </div>
                                            <div class="col-lg-9 col-xl-9">
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
    </div>
</div>

<script type="text/javascript" src="<?=base_url('backend/assets/js/bootstrap-fileinput/bootstrap-fileinput.js');?>"></script>
<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
            name: { required: true },
            phone: { required: true },
            email: { required: true, email: true }
        },
        messages: {
            name: { required :'Nama Lengkap required' },
            phone: { required :'No. Handphone/WA required' },
            email: { required :'Email required', email:'Email tidak Valid' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            var formData = new FormData($('#formInput')[0]);
            $.ajax({
                url: '<?=site_url('admin/profil/updatedata');?>',
                type: "POST",
                dataType: 'json',
                data: formData,
                async: true,
                success: function(data) {
                    if (data.status === 'success') {
                        swal.fire({
                            title:"Sukses",
                            text: "Update Data Profil Sukses",
                            showConfirmButton: false,
                            type: "success",
                            timer: 2000
                        });
                        location.reload();
                    } else {
                        swal.fire({
                            title:"Info",
                            text: "File tidak Sesuai",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "info"
                        });
                    }
                },
                error: function (response) {
                    swal.fire({
                        title:"Error",
                        text: "Update Data Profil Gagal",
                        showConfirmButton: false,
                        type: "error",
                        timer: 2000
                    });
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
});
</script>