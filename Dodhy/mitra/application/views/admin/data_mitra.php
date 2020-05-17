<div class="container-fluid">

    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_mitra"> <i class="fas fa-plus fa-sm"></i> Tambah Data Mitra</button>

    <table class="table table-bordered">

        <tr>
            <th style="text-align : center">No</th>
            <th style="text-align : center">ID Mitra</th>
            <th style="text-align : center">Username</th>
            <th style="text-align : center">Nama Catering</th>
            <th style="text-align : center">Nama Pemilik</th>
            <th style="text-align : center">Foto Lokasi</th>
            <th colspan="3" style="text-align : center"> Aksi</th>
        </tr>

        <?php 
            $no=1;
            foreach($mitra as $b) :?>

        <tr>
            <td> <?php echo $no++  ?> </td>
            <td> <?php echo $b->id_mitra ?> </td>
            <td> <?php echo $b->username ?> </td>
            <td> <?php echo $b->nama_katering ?> </td>
            <td> <?php echo $b->nama_pemilik ?> </td>
            <td> <?php echo $b->foto_lokasi ?> </td>


           

            <td ><?php echo anchor ('admin/data_mitra/edit/'.$b->id_mitra , '<div class="btn btn-primary btn-sm" > <i class="fas fa-edit"   ></i> </div>') ?></td>
            
            <td><?php echo anchor ('admin/data_mitra/hapus/' .$b->id_mitra, '<div class="btn btn-danger  btn-sm"> <i class="fas fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>


<!-- Modal -->
<div class="modal fade" id="tambah_mitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5> -->
        <p class="text-danger" >Data Mitra</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'admin/data_mitra/tambah_aksi' ?>" method="post" enctype="multipart/form-data" >
       
                <div class="form-group">
                    <label>Id Mitra</label>
                    <input type="text" class="form-control" id="idmitra" name="id_mitra" value="<?= $kodeunik; ?>"  readonly>
                </div>
                <div class="form-group">
                    <label>Nama Usaha</label>
                    <input type="text" name="nama_katering" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat Usaha</label>
                    <input type="text" name="alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email </label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>No. Telp </label>
                    <input type="text" name="no_telepon" class="form-control">
                </div>

                <div class="form-group">
                    <label>Foto Lokasi</label><br>
                    <input type="file" name="foto_lokasi" class="form-control">
                </div>

                  
                <div class="form-group">
                    <label>Username</label><br>
                    <input type="text" name="username" class="form-control">
                </div> 

                <div class="form-group">
                    <label>Password</label><br>
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



      