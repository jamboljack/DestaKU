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
                        Menu Users
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="<?=site_url('admin/users');?>" class="kt-subheader__breadcrumbs-link">
                        Users
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Tambah Data
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
                            <h3 class="kt-portlet__head-title">Form Tambah Data</h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="<?=site_url('admin/users');?>" class="btn btn-clean">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile"> Batal</span>
                            </a>
                        </div>
                    </div>
                    <form class="kt-form" id="formInput" name="formInput" method="post">
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Username</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="username" id="username" autocomplete="off" placeholder="Input Username" autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Password</label>
                                        <div class="col-lg-9">
                                            <input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Input Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Input Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Input Email" autocomplete="off">
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
    $('.lsselect2').select2({
    });
});

$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Hany Huruf, Angka dan Garis Bawah");

$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
            username: {
                required: true, minlength: 5, alphanumeric: true,
                remote: {
                    url: "<?=site_url('admin/users/register_user_exists');?>",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#username").val();
                        }
                    }
                }
            },
            password: {
                required: true, minlength: 5
            },
            name: {
                required: true, minlength: 5
            },
            email: {
                required: true, minlength: 15, email: true,
                remote: {
                    url: "<?=site_url('admin/users/register_email_exists');?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                }
            }
        },
        messages: {
            username: {
                required:'Username required', minlength:'Minimal 5 Karakter',
                remote: 'Username sudah ada, mohon Ganti'
            },
            password: {
                required:'Password required', minlength:'Minimal 5 Karakter'
            },
            name: {
                required:'Nama required', minlength:'Minimal 5 Karakter'
            },
            email: {
                required:'Email required', minlength:'Minimal 15 Karakter', email:'Email tidak Valid',
                remote: 'Email sudah ada, mohon ganti'
            }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/users/savedata');?>",
                type: "POST",
                data: dataString,
                success: function(data) {
                    swal.fire({
                        title:"Sukses",
                        text: "Simpan Data Sukses",
                        showConfirmButton: false,
                        type: "success",
                        timer: 2000
                    }).then(function() {
                        window.location="<?=site_url('admin/users');?>";
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Simpan Data');
                }
            });
        }
    });
});
</script>