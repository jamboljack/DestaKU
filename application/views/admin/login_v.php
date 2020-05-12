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
                        <h3 class="kt-login__title">Login ke Dashboard</h3>
                    </div>
                    <div class="kt-login__form">
                        <?php if ($aktivasi=='sukses') { ?>
                            <div class="alert alert-success" role="alert">Aktivasi Member Berhasil.</div>
                            <div align="center"><a href="<?=base_url();?>">SILAHKAN LOGIN</a></div>
                        <?php } elseif ($aktivasi=='gagal') { ?>
                            <div class="alert alert-danger" role="alert">Aktivasi Member Gagal, Silahkan Kontak Administrator.</div>
                        <?php } else { ?>
                        <form class="kt-form" method="post" id="formLogin">
                            <div class="alert alert-danger" role="alert" id="msgHide"></div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username" name="username" id="username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password" name="password" id="password" autocomplete="off">
                            </div>
                            <div class="kt-login__extra">
                                <a href="javascript:;" id="kt_login_forgot">Lupa Password ?</a>
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Login</button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>

                <div class="kt-login__signup">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Daftar Member</h3>
                        <div class="kt-login__desc">Masukkan Data Detail Akun Anda :</div>
                    </div>
                    <div class="kt-login__form">
                        <form class="kt-form" method="post" id="formRegister" name="formRegister">
                        <div class="alert alert-success" role="alert" id="msgInfo"></div>
                        <div class="alert alert-warning" role="alert" id="msgInfoGagal"></div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Nama Lengkap Anda" name="name" id="name" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email Anda" name="email" id="email" autocomplete="off" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Username Anda" name="new_username" id="new_username" autocomplete="off" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="Password Anda" name="register_pass" id="register_pass" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control" type="password" placeholder="Konfirmasi Password Anda" name="confirm_pass" id="confirm_pass" autocomplete="off">
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate">Daftar</button>
                                <button id="kt_login_signup_cancel" class="btn btn-outline-brand ">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="kt-login__forgot">
                    <div class="kt-login__head">
                        <h3 class="kt-login__title">Lupa Password ?</h3>
                        <div class="kt-login__desc">Masukkan Email Anda untuk Reset Password :</div>
                    </div>
                    <div class="kt-login__form">
                        <form class="kt-form" method="post" id="formReset" name="formReset">
                        <div class="alert alert-success" role="alert" id="msgInfoReset"></div>
                        <div class="alert alert-warning" role="alert" id="msgInfoGagalReset"></div>

                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Email Anda" name="reset_email" id="reset_email" autocomplete="off">
                            </div>
                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate">Reset</button>
                                <button id="kt_login_forgot_cancel" class="btn btn-outline-brand">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <?php if ($aktivasi=='') { ?>
        <div class="kt-login__account">
            <span class="kt-login__account-msg">Belum Punya Akun ?</span>&nbsp;&nbsp;
            <a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">Daftar</a>
        </div>
        <?php } ?> -->
    </div>
</div>

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Hanya Huruf, Angka dan Garis Bawah");

$(document).ready(function() {
    $("#msgHide").hide();
    $('#msgInfo').hide();
    $('#msgInfoGagal').hide();
    $('#msgInfoReset').hide();
    $('#msgInfoGagalReset').hide();
});

$(document).ready(function() {
    $( "#formLogin" ).validate({
        rules: {
            username: { required: true, alphanumeric: true,
                remote: {
                    url: "<?=site_url('login/check_login_exists');?>",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#username").val();
                        }
                    }
                } 
            },
            password: { required: true }
        },
        messages: {
            username: {
                required :'Username harus diisi', remote: 'Username Anda tidak terdaftar'
            },
            password: {
                required :'Password harus diisi'
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formLogin").serialize();
            $.ajax({
                url: '<?=site_url('login/validasi');?>',
                type: "POST",
                data: dataString,
                dataType: "JSON",
                success: function(data) {
                    if (data.status === 'success') {
                        location.reload();
                    } else {
                        $('#msgHide').show();
                        $('#msgHide').html('<div class="alert-text">'+data.msg+'</div>');
                    }
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

function resetFormReset() {
    $("#reset_email").val('');

    var MValid = $("#formReset");
    MValid.validate().resetForm();
    MValid.find(".error").removeClass("error");
    MValid.removeAttr('aria-describedby');
    MValid.removeAttr('aria-invalid');
}

$(document).ready(function() {
    $( "#formRegister" ).validate({
        rules: {
            name: { required: true },
            email: { 
                required: true, email: true,
                remote: {
                    url: "<?=site_url('login/register_email_exists');?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                } 
            },
            new_username: { 
                required: true, alphanumeric: true, minlength: 5,
                remote: {
                    url: "<?=site_url('login/register_user_exists');?>",
                    type: "post",
                    data: {
                        new_username: function() {
                            return $("#new_username").val();
                        }
                    }
                } 
            },
            register_pass: { required: true, minlength: 5 },
            confirm_pass: { required: true, minlength: 5, equalTo: "#register_pass" },
        },
        messages: {
            name: {
                required :'Nama Lengkap harus diisi'
            },
            email: {
                required :'Email harus diisi', email: 'Email tidak Valid', remote: 'Email sudah Ada'
            },
            new_username: {
                required :'Username harus diisi', remote: 'Username sudah Ada', minlength:'Minimal 5 Karakter'
            },
            register_pass: {
                required :'Password harus diisi', minlength:'Minimal 5 Karakter'
            },
            confirm_pass: {
                required :'Konfirmasi Password harus diisi', minlength:'Minimal 5 Karakter', equalTo:'Konfirmasi tidak Sama dengan Password'
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formRegister").serialize();
            $.ajax({
                url: '<?=site_url('login/register');?>',
                type: "POST",
                data: dataString,
                dataType: "JSON",
                success: function(data) {
                    if (data.status === 'success') {
                        $('#msgInfo').show();
                        $('#msgInfoGagal').hide();
                        $('#msgInfo').text(data.msg);
                    } else {
                        $('#msgInfo').hide();
                        $('#msgInfoGagal').show();
                        $('#msgInfoGagal').text(data.msg);
                    }
                    resetFormRegister();
                },
                error: function() {
                    $('#msgInfo').hide();
                    $('#msgInfoGagal').show();
                    $('#msgInfoGagal').text('Error Proses Register');
                }
            });
        }
    });
});

$(document).ready(function() {
    $( "#formReset" ).validate({
        rules: {
            reset_email: { 
                required: true, email: true,
                remote: {
                    url: "<?=site_url('login/check_email_exists');?>",
                    type: "post",
                    data: {
                        reset_email: function() {
                            return $("#reset_email").val();
                        }
                    }
                } 
            }
        },
        messages: {
            reset_email: {
                required :'Email harus diisi', email: 'Email tidak Valid', remote: 'Email sudah Ada'
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $("#formReset").serialize();
            $.ajax({
                url: '<?=site_url('login/reset');?>',
                type: "POST",
                data: dataString,
                dataType: "JSON",
                success: function(data) {
                    if (data.status === 'success') {
                        $('#msgInfoReset').show();
                        $('#msgInfoGagalReset').hide();
                        $('#msgInfoReset').text(data.msg);
                    } else {
                        $('#msgInfoReset').hide();
                        $('#msgInfoGagalReset').show();
                        $('#msgInfoGagalReset').text(data.msg);
                    }
                    resetFormReset();
                },
                error: function() {
                    $('#msgInfoReset').hide();
                    $('#msgInfoGagalReset').show();
                    $('#msgInfoGagalReset').text('Error Proses Request');
                }
            });
        }
    });
});
</script>