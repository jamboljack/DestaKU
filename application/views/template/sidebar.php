<?php
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard          = 'kt-menu__item--active';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'tenaga_kerja') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = 'kt-menu__item--active';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'pendidikan') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = 'kt-menu__item--active';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'sarana_hiburan') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = 'kt-menu__item--active';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'sarana_olahraga') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = 'kt-menu__item--active';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'kesehatan') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = 'kt-menu__item--active';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'tempat_ibadah') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = 'kt-menu__item--active';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'pertanian') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = 'kt-menu__item--active';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'jenis_perusahaan') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = 'kt-menu__item--active';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'angkutan_darat') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = 'kt-menu__item--active';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'telekomunikasi') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = 'kt-menu__item--active';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'perdagangan') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = 'kt-menu__item--active';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'rtrw') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = 'kt-menu__item--active';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'mitigasi') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = 'kt-menu__item--active';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'berkas') {
    $dashboard          = '';
    $master             = 'kt-menu__item--open kt-menu__item--here';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = 'kt-menu__item--active';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'indikator') {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = 'kt-menu__item--open kt-menu__item--here';
    $indikator          = 'kt-menu__item--active';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'bobot') {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = 'kt-menu__item--open kt-menu__item--here';
    $indikator          = '';
    $bobot              = 'kt-menu__item--active';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
} elseif ($uri == 'pengajuan') {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = 'kt-menu__item--active';
    $users              = '';
    $member             = '';
} elseif ($uri == 'users') {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = 'kt-menu__item--active';
    $member             = '';
} elseif ($uri == 'member') {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = 'kt-menu__item--active';
} else {
    $dashboard          = '';
    $master             = '';
    $tenaga_kerja       = '';
    $pendidikan         = '';
    $sarana_hiburan     = '';
    $sarana_olahraga    = '';
    $kesehatan          = '';
    $tempat_ibadah      = '';
    $pertanian          = '';
    $jenis_perusahaan   = '';
    $angkutan_darat     = '';
    $telekomunikasi     = '';
    $perdagangan        = '';
    $rtrw               = '';
    $mitigasi           = '';
    $berkas             = '';
    $nilai              = '';
    $indikator          = '';
    $bobot              = '';
    $pengajuan          = '';
    $users              = '';
    $member             = '';
}
?>
<button class="kt-aside-close" id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="<?=site_url('admin/home');?>">
                <img alt="Logo" src="<?=base_url('img/logo-header.png');?>"/>
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                            <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                        </g>
                    </svg>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)" />
                        </g>
                    </svg>
                </span>
            </button>
        </div>
    </div>

    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav">
                <li class="kt-menu__item <?=$dashboard;?>" aria-haspopup="true">
                    <a href="<?=site_url('admin/home');?>" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <i class="fa fa-desktop"></i>
                        </span>
                        <span class="kt-menu__link-text">Dashboard</span>
                    </a>
                </li>
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Menu Master</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu <?=$master;?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="fab fa-windows"></i>
                        </span>
                        <span class="kt-menu__link-text">Data Master</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item <?=$tenaga_kerja;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/tenaga_kerja');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Tenaga Kerja</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$pendidikan;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/pendidikan');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Pendidikan</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$sarana_hiburan;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/sarana_hiburan');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Sarana Hiburan</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$sarana_olahraga;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/sarana_olahraga');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Sarana Olahraga</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$kesehatan;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/kesehatan');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Kesehatan</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$tempat_ibadah;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/tempat_ibadah');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Tempat Ibadah</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$pertanian;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/pertanian');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Pertanian</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$jenis_perusahaan;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/jenis_perusahaan');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Jenis Perusahaan</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$angkutan_darat;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/angkutan_darat');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Angkutan Darat</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$telekomunikasi;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/telekomunikasi');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">POS dan Telekomunikasi</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$perdagangan;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/perdagangan');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Perdagangan</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$rtrw;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/rtrw');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">RTRW</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$mitigasi;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/mitigasi');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Mitigasi Bencana</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$berkas;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/berkas');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Berkas Pendukung</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu <?=$nilai;?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-icon">
                            <i class="flaticon2-grids"></i>
                        </span>
                        <span class="kt-menu__link-text">Data Penilaian</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu"><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item <?=$indikator;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/indikator');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Indikator</span>
                                </a>
                            </li>
                            <li class="kt-menu__item <?=$bobot;?>" aria-haspopup="true">
                                <a href="<?=site_url('admin/bobot');?>" class="kt-menu__link">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Bobot</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Menu Permohonan</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item kt-menu__item <?=$pengajuan;?>" aria-haspopup="true">
                    <a href="<?=site_url('admin/pengajuan');?>" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <i class="flaticon2-document"></i>
                        </span>
                        <span class="kt-menu__link-text">Pengajuan</span>
                    </a>
                </li>
                <li class="kt-menu__section">
                    <h4 class="kt-menu__section-text">Menu Users</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item kt-menu__item <?=$users;?>" aria-haspopup="true">
                    <a href="<?=site_url('admin/users');?>" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <i class="fa fa-user-friends"></i>
                        </span>
                        <span class="kt-menu__link-text">Users</span>
                    </a>
                </li>
                <li class="kt-menu__item kt-menu__item <?=$member;?>" aria-haspopup="true">
                    <a href="<?=site_url('admin/member');?>" class="kt-menu__link">
                        <span class="kt-menu__link-icon">
                            <i class="flaticon-users-1"></i>
                        </span>
                        <span class="kt-menu__link-text">Member</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>