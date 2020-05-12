<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Kesesuaian RTRW</title>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        tr, td, th {
            padding: 3px;
        }

        th {
            height: 25px;
            text-transform: uppercase;
        }

        .page {
            width: 21cm;
            min-height: 33cm;
            padding: 0cm;
            margin: 0.1cm auto;
            border: 0.3px #D3D3D3 none;
            border-radius: 2px;
            background: white;
        }

    	body{
            font-family: "Franklin Gothic Medium"; 
            font-size: 13px;
        }
    	
        h1{
            font-size:20px
        }

        @media print{
        	#comments_controls,
        	#print-link{
        		display:none;
        	}
        }
    </style>
</head>
<body>
<a href="#Print">
<img src="<?=base_url('img/print.png');?>" height="24" width="24" title="Print" id="print-link" onClick="window.print();return false;" />
</a>
<div class="page">
    <h1 align="center">KESESUAIAN DENGAN RENCANA TATA RUANG WILAYAH (RTRW)<br>KABUPATEN KUDUS TAHUN 2012 - 2032</h1>
  	<table align="center" width="100%">
        <tr>
            <td width="20%"><b>Desa</b></td>
            <td width="80%"><b>: <?=$detail->nama_kel;?></b></td>
        </tr>
        <tr>
            <td><b>Kecamatan</b></td>
            <td><b>: <?=$detail->nama_kec;?></b></td>
        </tr>
    </table>
    <br>
    <?php 
    $pengajuan_id = $detail->pengajuan_id;
    $no           = 1;
    foreach($listRTRWGrup as $r) { 
        $rtrw_grup_id = $r->rtrw_grup_id;
        $listDetail   = $this->db->order_by('rtrw_detail_nama', 'asc')->get_where('v_rtrw', array('rtrw_grup_id' => $rtrw_grup_id, 'pengajuan_id' => $pengajuan_id))->result();
    ?>
    <p><?=$no.'. '.ucwords(strtolower($r->rtrw_grup_nama));?></p>
    <table width="100%" align="center">
        <?php 
        foreach($listDetail as $d) {
            switch ($d->pengajuan_rtrw_status) {
                case 'Y':
                    $status = 'Ya';
                    break;
                case 'T':
                    $status = 'Tidak';
                    break;
                default:
                    $status = '-';
                    break;
            }
        ?>
        <tr>
            <td width="5%" align="right">-</td>
            <td width="85%"><?=ucwords(strtolower($d->rtrw_detail_nama));?></td>
            <td width="10%" align="center"><?=$status;?></td>
        </tr>
        <?php } ?>
    </table>
    <?php 
        $no++;
    }
    ?>
</div>
</body>
</html>