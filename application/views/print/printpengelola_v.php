<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Data Wisatawan dan Pengelola</title>
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
    <h1 align="center">DATA WISATAWAN DAN CALON PENGELOLA DESA WISATA</h1>
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
    <table align="center" width="100%">
        <tr>
            <td width="3%"><b>I.</b></td>
            <td width="97%" colspan="3"><b>DATA PENGUNJUNG  / WISATAWAN (dalam 1 Tahun)</b></td>
        </tr>
        <tr>
            <td width="100%" colspan="4"></td>
        </tr>
        <tr>
            <td width="3%"></td>
            <td width="37%" align="center" style="border: 0.5px solid black;">Kategori</td>
            <td width="15%" align="center" style="border: 0.5px solid black;">Jumlah Orang</td>
            <td width="45%"></td>
        </tr>
        <tr>
            <td></td>
            <td style="border: 0.5px solid black;">1. Mancanegara</td>
            <td align="center" style="border: 0.5px solid black;"><?=number_format($detailwisatawan->pengajuan_wisatawan_mancanegara,0,'',',');?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="border: 0.5px solid black;">2. Nusantara</td>
            <td align="center" style="border: 0.5px solid black;"><?=number_format($detailwisatawan->pengajuan_wisatawan_nusantara,0,'',',');?></td>
            <td></td>
        </tr>
    </table>
    <br>
    <table align="center" width="100%">
        <tr>
            <td width="3%"><b>II.</b></td>
            <td width="97%" colspan="3"><b>CALON PENGELOLA DESA WISATA</b></td>
        </tr>
        <tr>
            <td width="3%"></td>
            <td width="25%">Nama Desa Wisata</td>
            <td width="2%">:</td>
            <td width="70%"><?=$detailwisatawan->pengajuan_wisatawan_nama_desa;?></td>
        </tr>
        <tr>
            <td width="3%"></td>
            <td width="25%">Alamat</td>
            <td width="2%">:</td>
            <td width="70%"><?=$detailwisatawan->pengajuan_wisatawan_alamat_desa;?></td>
        </tr>
        <tr>
            <td width="3%"></td>
            <td width="25%">Nama Pengelola</td>
            <td width="2%">:</td>
            <td width="70%"><?=$detailwisatawan->pengajuan_wisatawan_nama_lembaga;?></td>
        </tr>
        <tr>
            <td width="3%"></td>
            <td width="25%">Alamat Sekretariat Pengelola</td>
            <td width="2%">:</td>
            <td width="70%"><?=$detailwisatawan->pengajuan_wisatawan_alamat;?></td>
        </tr>
        <tr>
            <td></td>
            <td>Nomor SK Kepala Desa</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_no_sk;?></td>
        </tr>
        <tr>
            <td></td>
            <td>Susunan Pengurus</td>
            <td>:</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>1. Ketua</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_ketua;?></td>
        </tr>
        <tr>
            <td></td>
            <td>2. Wakil Ketua</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_wakil_ketua;?></td>
        </tr>
        <tr>
            <td></td>
            <td>3. Sekretaris</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_sekretaris;?></td>
        </tr>
        <tr>
            <td></td>
            <td>4. Anggota</td>
            <td>:</td>
            <td>1. <?=$detailwisatawan->pengajuan_wisatawan_anggota_1;?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>:</td>
            <td>2. <?=$detailwisatawan->pengajuan_wisatawan_anggota_2;?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>:</td>
            <td>3. <?=$detailwisatawan->pengajuan_wisatawan_anggota_3;?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>:</td>
            <td>4. <?=$detailwisatawan->pengajuan_wisatawan_anggota_4;?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>:</td>
            <td>5. <?=$detailwisatawan->pengajuan_wisatawan_anggota_5;?></td>
        </tr>
    </table>
  </div>
</body>
</html>