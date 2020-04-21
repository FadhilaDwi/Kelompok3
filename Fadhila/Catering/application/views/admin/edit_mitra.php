
<div class="container-fluid">

    <h3><i class="fas fa-edit"></i>EDIT DATA MITRA</h3>
    <?php foreach($mitra as $u){ ?>
        <form method="post" action="<?php echo base_url(). 'admin/update'; ?>">
        
            <div class="for-group">
                <label>Id Mitra</label>
                    <input type="text" class="form-control" id="idmitra" name="id_mitra"value = "<?php echo $u->id_mitra ?>"  readonly>
            </div>

            <div class="for-group">
                <label>Nama Pemilik</label>
                <input type="text" name="nama_pemilik" class="form-control" value="<?php echo $u->nama_pemilik ?>">
            </div>

            <div class="for-group">
            <label>Nama Usaha</label>
                    <input type="text" name="nama_katering" class="form-control" value="<?php echo $u->nama_katering ?>">
                </div>

            <div class="for-group">
                 <label>Alamat Usaha</label>
                    <input type="text" name="alamat" class="form-control" value = "<?php echo $u->alamat ?>">
            </div>

            <div class="for-group">
                <label>Email </label>
                    <input type="text" name="email" class="form-control" value = "<?php echo $u->email?>">
            </div>

            <div class="for-group">
                <label>No. Telp </label>
                    <input type="text" name="no_telepon" class="form-control" value = "<?php echo $u->no_telepon?>">
            </div>

            <div class="for-group">
                <label>Foto Lokasi</label><br>
                    <input type="file" name="foto_lokasi" class="form-control" value = "<?php echo $u->foto_lokasi?>">
            </div>

            <div class="for-group">
                <label>Username</label><br>
                    <input type="text" name="username" class="form-control" value="<?php echo $u->username ?>">
            </div>

            <div class="for-group">
                <label>Password</label><br>
                    <input type="password" name="password" class="form-control" value = "<?php echo $u->password?>">
            </div>

            
            <button type="submit" class="btn btn-primary btn-sm mt-3"> SIMPAN </button>
        
        </form>

        <?php } ?>
</div>
