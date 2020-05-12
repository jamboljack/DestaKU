<?php
$username = $this->session->userdata('username');
$dataUser = $this->menu_m->select_user($username)->row();
?>
<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
    <div class="kt-portlet ">
        <div class="kt-portlet__head  kt-portlet__head--noborder">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title"><i class="fa fa-user"></i> Data Profil</h3>
            </div>
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit-y">
            <div class="kt-widget kt-widget--user-profile-1">
                <div class="kt-widget__head">
                    <div class="kt-widget__media">
                        <?php if (!empty($dataUser->user_avatar)) {?>
                            <img src="<?=base_url('img/icon/'.$dataUser->user_avatar);?>" alt="">
                        <?php } else {?>
                            <img src="<?=base_url('img/no-image.jpg');?>" alt="">
                        <?php }?>
                    </div>
                    <div class="kt-widget__content">
                        <div class="kt-widget__section">
                            <a href="#" class="kt-widget__username">
                                <?=$dataUser->user_name;?>
                            </a>
                            <span class="kt-widget__subtitle">
                                <?=$dataUser->user_level;?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="kt-widget__body">
                    <div class="kt-widget__content">
                        <div class="kt-widget__info">
                            <span class="kt-widget__label">Email:</span>
                            <a href="#" class="kt-widget__data"><?=$dataUser->user_email;?></a>
                        </div>
                    </div>
                    <?php 
                    $uri = $this->uri->segment('3');
                    if ($uri == '') {
                        $info = 'kt-widget__item--active';
                        $pass = '';                        
                    } else {
                        $info = '';
                        $pass = 'kt-widget__item--active';
                    }
                    ?>
                    
                    <div class="kt-widget__items">
                        <a href="<?=site_url('admin/profil');?>" class="kt-widget__item <?=$info;?>">
                            <span class="kt-widget__section">
                                <span class="kt-widget__icon">
                                    <i class="flaticon-profile-1"></i>
                                </span>
                                <span class="kt-widget__desc">
                                    Informasi Personal
                                </span>
                            </span>
                        </a>
                        <a href="<?=site_url('admin/profil/changepassword');?>" class="kt-widget__item <?=$pass;?>">
                            <span class="kt-widget__section">
                                <span class="kt-widget__icon">
                                    <i class="flaticon-settings-1"></i>
                                </span>
                                <span class="kt-widget__desc">
                                    Ganti Password
                                </span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>