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
                    <a href="<?=site_url('admin/member');?>" class="kt-subheader__breadcrumbs-link">
                        Member
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
                            <a href="<?=site_url('admin/member');?>" class="btn btn-clean">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Batal</span>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Kecamatan</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="lstKecamatan" id="lstKecamatan" onchange="tampilDesa()">
                                                <option value="">- Pilih Kecamatan -</option>
                                                <?php foreach($listKecamatan as $r) { ?>
                                                <option value="<?=$r->no_kec;?>"><?=$r->nama_kec;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Desa/Kelurahan</label>
                                        <div class="col-lg-9">
                                            <select class="form-control" name="lstDesa" id="lstDesa">
                                                <option value="">- Pilih Kecamatan Dahulu -</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">No. WA</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="no_hp" id="no_hp" autocomplete="off" placeholder="Input No. WA">
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
function tampilDesa() {
    no_prov = '33';
    no_kab  = '19';
    no_kec  = document.getElementById("lstKecamatan").value;
    $.ajax({
        url:"<?=site_url('admin/member/select_desa_change/');?>"+no_kec+"/"+no_kab+"/"+no_prov,
        success: function(response) {
            $("#lstDesa").html(response);
        },
        dataType:"html"
    });
    return false;
}

$.validator.addMethod("alphanumeric", function(value, element) {
    return this.optional(element) || /^[\w.]+$/i.test(value);
}, "Hany Huruf, Angka dan Garis Bawah");

$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: {
            username: {
                required: true, minlength: 5, alphanumeric: true,
                remote: {
                    url: "<?=site_url('admin/member/register_user_exists');?>",
                    type: "post",
                    data: {
                        username: function() {
                            return $("#username").val();
                        }
                    }
                }
            },
            password: { required: true, minlength: 5 },
            name: { required: true, minlength: 5 },
            email: {
                required: true, minlength: 15, email: true,
                remote: {
                    url: "<?=site_url('admin/member/register_email_exists');?>",
                    type: "post",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                }
            },
            lstKecamatan: { required: true },
            lstDesa: { required: true },
            no_hp: {
                required: true, minlength: 12, number: true,
                remote: {
                    url: "<?=site_url('admin/member/register_hp_exists');?>",
                    type: "post",
                    data: {
                        no_hp: function() {
                            return $("#no_hp").val();
                        }
                    }
                }
            }
        },
        messages: {
            username: { required:'Username required', minlength:'Minimal 5 Karakter', remote: 'Username sudah ada, mohon Ganti' },
            password: { required:'Password required', minlength:'Minimal 5 Karakter' },
            name: { required:'Nama required', minlength:'Minimal 5 Karakter' },
            email: { required:'Email required', minlength:'Minimal 15 Karakter', email:'Email tidak Valid', remote: 'Email sudah ada, mohon ganti' },
            lstKecamatan: { required:'Kecamatan required' },
            lstDesa: { required:'Desa/Kelurahan required' },
            no_hp: { required:'No. WA required', minlength:'Minimal 12 Digit', number:'Hanya Angka', remote: 'No. WA sudah ada, mohon ganti' },
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/member/savedata');?>",
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
                        window.location="<?=site_url('admin/member');?>";
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