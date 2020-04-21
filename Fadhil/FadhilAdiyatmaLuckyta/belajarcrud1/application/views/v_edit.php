<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center>
		<h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1>
		<h3>Edit Data</h3>
	</center>
	<!-- Perulangan foreach diatas akan menampilkan semua isi array dengan perintah yang lebih singkat -->
	<?php foreach($user as $u){ ?>
	<form action="<?php echo base_url(). 'crud/update'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama</td>
				<td>
					<!-- pada id type textnya hidden karena id pada database di setting sebagai auto increment,maka dari itu kita tidak menambahkan id, karena id sudah bertambah sesuai dengan urutan data pada database -->
					<input type="hidden" name="id" value="<?php echo $u->id ?>">
					<input type="text" name="nama" value="<?php echo $u->nama ?>">
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $u->alamat ?>"></td>
			</tr>
			<tr>
				<td>Pekerjaan</td>
				<td><input type="text" name="pekerjaan" value="<?php echo $u->pekerjaan ?>"></td>
			</tr>
			<tr>
				<td></td>
				<!-- membuat tombol yang bernama Simpan, berfungsi untuk menyimpan data yang sudah kita isi  -->
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>