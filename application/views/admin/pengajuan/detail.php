<script src="<?=base_url('backend/assets/js/jquery.maskMoney.min.js');?>"></script>

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
                        Menu Permohonan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="<?=site_url('admin/pengajuan');?>" class="kt-subheader__breadcrumbs-link">
                        Pengajuan
                    </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Form Detail Pengajuan : <?=$detail->pengajuan_no_pendaftaran.' | DESA '.$detail->nama_kel.' KEC. '.$detail->nama_kec;?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet kt-portlet--head-sm kt-portlet--responsive-mobile" id="kt_page_portlet">
                    <div class="kt-portlet__head kt-portlet__head--sm">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-edit"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">Form Data Pengajuan : <?=$detail->pengajuan_no_pendaftaran.' | DESA '.$detail->nama_kel.' KEC. '.$detail->nama_kec;?></h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="<?=site_url('admin/pengajuan');?>" class="btn btn-clean">
                                <i class="la la-arrow-left"></i>
                                <span class="kt-hidden-mobile">Batal</span>
                            </a>
                            <a href="https://api.whatsapp.com/send?phone=62<?=substr($detail->user_phone,1);?>" target="_blank" class="btn btn-clean"><i class="flaticon-whatsapp"></i><span class="kt-hidden-mobile"> Chat Pemohon</span></a>
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-danger btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-print"></i><span class="kt-hidden-mobile"> Print</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="<?=site_url('admin/pengajuan/printprofil/'.$detail->pengajuan_id);?>" class="kt-nav__link" target="_blank">
                                                <i class="kt-nav__link-icon flaticon-profile-1"></i>
                                                <span class="kt-nav__link-text"> Profil Wilayah</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="<?=site_url('admin/pengajuan/printpengelola/'.$detail->pengajuan_id);?>" class="kt-nav__link" target="_blank">
                                                <i class="kt-nav__link-icon flaticon-list-1"></i>
                                                <span class="kt-nav__link-text"> Wisatawan dan Pengelola</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="<?=site_url('admin/pengajuan/printpotensiwisata/'.$detail->pengajuan_id);?>" class="kt-nav__link" target="_blank">
                                                <i class="kt-nav__link-icon flaticon-placeholder-1"></i>
                                                <span class="kt-nav__link-text"> Potensi Wisata</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="<?=site_url('admin/pengajuan/printrtrw/'.$detail->pengajuan_id);?>" class="kt-nav__link" target="_blank">
                                                <i class="kt-nav__link-icon flaticon-app"></i>
                                                <span class="kt-nav__link-text"> Kesesuaian RTRW</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="<?=site_url('admin/pengajuan/printmitigasi/'.$detail->pengajuan_id);?>" class="kt-nav__link" target="_blank">
                                                <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                                <span class="kt-nav__link-text"> Mitigasi Bencana</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-primary" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1" role="tab"><i class="flaticon-profile-1"></i> Profil Wilayah</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_2_1" role="tab"><i class="flaticon-list-1"></i> Wisatawan dan Pengelola</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_3_1" role="tab"><i class="flaticon-placeholder-1"></i> Potensi Wisata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_4_1" role="tab"><i class="flaticon-app"></i> Kesesuaian RTRW</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_5_1" role="tab"><i class="flaticon2-layers-1"></i> Mitigasi Bencana</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_6_1" role="tab"><i class="la la-file-text"></i> Berkas Pendukung</a>
                            </li>
                        </ul>                        
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                                <?php require 'dataprofil.php'; ?>
                            </div>
                            <div class="tab-pane" id="kt_tabs_2_1" role="tabpanel">
                                <?php require 'datawisatawan.php'; ?>
                            </div>
                            <div class="tab-pane" id="kt_tabs_3_1" role="tabpanel">
                                <?php require 'potensiwisata.php'; ?>
                            </div>
                            <div class="tab-pane" id="kt_tabs_4_1" role="tabpanel">
                                <?php require 'sesuairtrw.php'; ?>
                            </div>
                            <div class="tab-pane" id="kt_tabs_5_1" role="tabpanel">
                                <?php require 'mitigasi.php'; ?>
                            </div>
                            <div class="tab-pane" id="kt_tabs_6_1" role="tabpanel">
                                <?php require 'proposal.php'; ?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?=base_url('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/vendors/custom/js/vendors/jquery-validation.init.js');?>" type="text/javascript"></script>
<script src="<?=base_url('backend/assets/js/jquery.media.js');?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.number').maskMoney({thousands:',', precision:0});
    $('.digit').maskMoney({thousands:',', precision:2});
});

function formatNumber (num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}

$(document).ready(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});
</script>