<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Mitigasi Bencana</title>
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
            font-size:13px
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
    <h1 align="center">MITIGASI BENCANA</h1>
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
    <p><b>Jenis Bencana ;</b></p>
    <?php
    $pengajuan_id = $detail->pengajuan_id;
    $no           = 1;
    foreach ($listMitigasi as $r) {
        $mitigasi_id = $r->mitigasi_id;
    ?>
    <h1><?=$no . '. ' . $r->mitigasi_nama;?></h1>
    <?php
    $listPilihan = $this->db->get_where('destaku_mitigasi_pilihan', array('mitigasi_id' => $mitigasi_id))->result();
    foreach ($listPilihan as $p) {
        $mitigasi_pilihan_id = $p->mitigasi_pilihan_id;
        $listDetail          = $this->db->get_where('v_pengajuan_mitigasi', array('mitigasi_pilihan_id' => $mitigasi_pilihan_id, 'pengajuan_id' => $pengajuan_id))->result();
    ?>
    <p><?=ucwords(strtolower($p->mitigasi_pilihan_nama));?></p>
    <table width="100%" align="center">
        <?php foreach($listDetail as $d) { ?>
        <tr>
            <td width="7%" valign="top"></td>
            <td width="3%" align="center" valign="top" style="border: 0.5px solid black;"><?=($d->pengajuan_mitigasi_checked==1?'v':'');?></td>
            <td width="90%" valign="top"><?=$d->mitigasi_detail_nama.' '.($d->mitigasi_detail_tipe=='T'?$d->pengajuan_mitigasi_keterangan:'');?></td>
        </tr>
        <?php } ?>
    </table>
    <?php
        }
        $no++;
    }
    ?>
</div>
</body>
</html>