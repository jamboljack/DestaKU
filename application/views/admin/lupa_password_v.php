<div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
    <div class="kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__body">
                <div class="kt-login__logo">
                    <a href="#">
                        <img src="<?=base_url('img/logo-login.png');?>">
                    </a>
                </div>
                <div class="kt-login__signin">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Reset Password</h3>
                    </div>
                    <div class="kt-login__form">
                        
                        <form class="kt-form" method="post" id="formReset">
                            <input type="hidden" name="key" value="<?=$detail->user_username;?>">
                            <div class="alert alert-danger" role="alert" id="msgHide"></div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Masukkan Password Baru" name="password" id="password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Konfirmasi Password Baru" name="confirm_password" id="confirm_password" autocomplete="off">
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Reset</button>
                            </div>
                        </form>
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
    $("#msgHide").hide();
});

$(document).ready(function() {
    $( "#formReset" ).validate({
        rules: {
            password: { required: true, minlength: 5 },
            confirm_password: { required: true, equalTo: "#password" }
        },
        messages: {
            password: {
                required:'Password Baru harus di isi', minlength:'Password Baru minimal 5 karakter'
            },
            confirm_password: {
                required:'Konfirmasi Password harus di isi', minlength:'Konfirmasi Password minimal 5 karakter',
                equalTo: "Konfirmasi Password harus sama dengan Password Baru"
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formReset").serialize();
            $.ajax({
                url: '<?=site_url('lupa-password/updatepassword');?>',
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Reset Password Sukses",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "success"
                    }).then(function() {
                        window.location="<?=site_url('login');?>";
                    });
                },
                error: function() {
                    $('#msgHide').show();
                    $('#msgHide').html('<div class="alert-text">Error Proses Login</div>');
                }
            });
        }
    });
});

function resetFormRegister() {
    $("#name").val('');
    $("#email").val('');
    $("#new_username").val('');
    $("#register_pass").val('');
    $("#confirm_pass").val('');

    var MValid = $("#formRegister");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}
</script>