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
                        Kontak Kami
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
                                <i class="kt-font-brand flaticon2-user"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Kontak Kami</h3>
                        </div>
                    </div>
                    <form class="kt-form" id="formInput">
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama Instansi</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Nama APP" value="<?=$detail->contact_name;?>" autocomplete="off"  autofocus />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="address" value="<?=$detail->contact_address; ?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">No. Telepon</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="phone" value="<?=$detail->contact_phone; ?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="email" value="<?=$detail->contact_email; ?>" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Website</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="web" value="<?=$detail->contact_web; ?>" autocomplete="off" />
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

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $( "#formInput" ).validate({
        rules: { 
            name: { required: true },
            address: { required: true },
            phone: { required: true },
            email: { required: true, email: true },
            web: { required: true, url: true }
        },
        messages: {
            name: { required:'Nama Instansi required' },
            address: { required:'Alamat required' },
            phone: { required:'No. Telepon harus diisi' },
            email: { required:'Email harus diisi', email:'Email tidak Valid' },
            web: { required:'Website harus diisi', url:'Website tidak Valid (Ex. http://www.domain.com)' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/kontak/updatedata');?>",
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
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error Update Data');
                }
            });
        }
    });
});
</script>