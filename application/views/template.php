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
		<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="google-site-verification" content="nNgd1HW1lqwEMspMJrzJ73j0j3wxL5ke01rmRsEQ0Ow" />
		<script src="<?=base_url('backend/assets/js/webfont.js');?>"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<link href="<?=base_url('backend/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/select2/dist/css/select2.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/morris.js/morris.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/socicon/css/socicon.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/custom/vendors/flaticon/flaticon.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/custom/vendors/flaticon2/flaticon.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/pages/invoices/invoice-1.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/general/sweetalert2/dist/sweetalert2.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/vendors/custom/datatables/datatables.bundle.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/style.bundle.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/skins/header/base/light.css');?>" rel="stylesheet" type="
		text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/skins/header/menu/light.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/skins/brand/light.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('backend/assets/css/demo1/skins/aside/light.css');?>" rel="stylesheet" type="text/css" />
		<script src="<?=base_url('backend/assets/vendors/general/jquery/dist/jquery.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/jquery-form/dist/jquery.form.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/block-ui/jquery.blockUI.js');?>" type="text/javascript"></script>
	</head>

	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
			<div class="kt-header-mobile__logo">
				<a href="<?=base_url();?>">
					<img alt="Logo" src="<?=base_url('img/logo-header.png');?>" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<?php
				if ($this->session->userdata('level') == 'Member') {
					echo $_sidebar_member;
				} else {
					echo $_sidebar;
				}
				?>
				
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
					<?=$_header;?>
					<?=$content;?>
					<?=$_footer;?>
				</div>
			</div>
		</div>

		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand":"#5d78ff",
						"dark":"#282a3c",
						"light":"#ffffff",
						"primary":"#5867dd",
						"success":"#34bfa3",
						"info":"#36a3f7",
						"warning":"#ffb822",
						"danger":"#fd3995"
					},
					"base": {
						"label": ["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],
						"shape": ["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]
					}
				}
			};
		</script>
		
		<script src="<?=base_url('backend/assets/vendors/general/popper.js/dist/umd/popper.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/js-cookie/src/js.cookie.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/moment/min/moment.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/sticky-js/dist/sticky.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/select2/dist/js/select2.full.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/js/demo1/scripts.bundle.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/vendors/custom/datatables/datatables.bundle.js');?>" type="text/javascript"></script>
		<script src="<?=base_url('backend/assets/js/demo1/pages/custom/user/profile.js');?>" type="text/javascript"></script>
	</body>
</html>