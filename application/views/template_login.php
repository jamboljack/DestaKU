<?php
$meta = $this->menu_m->select_meta()->row();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title><?=$meta->meta_name;?></title>
		<meta name="keywords" content="<?=$meta->meta_keyword;?>" />
		<meta name="description" content="<?=$meta->meta_desc;?>" />
		<meta name="Distribution" content="Global">
		<meta name="Author" content="<?=$meta->meta_author;?>">
		<meta name="Developer" content="<?=$meta->meta_developer;?>">
		<meta name="robots" content="<?=$meta->meta_robots;?>" />
		<meta name="Googlebot" content="<?=$meta->meta_googlebots;?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="google-site-verification" content="nNgd1HW1lqwEMspMJrzJ73j0j3wxL5ke01rmRsEQ0Ow" />
		<script src="<?=base_url('backend/assets/js/webfont.js');?>"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
		<link href="<?=base_url('backend/assets/css/demo1/pages/login/login-6.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/sweetalert2/dist/sweetalert2.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/style.bundle.css');?>" rel="stylesheet" type="text/css" />
		<script src="<?=base_url('backend/assets/vendors/general/jquery/dist/jquery.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/jquery-form/dist/jquery.form.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/block-ui/jquery.blockUI.js');?>" type="text/javascript"></script>
	</head>

    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >

		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
    			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
        			<?=$content;?>
			        <div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content" style="background-image: url(<?=base_url('img/bg-2.png');?>); background-position: center;">
			            <div class="kt-login__section">
			                <div class="kt-login__block">
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	
		<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#5d78ff",
					"dark": "#282a3c",
					"light": "#ffffff",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
		</script>
		<script src="<?=base_url('backend/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/sticky-js/dist/sticky.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/js/demo1/scripts.bundle.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/js/demo1/pages/login/login-general.js');?>" type="text/javascript"></script>
	</body>
</html>