
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-15">
<style>
html {
  /*font-family: sans-serif;*/
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
body { 
	margin: 0 20px;
  font-size: 0.75em;
} 
table {
    margin-top: 1em;
}
/*
 * Table styles
 */
table.dataTable {
  width: 100%;
  margin: 0 auto;
  clear: both;
  border-collapse: separate;
  border-spacing: 0;

}
table.dataTable thead th,
table.dataTable tfoot th {
  font-weight: bold;
}
table.dataTable thead th,
table.dataTable thead td {
  padding: 2px 3px;
  border-bottom: 0.5px solid #111111;
}
table.dataTable thead th:active,
table.dataTable thead td:active {
  outline: none;
}
table.dataTable tfoot th,
table.dataTable tfoot td {
  padding: 10px 18px 6px 18px;
  border-top: 1px solid #111111;
}

table.collapse {
  border-collapse: collapse;
  border: 0.5px solid #111111;
}
table.header {
	width=100%;
	border-collapse: collapse;
	border-bottom: 2px solid #111111;
}

table.collapse td {
  border: 0.5px solid #111111;
}


@page { margin: 5px 10px; }
    #header { 
	position: fixed; 
	left: 0px; 
	top: -10px; 
	right: 0px; 
	height: 22px; 
	text-align: right; 
	}
    #footer { 
		position: fixed; 
		left: 0px; 
		/*bottom: -5px; */
		bottom: 2px; 
		right: 0px; 
		height: 20px;  
	}
    #footer .page:after { 
		/*content: counter(page, upper-roman); */
	}
	u {
    text-decoration: underline;
	}
</style>
</head>
<body>
<?php  
	//$status = $this->employment_model->get_emp_status($salary_data['id']);
	$kasbon = $this->salary_model->get_kasbon_by_emp($salary_data['emp_id']); // cek kasbon
	
	$tgl = $salary_data['date_salary'];	
	$bulan = date("F",strtotime($tgl)).' '.date("o",strtotime($tgl))."\n";
	//$ptkp = 3000000;
	$ptkp = 4500000;
	$kena_pajak=0;
	$pot80 = 0;
	$pph21 = 0;
	$biaya_jabatan = 0;
	$pinjaman = 0;
	$angsuran = 0;
	$sisa_pinjaman = 0;
	// cek jika punya kasbon dan pengajuan belum disetujui
	if ($salary_data['angsuran'] && $this->salary_model->cek_submission_approval($salary_data['submission_id'])){
		// karena masih pengajuan gunakan pernghitungan sementara
		$pinjaman = $kasbon['pinjaman'];
		$angsuran = $salary_data['angsuran'];
		$sisa_pinjaman = (float)$kasbon['sisa']-(float)$angsuran;
		if($angsuran == $kasbon['sisa']){
			//$angsuran = $kasbon['sisa']; 
			//$sisa_pinjaman = 0;
		}else {
			//$sisa_pinjaman = (float)$kasbon['sisa']-(float)$angsuran;
		}
	}else {
		// jika telah disetujui pengajuannya maka, ambil dari database (tanpa perhitungan)
		$pinjaman = $kasbon['pinjaman'];
		$angsuran = $salary_data['angsuran'];
		$sisa_pinjaman = $kasbon['sisa'];
	}	
	//echo 'approva '.$this->salary_model->cek_submission_approval($salary_data['submission_id']);
	$gajipokok = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],1);
	$tprofesi = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],2);
	$kelebihangm = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],8);
	$tstruktur = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],3);
	$tfungsional = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],4);
	$ttransportasi = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],10);
	$ketenagakerjaan = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],5);
	$kesehatan = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],6);
	$makan = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],7);
	$tberas = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],16);	
	$sertifikasi = $this->salary_model->get_salary_submission_by_id($salary_data['submission_id'],$salary_data['rec_id'],17);		
	$keseluruhan = (float)$gajipokok + (float)$tprofesi + (float)$tstruktur + (float)$tfungsional + (float)$ketenagakerjaan+(float)$kesehatan+ + (float)$tberas + (float)$sertifikasi ;
	$tidak_diuangkan = (float)$ketenagakerjaan+(float)$kesehatan+(float)$tberas;
	//$keseluruhan = (float)$gajipokok + (float)$tprofesi + (float)$kelebihangm + (float)$tstruktur + (float)$tfungsional + (float)$ttransportasi+ (float)$ketenagakerjaan+(float)$kesehatan+(float)$makan;
	//$tidak_diuangkan = (float)$ketenagakerjaan+(float)$kesehatan+(float)$makan;
	$diuangkan = (float)$keseluruhan - (float)$tidak_diuangkan;
	$jml_penerimaan = (float)$keseluruhan+(float)$salary_data['gaji_bln4'];
	$jml_potongan = (float)$tidak_diuangkan+(float)$salary_data['pot_training']+(float)$angsuran;
	$gaji_terimakan = (float)$jml_penerimaan - (float)$jml_potongan;
	if ($salary_data['gaji_uang'] >= $ptkp ){
		$kena_pajak= (float)$salary_data['gaji_uang'] - (float)$ptkp;
		// $pph21 = (float)$kena_pajak * 0.05;
		$pph21 = 0;
	}
	if ($salary_data['masa_kerja'] <= 3){
		$pot80 = (float)$salary_data['gaji_uang'] - (float)$salary_data['pot_training'];
	}
	// cek gaji diterimakan
	if ($gaji_terimakan == $salary_data['gaji_terima'] ){
		$gaji_terimakan = $salary_data['gaji_terima'];
	}else {
		$gaji_terimakan = 0; // jika tidak sama tulis nol periksa perhitungan dengan database
	}
	
	//cek gaji diuangkan
	if ($diuangkan == $salary_data['gaji_uang'] ){
		$diuangkan = $salary_data['gaji_uang'];
	}else {
		$diuangkan = 0; // jika tidak sama tulis nol periksa perhitungan dengan database
	}
	
	
	
