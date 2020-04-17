<!-- form untuk menampilkan data dari database -->
<!DOCTYPE html>
<html>
<head> 
	<title>Data Perkara</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body> 

<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data Kasus</h2>
            <h2 style = "text-align : right">Hai, <?php echo $this->session->userdata("nama"); ?></h2>
            <a href="<?php echo base_url('admin/logout'); ?>">Logout</a>
            <h4 style="text-align: left"> <?php echo anchor('admin/tambah','Tambah Data'); ?></h4>
            
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%" >
              <thead>
                <tr>
                    <th>No</th>
			        <th>Id pendaftaran</th>
			        <th>Id admin</th>
                    <th>Terdakwa</th>
                    
                    <th >Kasus</th>
                    <th>Jadwal Sidang</th>
                    <th>Action</th>               
                </tr>
              </thead>
              <tbody>
                    <?php 
                        $no = 1;
                        
                    ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
			                <td></td>
			                
			                <td ></td>
                            <td format ="dd-mm-yyyy" ></td>
                            <td style="text-align: center;">
                                 <?php echo anchor('admin/edit/','Edit'); ?>
                                 <?php echo anchor('admin/hapus/','Hapus'); ?>
                            </td>
                        </tr>
                    

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