<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Profil Wilayah</title>
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
    <h1 align="center">DATA PROFIL WILAYAH</h1>
    <p align="center">TAHUN : <?=date('Y', strtotime($detail->pengajuan_tanggal));?></p>
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
  	<table align="center" width="100%">
        <tr>
            <td width="2%"><b>I.</b></td>
          	<td width="98%" colspan="7"><b>GEOGRAFI</b></td>
        </tr>
        <tr>
            <td width="2%"></td>
            <td width="18%">1. Batas</td>
            <td width="3%">:</td>
            <td colspan="5" width="77%">Wilayah dibatasi oleh</td>
        </tr>
        <tr>
            <td width="2%"></td>
            <td width="18%"></td>
            <td width="2%"></td>
            <td width="2%">-</td>
            <td width="22%">Sebelah Utara</td>
            <td width="2%">:</td>
            <td colspan="2" width="52%"><?=$detail->pengajuan_batas_utara;?></td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td>-</td>
          	<td>Sebelah Timur</td>
          	<td>:</td>
          	<td colspan="2"><?=$detail->pengajuan_batas_timur;?></td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td>-</td>
          	<td>Sebelah Selatan</td>
          	<td>:</td>
          	<td colspan="2"><?=$detail->pengajuan_batas_selatan;?></td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td>-</td>
          	<td>Sebelah Barat</td>
          	<td>:</td>
          	<td colspan="2"><?=$detail->pengajuan_batas_barat;?></td>
        </tr>
        <tr>
          	<td></td>
          	<td>2. Jarak</td>
          	<td>:</td>
          	<td colspan="4">Arah Utara-Selatan, Terjauh</td>
          	<td width="33%">: <?=number_format($detail->pengajuan_jarak_utara_selatan,2,'.',',');?> Km</td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td colspan="4">Arah Barat-Timur, Terjauh</td>
          	<td>: <?=number_format($detail->pengajuan_jarak_barat_timur,2,'.',',');?> Km</td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td colspan="4">Ibukota Kecamatan ke Ibukota Kabupaten</td>
          	<td>: <?=number_format($detail->pengajuan_jarak_kabupaten,2,'.',',');?> Km</td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td colspan="4">Ibukota Kecamatan ke Ibukota Provinsi</td>
          	<td>: <?=number_format($detail->pengajuan_jarak_provinsi,2,'.',',');?> Km</td>
        </tr>
        <tr>
          	<td></td>
          	<td>3. Tinggi</td>
          	<td>:</td>
          	<td colspan="5">terletak pada ketinggian rata-rata <?=number_format($detail->pengajuan_tinggi,3,'.',',');?> m di atas permukaan air laut</td>
        </tr>
        <tr>
          	<td></td>
          	<td>4. Iklim</td>
          	<td>:</td>
          	<td colspan="5"><?=ucwords(strtolower($detail->pengajuan_iklim));?></td>
        </tr>
        <tr>
          	<td></td>
          	<td>5. Luas</td>
          	<td>:</td>
          	<td colspan="2">Luas Desa</td>
          	<td>:</td>
          	<td colspan="2"><?=($detail->pengajuan_luas_sawah+$detail->pengajuan_luas_kering);?> Ha</td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td colspan="2">dengan Perincian</td>
          	<td>:</td>
          	<td>- Tanah Sawah</td>
          	<td>: <?=number_format($detail->pengajuan_luas_sawah,3,'.',',');?> Ha</td>
        </tr>
        <tr>
          	<td></td>
          	<td></td>
          	<td></td>
          	<td colspan="2">&nbsp;</td>
          	<td>&nbsp;</td>
          	<td>- Tanah Kering</td>
          	<td>: <?=number_format($detail->pengajuan_luas_kering,3,'.',',');?> Ha</td>
        </tr>
    </table>
    <br>
    <table width="100%" align="center">
		<tr>
            <td width="3%"><b>II.</b></td>
            <td colspan="7" width="97%"><b>PEMERINTAHAN</b></td>
        </tr>
		<tr>
		  	<td width="3%">&nbsp;</td>
		  	<td width="4%"><b>1.</b></td>
		  	<td colspan="6" width="93%"><b>Wilayah Administrasi</b></td>
      	</tr>
		<tr>
		  	<td width="3%">&nbsp;</td>
		  	<td width="4%">&nbsp;</td>
		  	<td colspan="2" width="15%">a. Jumlah Dusun</td>
		  	<td width="2%">:</td>
		  	<td colspan="3" width="76%"><?=$detail->pengajuan_dusun;?></td>
      	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">b. Jumlah RW</td>
		  	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_rw;?></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">c. Jumlah RT</td>
		  	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_rt;?></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>2.</b></td>
		  	<td colspan="6"><b>Kepegawaian</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		 	<td>&nbsp;</td>
		  	<td colspan="2">Aparat Pemerintah Desa</td>
		  	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_lk_aparat+$detail->pengajuan_pr_aparat;?> Orang</td>
      	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Laki-Laki</td>
		  	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_lk_aparat;?> Orang</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Perempuan</td>
		 	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_pr_aparat;?> Orang</td>
	 	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>3.</b></td>
		  	<td colspan="6"><b>Pemilu</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">a. Jumlah TPS</td>
		  	<td>:</td>
		  	<td colspan="3"><?=$detail->pengajuan_tps;?> Buah</td>
      	</tr>
      	<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">b. Jumlah Pemilih</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_pemilih_lk+$detail->pengajuan_pemilih_pr,0,'',',');?> Orang</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Laki-Laki</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_pemilih_lk,0,'',',');?> Orang</td>
	  	</tr>
	  	<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Perempuan</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_pemilih_pr,0,'',',');?> Orang</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>4.</b></td>
		  	<td colspan="6"><b>Catatan Sipil</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">a. Pernikahan</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_nikah,0,'',',');?></td>
      	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td width="14%">b. Perceraian</td>
		  	<td width="17%">- Cerai Talak</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_cerai_talak,0,'',',');?></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td>- Cerai Gugat</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_cerai_gugat,0,'',',');?></td>
	  	</tr>
		<tr>
		  	<td width="3%"><b>III.</b></td>
		  	<td colspan="7" width="97%"><b>PENDUDUK DAN TENAGA KERJA</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>1.</b></td>
		  	<td colspan="6"><b>Kependudukan / Populasi</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">Jumlah Penduduk Desa</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format(($detail->pengajuan_lk_warga+$detail->pengajuan_pr_warga),0,'',',');?> Jiwa</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Laki-Laki</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_lk_warga,0,'',',');?> Jiwa</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- Perempuan</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_pr_warga,0,'',',');?> Jiwa</td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>2.</b></td>
		  	<td colspan="6"><b>Keluarga Berencana</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">Jumlah peserta KB Aktif</td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($detail->pengajuan_kb,0,'',',');?> Orang</td>
      	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td><b>3.</b></td>
		  	<td colspan="6"><b>Tenaga Kerja</b></td>
	  	</tr>
		<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="6">Penduduk usia 15 tahun ke atas menurut mata pencaharian</td>
	  	</tr>
		<?php foreach($listTenagaKerja as $r) { ?>
	  	<tr>
		  	<td>&nbsp;</td>
		  	<td>&nbsp;</td>
		  	<td colspan="2">- <?=ucwords(strtolower($r->tenaga_kerja_nama));?></td>
		  	<td>:</td>
		  	<td colspan="3"><?=number_format($r->pengajuan_tenaga_kerja_jumlah,0,'',',');?> Orang</td>
      	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	    	<td width="3%"><b>IV.</b></td>
	    	<td colspan="5" width="97%"><b>SOSIAL BUDAYA</b></td>
      	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>1.</b></td>
	  		<td colspan="4" width="93%"><b>Pendidikan</b></td>
	  	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	 		<td width="4%">&nbsp;</td>
	  		<td width="33%" align="center" style="border:0.5px solid black;">Jenis Pendidikan</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Jumlah Sarana</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Jumlah Siswa</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Jumlah Guru</td>
	  	</tr>
		<?php foreach($listPendidikan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td style="border:0.5px solid black;">- <?=$r->pendidikan_nama;?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_pendidikan_sarana,0,'',',');?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_pendidikan_siswa,0,'',',');?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_pendidikan_guru,0,'',',');?></td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>2.</b></td>
	  		<td colspan="4" width="93%"><b>Sarana Hiburan</b></td>
	  	</tr>
		<?php foreach($listHiburan as $r) { ?>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td width="31%">- <?=ucwords(strtolower($r->sarana_hiburan_nama));?></td>
	  		<td width="2%">:</td>
	  		<td colspan="2" width="60%"><?=number_format($r->pengajuan_hiburan_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>3.</b></td>
	  		<td colspan="4"><b>Sarana Olahraga</b></td>
	  	</tr>
		<?php foreach($listOlahraga as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	 		 <td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->sarana_olahraga_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_olahraga_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>4.</b></td>
	  		<td colspan="4"><b>Kesehatan</b></td>
	  	</tr>
		<?php foreach($listKesehatan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->kesehatan_nama));?></td>
	  		<td>:</td>
	 		<td colspan="2"><?=number_format($r->pengajuan_kesehatan_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>5.</b></td>
	  		<td colspan="4"><b>Tempat Ibadah</b></td>
	  	</tr>
		<?php foreach($listIbadah as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->tempat_ibadah_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_ibadah_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	    	<td width="3%"><b>V.</b></td>
	    	<td colspan="5" width="97%"><b>PERTANIAN (Produksi dalam 1 Tahun)</b></td>
      	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>1.</b></td>
	  		<td colspan="4" width="93%"><b>Pertanian Tanaman Pangan</b></td>
	  	</tr>
	  	<tr>
            <td width="100%" colspan="6"></td>
        </tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td align="center" width="33%" style="border:0.5px solid black;">Jenis Tanaman</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Luas Panen</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Luas Produksi</td>
	  		<td width="20%" align="center"></td>
	  	</tr>
		<?php foreach($listPertanian as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td style="border:0.5px solid black;">- <?=ucwords(strtolower($r->pertanian_nama));?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_pertanian_panen,3,'.',',');?> Ha</td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_pertanian_produksi,0,'',',');?> Kuintal</td>
	  		<td></td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>2.</b></td>
	  		<td colspan="4" width="93%"><b>Tanaman Palawija</b></td>
	  	</tr>
		<?php foreach($listPalawija as $r) { ?>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td width="31%">- <?=ucwords(strtolower($r->pengajuan_palawija_nama));?></td>
	  		<td width="2%">:</td>
	  		<td colspan="2" width="60%"><?=number_format($r->pengajuan_palawija_jumlah,0,'',',');?> Kuintal</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>3.</b></td>
	  		<td colspan="4" width="93%"><b>Perkebunan</b></td>
	  	</tr>
		<?php foreach($listPerkebunan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->pengajuan_perkebunan_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_perkebunan_jumlah,0,'',',');?> Kuintal</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>4.</b></td>
	  		<td colspan="4"><b>Peternakan</b></td>
	  	</tr>
		<?php foreach($listPeternakan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->pengajuan_peternakan_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_peternakan_jumlah,0,'',',');?> Ekor</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>5.</b></td>
	  		<td colspan="4"><b>Perikanan</b></td>
	  	</tr>
		<?php foreach($listPerikanan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->pengajuan_perikanan_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_perikanan_jumlah,0,'',',');?> Ekor</td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	    	<td width="3%"><b>VI.</b></td>
	    	<td colspan="5" width="97%"><b>INDUSTRI DAN AIR BERSIH</b></td>
      	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>1.</b></td>
	  		<td colspan="4" width="93%"><b>Perindustrian</b></td>
	  	</tr>
	  	<tr>
            <td width="100%" colspan="6"></td>
        </tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td align="center" width="33%" style="border:0.5px solid black;">Jenis Perusahaan</td>
	  		<td align="center" width="20%" style="border:0.5px solid black;">Jumlah</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Tenaga Kerja</td>
	  		<td width="20%" align="center"></td>
	  	</tr>
		<?php foreach($listIndustri as $r) { ?>
		<tr>
	 		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td style="border:0.5px solid black;">- <?=ucwords(strtolower($r->jenis_perusahaan_nama));?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_industri_jumlah,0,'',',');?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_industri_orang,0,'',',');?> Orang</td>
	  		<td></td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>2.</b></td>
	  		<td colspan="4" width="93%"><b>Air Bersih</b></td>
	  	</tr>
		<?php foreach($listAir as $r) { ?>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td width="31%">- <?=$r->pengajuan_air_nama;?></td>
	  		<td width="2%">:</td>
	  		<td colspan="2" width="60%"><?=number_format($r->pengajuan_air_jumlah,0,'',',');?> Orang</td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	    	<td width="3%"><b>VII.</b></td>
	    	<td colspan="5" width="97%"><b>PERHUBUNGAN DAN PERDAGANGAN</b></td>
      	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>1.</b></td>
	  		<td colspan="4" width="93%"><b>Jalan</b></td>
	  	</tr>
	  	<tr>
	    	<td colspan="6"></td>
      	</tr>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td align="center" width="33%" style="border:0.5px solid black;">Nama Ruas Jalan</td>
	  		<td align="center" width="20%" style="border:0.5px solid black;">Panjang</td>
	  		<td width="20%" align="center" style="border:0.5px solid black;">Lebar</td>
	  		<td width="20%" align="center"></td>
	  	</tr>
		<?php foreach($listJalan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td style="border:0.5px solid black;">- <?=ucwords(strtolower($r->pengajuan_jalan_nama));?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_jalan_panjang,0,'',',');?></td>
	  		<td align="center" style="border:0.5px solid black;"><?=number_format($r->pengajuan_jalan_lebar,0,'',',');?> Orang</td>
	  		<td></td>
	  	</tr>
		<?php } ?>
	</table>
	<table width="100%" align="center">
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%"><b>2.</b></td>
	  		<td colspan="4" width="93%"><b>Angkutan Darat : Kendaraan Tidak Bermotor</b></td>
	  		</tr>
		<?php foreach($listAngkutan as $r) { ?>
		<tr>
	  		<td width="3%">&nbsp;</td>
	  		<td width="4%">&nbsp;</td>
	  		<td width="31%">- <?=ucwords(strtolower($r->angkutan_darat_nama));?></td>
	  		<td width="2%">:</td>
	  		<td colspan="2" width="60%"><?=number_format($r->pengajuan_angkutan_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	 		<td><b>3.</b></td>
	  		<td colspan="4"><b>POS dan Telekomunikasi</b></td>
	  	</tr>
		<?php foreach($listKomunikasi as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->telekomunikasi_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_telekomunikasi_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td><b>4.</b></td>
	  		<td colspan="4"><b>Perdagangan</b></td>
	 	</tr>
		<?php foreach($listPerdagangan as $r) { ?>
		<tr>
	  		<td>&nbsp;</td>
	  		<td>&nbsp;</td>
	  		<td>- <?=ucwords(strtolower($r->perdagangan_nama));?></td>
	  		<td>:</td>
	  		<td colspan="2"><?=number_format($r->pengajuan_perdagangan_jumlah,0,'',',');?> Unit</td>
	  	</tr>
		<?php } ?>
	</table>
</div>
</body>