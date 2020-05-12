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
                    <a href="#" class="kt-subheader__breadcrumbs-link">
                        Users
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--sm">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-list-1"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        Daftar Users
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-actions">
                        <button type="button" class="btn btn-warning btn-elevate btn-icon-sm" data-toggle="modal" data-target="#filterData"><i class="fa fa-search"></i><span class="kt-hidden-mobile"> Filter Data</span></button>
                        <a href="<?=site_url('admin/users/adddata');?>" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="fa fa-plus-circle"></i><span class="kt-hidden-mobile"> Tambah</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">
                <table class="table table-striped table-hover table-bordered" id="tableData">
                    <thead>
                        <tr>
                            <th width="3%"></th>
                            <th width="5%">No</th>
                            <th width="10%">Username</th>
                            <th>Nama Lengkap</th>
                            <th width="20%">Email</th>
                            <th width="10%">Level</th>
                            <th width="10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function reload_table() {
    table.ajax.reload(null,false);
}

var table;
$(document).ready(function() {
    table = $('#tableData').DataTable({
        "responsive": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": "<?=site_url('admin/users/data_list');?>",
            "type": "POST",
            "data": function(data) {
                data.lstStatus = $('#lstStatus').val();
            }
        },
        "columnDefs": [
            {
                "targets": [ 0, 1, 6 ],
                "orderable": false,
            },
            {
                "targets": [ 0, 1, 5, 6 ],
                "className": "dt-center",
            }
        ],
    });

    $('#btn-filter').click(function() {
        reload_table();
        $('#filterData').modal('hide');
    });

    $('#btn-reset').click(function() {
        $('#form-filter')[0].reset();
        reload_table();
        $('#filterData').modal('hide');
    });
});
</script>

<div class="modal fade" id="filterData" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="kt-font-brand flaticon2-search"></i> Filter Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="kt-form" id="form-filter">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="lstStatus" id="lstStatus">
                            <option value="">- SEMUA DATA -</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="btn-filter"><i class="fa fa-search"></i> Filter</button>
                    <button type="button" class="btn btn-default" id="btn-reset"><i class="flaticon2-refresh"></i> Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>