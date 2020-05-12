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
                        App Name
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
                                <i class="kt-font-brand flaticon2-settings"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Setting App Name</h3>
                        </div>
                    </div>
                    <form class="kt-form" id="formInput">
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nama App</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="name" placeholder="Input Nama APP" value="<?=$detail->meta_name;?>" autocomplete="off"  autofocus />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Deskripsi</label>
                                <div class="col-9">
                                    <textarea class="form-control" rows="10" name="desc"><?=$detail->meta_desc;?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Keyword</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="keyword" placeholder="Input Keyword" value="<?=$detail->meta_keyword;?>" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Author</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="author" placeholder="Input Author" value="<?=$detail->meta_author;?>" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Developer</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="developer" placeholder="Input Developer" value="<?=$detail->meta_developer;?>" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Robots</label>
                                <div class="col-9">
                                    <select class="form-control" name="lstRobot" >
                                        <option value="">- Pilih -</option>
                                        <option value="index, follow" <?php if ($detail->meta_robots=='index, follow') { echo 'selected'; } ?>>index, follow</option>
                                        <option value="index, nofollow" <?php if ($detail->meta_robots=='index, nofollow') { echo 'selected'; } ?>>index, nofollow</option>
                                        <option value="noindex, follow" <?php if ($detail->meta_robots=='noindex, follow') { echo 'selected'; } ?>>noindex, follow</option>
                                        <option value="noindex, nofollow" <?php if ($detail->meta_robots=='noindex, nofollow') { echo 'selected'; } ?>>noindex, nofollow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Googlebots</label>
                                <div class="col-9">
                                    <select class="form-control" name="lstGoogle" >
                                        <option value="">- Pilih -</option>
                                        <option value="index, follow" <?php if ($detail->meta_googlebots=='index, follow') { echo 'selected'; } ?>>index, follow</option>
                                        <option value="index, nofollow" <?php if ($detail->meta_googlebots=='index, nofollow') { echo 'selected'; } ?>>index, nofollow</option>
                                        <option value="noindex, follow" <?php if ($detail->meta_googlebots=='noindex, follow') { echo 'selected'; } ?>>noindex, follow</option>
                                        <option value="noindex, nofollow" <?php if ($detail->meta_googlebots=='noindex, nofollow') { echo 'selected'; } ?>>noindex, nofollow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Email</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="email" placeholder="Input Email" value="<?=$detail->meta_email;?>" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Nomor WA</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="no_wa" placeholder="Input Nomor WA" value="<?=$detail->meta_wa;?>" autocomplete="off"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3 col-form-label">Footer</label>
                                <div class="col-9">
                                    <textarea class="form-control summernote" rows="10" name="footer"><?=$detail->meta_footer;?></textarea>
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
            name: { required: true },
            desc: { required: true },
            keyword: { required: true },
            author: { required: true },
            developer: { required: true },
            lstRobot: { required: true },
            lstGoogle: { required: true },
            email: { required: true, email: true },
            no_wa: { required: true, number: true }
        },
        messages: {
            name: { required :'Nama APP required' },
            desc: { required :'Description required' },
            keyword: { required :'Keyword required' },
            author: { required :'Author required' },
            developer: { required :'Developer required' },
            lstRobot: { required :'Robots required' },
            lstGoogle: { required :'Googlebots required' },
            email: { required :'Email required', email:'Email tidak Valid' },
            no_wa: { required :'Nomor WA required', number:'Harus Angka' }
        },
        invalidHandler: function(event, validator) {
            KTUtil.scrollTop();
        },
        submitHandler: function (form) {
            dataString = $('#formInput').serialize();
            $.ajax({
                url: "<?=site_url('admin/meta/updatedata');?>",
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