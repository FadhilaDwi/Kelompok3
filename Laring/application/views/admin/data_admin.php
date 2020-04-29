<div class="container-fluid">

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_admin"> <i class="fas fa-plus fa-sm"></i> Tambah Data Admin</button>

    <table class="table table-bordered">

        <tr>
            <th>Nomor</th>
            <th>Username</th>
            <th>Nama Admin</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Foto</th>
            <th colspan="3">Aksi</th>
        </tr>

        <?php 
            $no=1;
            foreach($admin as $adm) :?>

        <tr>
            <td> <?php echo $no++  ?> </td>


            <td> <?php echo $adm->username ?> </td>
            <td> <?php echo $adm->nama_admin ?> </td>
            <td> <?php echo $adm->alamat?> </td>
            <td> <?php echo $adm->no_telepon ?> </td>
           <td>
                <img src="<?php echo base_url(); ?>uploads/<?php echo $adm->foto; ?>" width="90" height="100">
            </td>
            

            <td><?php echo anchor ('admin/data_admin/edit/' .$adm->id_admin, '<div class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </div>') ?></td>

            <td><?php echo anchor ('admin/data_admin/hapus/' .$adm->id_admin, '<div class="btn btn-danger  btn-sm"> <i class="fas fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="tambah_admin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <p class="text-danger">FORM INPUT DATA Admin</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_admin/tambah_aksi' ?>" method="post" enctype="multipart/form-data" >
            
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nama Admin</label>
                    <input type="text" name="nama_admin" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>

                <div class="form-group">
                    <label>Foto</label><br>
                    <input type="file" name="foto" class="form-control">
                </div>

                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
      
    </div>
  </div>
</div>