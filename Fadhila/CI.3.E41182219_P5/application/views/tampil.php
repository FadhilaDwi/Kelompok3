<!DOCTYPE html>
<html>
<head> 
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>

	
</head>
</head>
<body> 

<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
<center><?php echo anchor('admin/tambah','Tambah Data'); ?></center>

	<table style="margin:20px auto;" border="1" >
		<tr>
            <th>no</th>
			<th> id pendaftaran</th>
			<th>id admin</th>
            <th>nama pendaftar</th>
            <th>jenis kelamin</th>
            <th>kasus</th>
            <th>jadwal sidang</th>
            <th>Action</th>
			
		</tr>
		<?php 
		$no = 1; /* pada v_tampil merupakan kumpulan perintah untuk menampilkan hasil dari m_data dan controller */
		foreach($pendaftaran as $u){ 
		?> 
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->idpendaftaran ?></td>
            <td><?php echo $u->idadmin ?></td>
			<td><?php echo $u->nama_pen ?></td>
			<td><?php echo $u->jk ?></td>
			<td><?php echo $u->kasus ?></td>
            <td><?php echo $u->sidang ?></td>
			<td>
			      <?php echo anchor('admin/edit/'.$u->idpendaftaran,'Edit'); ?>
                              <?php echo anchor('admin/hapus/'.$u->idpendaftaran,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>

<style type="text/css">
    .sui-button-cell
    {
        text-align: center;
    }

    .sui-checkbox
    {
        font-size: 17px !important;
        padding-bottom: 4px !important;
    }

    .deleteButton img
    {
        margin-right: 3px;
        vertical-align: bottom;
    }

    .bigicon
    {
        color: #5CB85C;
        font-size: 20px;
    }
</style>

<!-- Editable Table - END -->

</div>

	
</body>
</html>