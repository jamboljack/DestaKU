<?php
$username = $this->session->userdata('username');
$dataUser = $this->menu_m->select_user($username)->row();
$uri      = $this->uri->segment(2);
if ($uri == 'meta') {
    $setting   = 'kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active';
} elseif ($uri == 'petugas') {
    $setting   = 'kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active';
} elseif ($uri == 'kontak') {
    $setting   = 'kt-menu__item kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active';
} else {
    $setting   = 'kt-menu__item kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open-dropdown';
}
?>
<div id="kt_header" class="kt-header kt-grid__item kt-header--fixed">
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <?php if($this->session->userdata('level')=='Admin') { ?>
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile kt-header-menu--layout-default">
            <ul class="kt-menu__nav">
                <li class="<?=$setting;?>" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Setting</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item kt-menu__item" aria-haspopup="true">
                                <a href="<?=site_url('admin/meta');?>" class="kt-menu__link">
                                    <span class="kt-menu__link-icon">
                                        <i class="fa fa-cogs"></i>
                                    </span>
                                    <span class="kt-menu__link-text">App Name</span>
                                </a>
                            </li>
                            <li class="kt-menu__item kt-menu__item" aria-haspopup="true">
                                <a href="<?=site_url('admin/petugas');?>" class="kt-menu__link">
                                    <span class="kt-menu__link-icon">
                                        <i class="la la-users"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Petugas Penilai</span>
                                </a>
                            </li>
                            <li class="kt-menu__item kt-menu__item" aria-haspopup="true">
                                <a href="<?=site_url('admin/kontak');?>" class="kt-menu__link">
                                    <span class="kt-menu__link-icon">
                                        <i class="flaticon2-user"></i>
                                    </span>
                                    <span class="kt-menu__link-text">Kontak Kami</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <?php } ?>
    </div>

    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Halo,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile"><?=ucwords(strtolower($dataUser->user_name));?></span>
                    <?php if ($dataUser->user_avatar != '') {?>
                    <img alt="Pic" src="<?=base_url('img/icon/' . $dataUser->user_avatar);?>" />
                    <?php } else {?>
                    <img src="<?=base_url('img/no-image.jpg');?>" class="img-circle"/>
                    <?php }?>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?=base_url('img/bg-1.jpg');?>)">
                    <div class="kt-user-card__avatar">
                        <?php if ($dataUser->user_avatar != '') {?>
                        <img alt="Pic" src="<?=base_url('img/icon/' . $dataUser->user_avatar);?>" />
                        <?php } else {?>
                        <img src="<?=base_url('img/no-image.jpg');?>" class="img-circle"/>
                        <?php }?>
                    </div>
                    <div class="kt-user-card__name">
                        <?=ucwords(strtolower($dataUser->user_name));?>
                    </div>
                </div>

                <div class="kt-notification">
                    <a href="<?=site_url('admin/profil');?>" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                Profil Saya
                            </div>
                            <div class="kt-notification__item-time">
                                Setting Password dan Avatar
                            </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between">
                        <a href="<?=site_url('login/logout');?>" class="btn btn-label btn-label-brand btn-sm btn-bold">Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>