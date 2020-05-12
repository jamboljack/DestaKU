<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Hasil Penilaian</title>
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
            font-size: 11px;
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
    <h1 align="center">PENILAIAN DAN PEMBOBOTAN KRITERIA DESA WISATA</h1>
    <table width="100%" align="center">
        <tr>
            <td width="20%">Nama Desa Wisata</td>
            <td width="2%">:</td>
            <td width="78%"><?=$detail->nama_kel;?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_alamat_desa;?></td>
        </tr>
        <tr>
            <td>Nama Pengelola</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_nama_lembaga;?></td>
        </tr>
        <tr>
            <td>Alamat Sekretariat Pengelola</td>
            <td>:</td>
            <td><?=$detailwisatawan->pengajuan_wisatawan_alamat;?></td>
        </tr>
    </table>
    <p><b>Hasil Pembobotan Penilaian</b></p>
    <table width="100%" align="center" border="1">
        <tr>
            <td width="5%" align="center"><b>NO</b></td>
            <td width="85%" align="center"><b>INDIKATOR</b></td>
            <td width="10%" align="center"><b>SKOR</b></td>
        </tr>
        <?php 
        $total = 0;
        foreach($listIndikatorNilai as $r) {
            $pengajuan_nilai_id = $r->pengajuan_nilai_id;
            $listSub = $this->db->order_by('indikator_detail_nama', 'asc')->get_where('v_indikator_penilaian_detail', array('pengajuan_nilai_id' => $pengajuan_nilai_id))->result() 
        ?>
        <tr>
            <td colspan="3"><b><?=ucwords(strtolower($r->indikator_nama));?></b></td>
        </tr>
        <?php
        $no = 1;
        foreach($listSub as $s) {
            $pengajuan_nilai_detail_id = $s->pengajuan_nilai_detail_id;
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=ucwords(strtolower($s->indikator_detail_nama));?></td>
            <td align="center"><?=number_format($s->pengajuan_nilai_detail_skor,0,'',',');?></td>
        </tr>
        <?php
            $total = ($total+$s->pengajuan_nilai_detail_skor);
            $no++;
            }
        } 
        ?>
        <tr>
            <td colspan="2" align="center"><b>JUMLAH TOTAL</b></td>
            <td align="center"><b><?=number_format($total,0,'',',');?></b></td>
        </tr>
    </table>
    <p>
        <b>Nilai Desa Wisata = <?=number_format($total,0,'',',');?></b><br>Klasifikasi Desa Wisata berdasarkan nilai desa wisata<br>
        <?php foreach($listBobot as $b) { ?>
        <b>- <?=ucwords(strtolower($b->bobot_nama));?> dengan Nilai <?=number_format($b->bobot_minimal,0,'',',');?>-<?=number_format($b->bobot_maksimal,0,'',',');?></b><br>
        <?php } ?>
    </p>
    <table width="100%" align="center">
        <tr>
            <td colspan="2" width="100%" align="center">Kudus, <?=date('d-m-Y');?></td>
        </tr>
        <tr>
            <td width="50%" align="center">Ketua<br><?=$petugas->petugas_jabatan_ketua;?><br><br><br><br><b><?=$petugas->petugas_nama_ketua;?></b><br><?=($petugas->petugas_nip_ketua!=''?'NIP. '.$petugas->petugas_nip_ketua:'');?></td>
            <td width="50%" align="center">Sekretaris<br><?=$petugas->petugas_jabatan_sekretaris;?><br><br><br><br><b><?=$petugas->petugas_nama_sekretaris;?></b><br><?=($petugas->petugas_nip_sekretaris!=''?'NIP. '.$petugas->petugas_nip_sekretaris:'');?></td>
        </tr>
        <tr>
            <td align="center">Anggota 1<br><?=$petugas->petugas_jabatan_anggota_1;?><br><br><br><br><b><?=$petugas->petugas_nama_anggota_1;?></b><br><?=($petugas->petugas_nip_anggota_1!=''?'NIP. '.$petugas->petugas_nip_anggota_1:'');?></td>
            <td align="center">Anggota 2<br><?=$petugas->petugas_jabatan_anggota_2;?><br><br><br><br><b><?=$petugas->petugas_nama_anggota_2;?></b><br><?=($petugas->petugas_nip_anggota_2!=''?'NIP. '.$petugas->petugas_nip_anggota_2:'');?></td>
        </tr>
        <tr>
            <td colspan="2" width="100%" align="center">Anggota 3<br><?=$petugas->petugas_jabatan_anggota_3;?><br><br><br><br><b><?=$petugas->petugas_nama_anggota_3;?></b><br><?=($petugas->petugas_nip_anggota_3!=''?'NIP. '.$petugas->petugas_nip_anggota_3:'');?></td>
        </tr>
    </table>
</div>
</body>