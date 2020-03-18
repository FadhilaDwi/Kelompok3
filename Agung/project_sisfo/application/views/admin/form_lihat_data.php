   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">List of Tutor</h1>



       <div class="card">
           <div class="card-body">

               <form method="">
                   <div class="card">
                       <div class="card-header">
                           Detail of Tutor
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">Name:<?= $pengajar['nama']; ?></h5>
                           <p class="card-text">Address:<?= $pengajar['alamat']; ?></p>
                           <p class="card-text">Email:<?= $pengajar['email']; ?></p>
                           <p class="card-text">Birthplace:<?= $pengajar['tempat_lahir']; ?></p>
                           <p class="card-text">Date of Birth:<?= $pengajar['tanggal_lahir']; ?></p>
                           <a href="<?= base_url('admin/tutor') ?>" class="btn btn-primary">Back</a>
                       </div>
                   </div>


           </div>

       </div>


       <tr>





           </form>

   </div>

   </div>


   </div>
   <!-- halaman ini digunakan untuk menampilkan view dari data pengajar -->