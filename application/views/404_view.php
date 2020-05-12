<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>404 Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <link href="<?=base_url('backend/assets/css/demo1/pages/error/error-1.css');?>" rel="stylesheet" type="text/css" />
        <link href="./assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('backend/assets/css/demo1/style.bundle.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('backend/assets/css/demo1/skins/header/base/light.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('backend/assets/css/demo1/skins/header/menu/light.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('backend/assets/css/demo1/skins/brand/dark.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?=base_url('backend/assets/css/demo1/skins/aside/dark.css');?>" rel="stylesheet" type="text/css" />
    </head>

    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
        <div class="kt-grid kt-grid--ver kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1" style="background-image: url(<?=base_url('img/bg1.jpg');?>);">
                <div class="kt-error-v1__container">
                    <h1 class="kt-error-v1__number">404</h1>
                    <p class="kt-error-v1__desc">
                        Halaman tidak ditemukan
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>