?>
<div id="header">
    <h5></h5>
  </div>
  <div id="footer">
    <p class="page"><?php echo 'Generate at '. date('d-m-Y'); ?> </p>
  </div>
  
  <div id="content">
	<table class="header" width=100% >
		<tr align="center">
			<td>
				<img src="<?php echo base_url() . 'data/images/tvku.png'; ?>" width="110" height="75">
			</td>
			<td  width=80%>
				<h2>PT. TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTOROaaaaa</h2>
				Ijin Penyelenggaraan Penyiaran No : 115/KEP/M.KOMINFO/03/2010<br/>
				Sekretariat : Gedung E Lt. 2 Kompleks UDINUS Jl. Nakula | No. 5 - 11 Semarang 501313<br/>
				Telp. 024 - 356 8491, Fax. 024-356 4645 | Email : tvku@tvku.tv | Homepage : http://www.tvku.tv<br/>
			</td>
		</tr>
	</table>
	
	<h4>SLIP GAJI PEGAWAI</h4>
	PT. TELEVISI KAMPUS UNIVERSITAS DIAN NUSWANTORO<br/><br/>
	
	<table width=100% >
		<tr>
			<td ></td>
			<td ></td>
			<td collspan="2">Bulan : <?php echo $bulan ?></td>
		</tr>
		<tr >
			<td width=20%>NIK</td>
			<td width=30%>: <?php echo $salary_data['nik'] ?></td>
			<td width=20%>JABATAN</td>
			<td width=30%>: <?php echo $salary_data['jabatan'] ?></td>
		</tr>
		<tr >
			<td width=20%>NAMA</td>
			<td width=30%>: <?php echo $salary_data['emp_name'] ?> </td>
			<td width=20%>STAT. MARITAL</td>
			<td width=30%>:
				<?php if ($salary_data['marital'] == 0)
					echo "Belum Menikah";
					else echo "Menikah";
					?>
			</td>
		</tr>
		<tr >
			<td width=20%>NO. REKENING</td>
			<td width=30%>: <?php echo $salary_data['rekening'] ?></td>
			<td width=20%></td>
			<td width=30%></td>
		</tr>
	</table>
	
	<table width=100% >
		<tr>
			<!--
			<th width=18%>PENERIMAAN</th>
			<th width=13%>JUMLAH</th>
			<th width=17%>POTONGAN</th>
			<th width=13%>JUMLAH</th>
			<th width=17%>POTONGAN PAJAK</th>
			<th ></th>
			<th ></th>
			-->
			<th width=26% align="left">PENERIMAAN</th>
			<th width=13%>JUMLAH</th>
			<th width=9%></th>
			<th width=5%></th>
			<th width=25% align="left">POTONGAN PAJAK</th>
			<th ></th>
			<th ></th>
		</tr>
		<tr>
			<td>Gaji Pokok</td>
			<td>Rp. <?php echo number_format( $gajipokok , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td>Potongan Tunjangan</td>
			<td>Rp. <?php echo number_format($tidak_diuangkan , 0 , '' , '.' ) ?>,-</td>
			-->
			<td></td>
			<td></td>
			<td>PENDAPATAN</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Tunj. Profesi</td>
			<td>Rp. <?php echo number_format( $tprofesi , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td>Pot. 20% bln <?php echo $salary_data['masa_kerja'] ?></td>
			<td>Rp. <?php echo number_format( $salary_data['pot_training'] , 0 , '' , '.' ) ?>,-</td>
			-->
			<td></td>
			<td></td>
			<td>Gaji diuangkan</td>
			<td>Rp. <?php echo number_format($diuangkan , 0 , '' , '.' ) ?>,-</td>
			<td></td>
		</tr>
		<tr>
			<td>Tunj. Struktural</td>
			<td>Rp. <?php echo number_format( $tstruktur , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td>Pot. Kasbon</td>
			<td>Rp. <?php echo number_format($angsuran , 0 , '' , '.' ) ?>,-</td>
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Tunj. Ketenagakerjaan*</td>
			<td>Rp. <?php echo number_format( $ketenagakerjaan , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td>POTONGAN</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Tunj. Kesehatan*</td>
			<td>Rp. <?php echo number_format( $kesehatan , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td>Biaya Jabatan</td>
			<td>Rp. <?php echo number_format( $biaya_jabatan , 0 , '' , '.' ) ?>,-</td>
			<td></td>
		</tr>
		<tr>
			<td>Tunj. Beras*</td>
			<td>Rp. <?php echo number_format( $tberas , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Sertifikasi</td>
			<td>Rp. <?php echo number_format( $sertifikasi , 0 , '' , '.' ) ?>,-</td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td>PTKP</td>
			<td>Rp.  <?php echo number_format( $ptkp , 0 , '' , '.' ) ?>,-</td>
			<td></td>
		</tr>
		<tr>
			<!--
			<td>Gaji Bln. Ke 4</td>
			<td>Rp. <?php echo number_format( $salary_data['gaji_bln4'] , 0 , '' , '.' ) ?>,-</td>
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>Kasbon</td>
			<td>Rp. <?php echo number_format( $pinjaman , 0 , '' , '.' ) ?>,-</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td>Sisa Kasbon</td>
			<td>Rp. <?php echo number_format( $sisa_pinjaman , 0 , '' , '.' ) ?>,-</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<!--
			<td></td>
			<td></td> 
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td>KENA PAJAK</td>
			<td></td>
			<td>Rp. <?php echo number_format($kena_pajak , 0 , '' , '.' ) ?>,-</td>
		</tr>
		<tr>
			<td>Jml. Penerimaan</td>
			<td>Rp. <?php echo number_format( $jml_penerimaan, 0 , '' , '.' ) ?>,-</td>
			<!--
			<td>Jml. Potongan</td>
			<td>Rp. <?php echo number_format( $jml_potongan , 0 , '' , '.' ) ?>,-</td>
			-->
			<td></td>
			<td></td>
			<td>PPH 21 **</td>
			<td></td>
			<td>Rp. <?php echo number_format( $pph21 , 0 , '' , '.' ) ?>,-</td>
		</tr>
		<tr>
			<td><b>Gaji Diterimakan</b></td>
			<td><b><u>Rp. <?php echo number_format($gaji_terimakan , 0 , '' , '.' ) ?>,-</u></b></td>
			<!--
			<td></td>
			<td></td>
			-->
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table> 
	<br/><br/>
	*) Tunjangan Tidak Dapat Diuangkan<br/>
	**) PPH 21 Dibayarkan perusahaan<br/>
	
	<!-- Tanda tangan -->
	<table width=100%>
	<?php
		$this->load->model('role_model');
		
		$direktur = $this->role_model->get_role_data_by_id(1);
		$pajak = $this->role_model->get_role_data_by_id(2);
		$hrd = $this->role_model->get_role_data_by_id(3);
		
		?>
			<tr>
				<td width=50%></td>
				<td>Semarang, <?php echo date('d-m-Y') ?></td>
			</tr>
			<tr>
				<td>Menenima</td>
				<td>Pemotong Pajak</td>
			</tr>
			<tr>
				<td height=40px></td>
				<td><img width="60px" src="<?php echo base_url() . 'images/ttd_atika1.jpg'; ?>"></td>
				<!--
				<td><img width="120px" src="<?php echo base_url() . 'images/ttd_han.jpg'; ?>"></td>
				-->
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><?php echo $salary_data['emp_name'] ?></td>
				<td><u>Atika Farah Nafila</u></td>
				<!--
				<td><u><?php echo $hrd['name']; ?></u></td>
				-->
			</tr>
			<tr>
				<td></td>
				<td>HRD</td>
				<!--
				<td><?php echo $hrd['role']; ?></td>
				-->
			</tr>
	</table>
	
    <!--<p style="page-break-before: always;"> 
		Keterangan :<br/>
		<p>Potongan 20% 3bln = 20% x Gaji Diuangkan <br/>
		Gaji 4 Bln (Rapel) = Potongan 20% bln 1 + Potongan 20% bln 2 + Potongan 20% bln 3  <br/>
		Kena Pajak = Gaji Diuangkan - PTKP <br/>
		PPH21 = Kena Pajak * 5%<br/>
		Gaji Diterima = Jumlah Penerimaan - Jumlah Potongan - PPH21*<br/>
		<br/>
		<b>* ) Dikurangi PPH21 Jika tidak dibayar oleh perusahaan</b></p>
	</p>-->
  </div>
</body> </html>
