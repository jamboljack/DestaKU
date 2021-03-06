<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Laporan Pengajuan Permohonan Desa</title>
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
        
        h4 {
            text-decoration: underline;
            line-height: 0.5px;   
        }

        .page {
            width: 21cm;
            min-height: 29.4cm;
            padding: 0cm;
            margin: 0.1cm auto;
            border: 0.3px #D3D3D3 none;
            border-radius: 2px;
            background: white;
        }

    	body{
            font-family: "Franklin Gothic Medium"; 
            font-size: 11px;
        }
    	
        h1{
            font-size:15px
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
    <table width="100%" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" width="15%" rowspan="4"><img src="<?=base_url('img/logo-kudus.jpg');?>" width="75%"></td>
            <td width="85%" style="font-size: 15px;" align="center">PEMERINTAH KABUPATEN KUDUS</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 24px;" align="center"><?=$kontak->contact_name;?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 14px;" align="center"><?=$kontak->contact_address;?><br>Email : <?=$kontak->contact_email;?></td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 14px;" align="center">K U D U S   59318</td>
        </tr>
    </table>
    <hr style="height:2px; border-top:2px solid black; border-bottom:1px solid black;">
    <p align="center" style="font-size: 15px;">DATA PERMOHONAN PENGAJUAN DESA WISATA</p>
    <?php
    $dari    = $this->uri->segment(4);
    $sampai  = $this->uri->segment(5);
    $status  = $this->uri->segment(6);
    $bobot   = $this->uri->segment(7);
    switch ($status) {
        case 'B':
            $sts = 'BARU';
            break;
        case 'K':
            $sts = 'KONFIRMASI';
            break;
        case 'N':
            $sts = 'PENILAIAN';
            break;
        case 'D':
            $sts = 'DRAFT';
            break;
        default:
            $sts = '';
            break;
    }

    if ($dari != 'all' && $status == 'all' && $bobot == 'all') {
        echo '<p align="center" style="font-size:14px;">PERIODE : '.tgl_indo(date('Y-m-d', strtotime($dari))).' - '.tgl_indo(date('Y-m-d', strtotime($sampai))).'</p>';
    } elseif ($dari == 'all'  && $status != 'all' && $bobot == 'all') {
        echo '<p align="center" style="font-size:14px;">STATUS : '.$sts.'</p>';
    } elseif ($dari != 'all' && $status != 'all' && $bobot == 'all') {
        echo '<p align="center" style="font-size:14px;">PERIODE : '.tgl_indo(date('Y-m-d', strtotime($dari))).' - '.tgl_indo(date('Y-m-d', strtotime($sampai))).'<br>STATUS : '.$sts.'</p>';
    } elseif ($dari == 'all'  && $status == 'all' && $bobot != 'all') {
        echo '<p align="center" style="font-size:14px;">KATEGORI : '.$kelompok.'</p>';
    } elseif ($dari != 'all'  && $status == 'all' && $bobot != 'all') {
        echo '<p align="center" style="font-size:14px;">PERIODE : '.tgl_indo(date('Y-m-d', strtotime($dari))).' - '.tgl_indo(date('Y-m-d', strtotime($sampai))).'<br>KATEGORI : '.$kelompok.'</p>';
    } elseif ($dari == 'all'  && $status != 'all' && $bobot != 'all') {
        echo '<p align="center" style="font-size:14px;">STATUS : '.$sts.'<br>KATEGORI : '.$kelompok.'</p>';
    } elseif ($dari != 'all' && $status != 'all' && $bobot != 'all') {
        echo '<p align="center" style="font-size:14px;">PERIODE : '.tgl_indo(date('Y-m-d', strtotime($dari))).' - '.tgl_indo(date('Y-m-d', strtotime($sampai))).'<br>STATUS : '.$sts.'<br>KATEGORI : '.$kelompok.'</p>';
    }
    ?>
    <table width="100%" cellpadding="2" cellspacing="2" border="1">
        <tr>
            <th width="5%">No</th>
            <th width="5%">Tahun</th>
            <th width="10%">Tanggal</th>
            <th width="20%">No. Daftar</th>
            <th width="15%">Kecamatan</th>
            <th width="30%">Desa/Kelurahan</th>
            <th width="5%">Nilai</th>
            <th width="10%">Status</th>
        </tr>
        <?php
        $no    = 1;
        foreach($listData as $r) { 
            switch ($r->pengajuan_status) {
                case 'B':
                    $status = 'BARU';
                    break;
                case 'K':
                    $status = 'KONFIRMASI';
                    break;
                case 'N':
                    $status = 'PENILAIAN';
                    break;
                default:
                    $status = 'DRAFT';
                    break;
            }
        ?>
        <tr>
            <td align="center" valign="top"><?=$no;?></td>
            <td align="center" valign="top"><?=date('Y', strtotime($r->pengajuan_tanggal));?></td>
            <td align="center" valign="top"><?=date('d-m-Y', strtotime($r->pengajuan_tanggal));?></td>
            <td valign="top"><?=$r->pengajuan_no_pendaftaran;?></td>
            <td valign="top"><?=$r->nama_kec;?></td>
            <td valign="top"><?=$r->nama_kel;?></td>
            <td valign="top" align="center"><?=number_format($r->pengajuan_nilai,0,'',',');?></td>
            <td valign="top" align="center"><?=$status;?></td>
        </tr>
        <?php 
            $no++;
        }
        ?>
    </table>
</div>
</body>
</html>