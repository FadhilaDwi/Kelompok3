   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">List of Tutor</h1>



       <div class="card">
           <div class="card-body">
               <form method="post" action=" ">

                   <div class="row">
                       <div clas="col-md-6">
                           <input type="hidden" name="id" value="<?= $pengajar['id']; ?>">
                           <div clas="form-group">
                               <label>Name</label>
                               <input type="text" name="name" class="form-control" value="<?= $pengajar['nama']; ?>">
                           </div>
                           <div clas="form-group">
                               <label>Address</label>
                               <input type="text" name="address" class="form-control" value="<?= $pengajar['alamat']; ?>">
                           </div>
                           <div clas="form-group">
                               <label>Email</label>
                               <input type="text" name="email" class="form-control" value="<?= $pengajar['email']; ?>">
                           </div>
                           <div clas="form-group">
                               <label>Birthplace</label>
                               <input type="text" name="birthplace" class="form-control" value="<?= $pengajar['tempat_lahir']; ?>">
                           </div>
                           <div clas="form-group">
                               <label>Date of Birth</label>
                               <input type="date" name="tanggal" class="form-control" value="<?= $pengajar['tanggal_lahir']; ?>">
                           </div>
                           <button type="submit" class="btn btn-primary mt-4">Change</button>
                           <a href="<?= base_url('admin/tutor') ?>" class="btn btn-danger mt-4">Back</a>
                       </div>
                   </div>
               </form>
           </div>

       </div>


   </div>
   <!-- halaman ini digunakan untuk menampilkan view form ubah data -->