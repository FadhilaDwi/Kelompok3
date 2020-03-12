<!DOCTYPE html>
<html>
<head> 
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

</head>
</head>
<body> 
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data Kasus</h2>
            <center><?php echo anchor('admin/tambah','Tambah Data'); ?></center>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" >
              <thead>
                <tr>
                    <th>no</th>
			        <th> id pendaftaran</th>
			        <th>id admin</th>
                    <th>nama pendaftar</th>
                    <th>jenis kelamin</th>
                    <th width = "100px">kasus</th>
                    <th>jadwal sidang</th>
                    <th>Action</th>               
                </tr>
              </thead>
              <tbody>
                    <?php 
                        $no = 1;
                        foreach($pendaftaran as $u){
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $u->idpendaftaran ?></td>
                            <td><?php echo $u->idadmin ?></td>
			                <td><?php echo $u->nama_pen ?></td>
			                <td><?php echo $u->jk ?></td>
			                <td ><?php echo $u->kasus ?></td>
                            <td format ="dd-mm-yyyy" ><?php echo $u->sidang ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-primary" onclick="edit_book(<?php echo $u->idpendaftaran;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="delete_book(<?php echo $u->idpendaftaran;?>)"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                    <?php }?>

              </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>

	
</body>
</html>