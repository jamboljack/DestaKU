<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?=base_url('img/logo-icon.png');?>">
<title>Potensi Wisata</title>
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
    <h1 align="center">POTENSI WISATA YANG DIKEMBANGKAN</h1>
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
    <p><b>I. WISATA ALAM</b></p>
    <table width="100%" align="center" border="1">
        <tr>
            <th width="5%" align="center">NO</th>
            <th width="60%" align="center">DAYA TARIK WISATA</th>
            <th width="35%" align="center">TEMA</th>
        </tr>
        <?php 
        $no = 1;
        foreach($listWisataAlam as $r) { 
            $pengajuan_wisata_alam_id = $r->pengajuan_wisata_alam_id;
            $listFoto                 = $this->db->get_where('destaku_pengajuan_wisata_alam_foto', array('pengajuan_wisata_alam_id' => $pengajuan_wisata_alam_id))->result();
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=$r->pengajuan_wisata_alam_nama;?></td>
            <td><?=$r->pengajuan_wisata_alam_tema;?></td>
        </tr>
        <?php if (count($listFoto) > 0) { ?>
        <tr>
            <td colspan="3" valign="top" align="center">
                <?php 
                foreach($listFoto as $f) { 
                    echo '<img src=' . base_url('img/potensi_folder/' . $f->pengajuan_wisata_alam_foto_file) . ' width="30%">';
                }
                ?>
            </td>
        </tr>
        <?php } ?>
        <?php 
            $no++;
        } 
        ?>
    </table>
    <p><b>II. WISATA BUDAYA</b></p>
    <table width="100%" align="center" border="1">
        <tr>
            <th width="5%" align="center">NO</th>
            <th width="60%" align="center">DAYA TARIK WISATA</th>
            <th width="35%" align="center">TEMA</th>
        </tr>
        <?php 
        $no = 1;
        foreach($listWisataBudaya as $r) { 
            $pengajuan_wisata_budaya_id = $r->pengajuan_wisata_budaya_id;
            $listFoto                 = $this->db->get_where('destaku_pengajuan_wisata_budaya_foto', array('pengajuan_wisata_budaya_id' => $pengajuan_wisata_budaya_id))->result();
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=$r->pengajuan_wisata_budaya_nama;?></td>
            <td><?=$r->pengajuan_wisata_budaya_tema;?></td>
        </tr>
        <?php if (count($listFoto) > 0) { ?>
        <tr>
            <td colspan="3" valign="top" align="center">
                <?php 
                foreach($listFoto as $f) { 
                    echo '<img src=' . base_url('img/potensi_folder/' . $f->pengajuan_wisata_budaya_foto_file) . ' width="30%">';
                }
                ?>
            </td>
        </tr>
        <?php } ?>
        <?php 
            $no++;
        } 
        ?>
    </table>
    <p><b>III. WISATA BUATAN</b></p>
    <table width="100%" align="center" border="1">
        <tr>
            <th width="5%" align="center">NO</th>
            <th width="60%" align="center">DAYA TARIK WISATA</th>
            <th width="35%" align="center">TEMA</th>
        </tr>
        <?php 
        $no = 1;
        foreach($listWisataBuatan as $r) { 
            $pengajuan_wisata_buatan_id = $r->pengajuan_wisata_buatan_id;
            $listFoto                 = $this->db->get_where('destaku_pengajuan_wisata_buatan_foto', array('pengajuan_wisata_buatan_id' => $pengajuan_wisata_buatan_id))->result();
        ?>
        <tr>
            <td align="center"><?=$no;?></td>
            <td><?=$r->pengajuan_wisata_buatan_nama;?></td>
            <td><?=$r->pengajuan_wisata_buatan_tema;?></td>
        </tr>
        <?php if (count($listFoto) > 0) { ?>
        <tr>
            <td colspan="3" valign="top" align="center">
                <?php 
                foreach($listFoto as $f) { 
                    echo '<img src=' . base_url('img/potensi_folder/' . $f->pengajuan_wisata_buatan_foto_file) . ' width="30%">';
                }
                ?>
            </td>
        </tr>
        <?php } ?>
        <?php 
            $no++;
        } 
        ?>
    </table>
</div>
</body>
</html>