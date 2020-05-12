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
                                    <h3 class="kt-portlet__head-title"> Ganti Password <small>Update Password Anda</small></h3>
                                </div>
                            </div>
                            <form class="kt-form kt-form--label-right" id="formInput" enctype="multipart/form-data">
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Password Baru</label>
                                                <div class="col-lg-9">
                                                    <input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="Input Password Baru" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                                                <div class="col-lg-9">
                                                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Input Konfirmasi Password Baru" autocomplete="off" />
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

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
            newpassword: { required: true, minlength: 5 },
            confirmpassword: { required: true, equalTo: "#newpassword" }
        },
        messages: {
            newpassword: {
                required:'Password Baru harus di isi', minlength:'Password Baru minimal 5 karakter'
            },
            confirmpassword: {
                required:'Konfirmasi Password harus di isi', minlength:'Konfirmasi Password minimal 5 karakter',
                equalTo: "Konfirmasi Password harus sama dengan Password Baru"
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formInput").serialize();
            $.ajax({
                url: "<?=site_url('admin/profil/updatepassword');?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Update Password Berhasil",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    });
                    resetformPassword();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});

function resetformPassword() {
    $("#newpassword").val('')
    $("#confirmpassword").val('')
    
    var MValid = $("#formInput");
    MValid.validate().resetForm();
}
</script>