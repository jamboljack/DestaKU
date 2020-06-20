<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Print Surat Keterangan</title>
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    tr, td, th {
        padding: 2px;
    }

    th {
        height: 20px;
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
        font-family: "Bookman Old Style"; 
        font-size: 15px;
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
            <td style="font-weight: bold; font-size: 24px;" align="center">DINAS KEBUDAYAAN DAN PARIWISATA</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 14px;" align="center">Jl. Gor Wergu Wetan Telp./Fax. : (0291) 435958; Email : disbudpar@kuduskab.go.id</td>
        </tr>
        <tr>
            <td style="font-weight: bold; font-size: 14px;" align="center">K U D U S   59318</td>
        </tr>
    </table>
    <hr style="height:2px; border-top:2px solid black; border-bottom:1px solid black;">
    <p align="center"><b><u>SURAT KETERANGAN</u></b><br>Nomor : 556/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/10.01/<?=date('Y');?></p>
    <br><br>
    <table align="center" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="5%"></td>
            <td width="90%" colspan="4">Yang bertanda tangan dibawah ini :</td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="5%"></td>
            <td width="15%">Nama</td>
            <td width="2%">:</td>
            <td width="58%"><?=$meta->meta_nama_kepala;?></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="5%"></td>
            <td width="15%" valign="top">Jabatan</td>
            <td width="2%" valign="top">:</td>
            <td width="58%" valign="top"><?=$meta->meta_jabatan;?></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td colspan="6"><br></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="90%" colspan="4">Dengan ini menerangkan bahwa,</td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="5%"></td>
            <td width="15%" valign="top">Nama Desa</td>
            <td width="2%" valign="top">:</td>
            <td width="58%" valign="top"><?=ucwords(strtolower($detaildesa->pengajuan_wisatawan_nama_desa));?></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="5%"></td>
            <td width="15%" valign="top">Alamat Desa</td>
            <td width="2%" valign="top">:</td>
            <td width="58%" valign="top"><?=ucwords(strtolower($detaildesa->pengajuan_wisatawan_alamat_desa));?></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="5%"></td>
            <td width="15%">Maksud</td>
            <td width="2%">:</td>
            <td width="58%"><b>Dicanangkan sebagai Desa Wisata</b></td>
            <td width="5%"></td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td width="90%" colspan="4" align="justify"><?=$meta->meta_keterangan;?></td>
            <td width="5%"></td>
        </tr>
    </table>
    <br>
    <table align="center" width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td width="50%"></td>
            <td width="50%" align="center">Kudus, <?=tgl_indo(date('Y-m-d'));?></td>
        </tr>
        <tr>
            <td></td>
            <td align="center"><?=$meta->meta_title;?><br><br><br><b><u><?=$meta->meta_nama_kepala;?></u></b><br><?=$meta->meta_pangkat;?><br>NIP. <?=$meta->meta_nip;?></td>
        </tr>
    </table>
</div>
</body>
</html>