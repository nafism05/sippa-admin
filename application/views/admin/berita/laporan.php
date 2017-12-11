<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Laporan Berita User</title>
</head>
<body>

	<h1 align="center">Laporan Berita User</h1>

	<table border="1" cellpadding="10" align="center">
		<tr>
			<th>Judul</th>
			<th>Publisher</th>
			<th>Kategori</th>
			<th>Tanggal Publish</th>
		</tr>
		<?php foreach($konten as $row): ?>
			<tr>
				<td><?=$row->judul;?></td>
				<td><?=$row->user;?></td>
				<td><?=$row->kategori;?></td>
				<td><?=$row->published_at;?></td>
			</tr>
		<?php endforeach;?>
	</table>
	
</body>
</html>