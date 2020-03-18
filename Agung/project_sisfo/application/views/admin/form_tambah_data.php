   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">List of Tutor</h1>


       
       <div class="card">
           <div class="card-body">
               <form method="post" action="<?= base_url('admin/add') ?> ">

                   <div class="row">
                       <div clas="col-md-6">
                           <div clas="form-group">
                               <label>Name</label>
                               <input type="text" name="name" class="form-control">
                           </div>
                           <div clas="form-group">
                               <label>Address</label>
                               <input type="text" name="address" class="form-control">
                           </div>
                           <div clas="form-group">
                               <label>Email</label>
                               <input type="text" name="email" class="form-control">
                           </div>
                           <div clas="form-group">
                               <label>Birthplace</label>
                               <input type="text" name="birthplace" class="form-control">
                           </div>
                           <div clas="form-group">
                               <label>Date of Birth</label>
                               <input type="date" name="tanggal" class="form-control">
                           </div>
                           <button type="submit" class="btn btn-primary mt-4">Save</button>
                           </form>
                           <a  href="<?= base_url('admin/tutor')?>" class="btn btn-danger mt-4">Back</a> 
                       </div>
                   </div>
               
           </div>

       </div>
       

   </div>
   <!-- halaman ini digunakan untuk menampilkan view form tambah data -->