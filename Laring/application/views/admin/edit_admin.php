<div class="container-fluid">

    <h3><i class="fas fa-edit"></i>EDIT DATA ADMIN</h3>

    <?php foreach($admin as $adm) : ?>

        <form method="post" action="<?php echo base_url().'admin/data_admin/update' ?>">

            <div class="for-group">
                <label>Foto</label>
                <img src="<?php echo base_url(); ?>uploads/<?php echo $adm->foto; ?>" width="90" height="100">
                <input type="file" name="foto" class="form-control">
            </div>

            <div class="for-group">
                <label>User Name</label>
                <input type="text" name="username" class="form-control" value="<?php echo $adm->username ?>">
            </div>

            <div class="for-group">
                <label>Nama Admin</label>
                <input type="text" name="nama_admin" class="form-control" value="<?php echo $adm->nama_admin ?>">
            </div>

            <div class="for-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $adm->alamat ?>">
            </div>

            <div class="for-group">
                <label>Nomer Telepon</label>
                <input type="hidden" name="id_admin" class="form-control" value="<?php echo $adm->id_admin ?>">
                <input type="text" name="no_telepon" class="form-control" value="<?php echo $adm->no_telepon ?>">
            </div>

             <div class="for-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $adm->password ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3"> SIMPAN </button>
        
        </form>

    <?php endforeach; ?>
</div>
