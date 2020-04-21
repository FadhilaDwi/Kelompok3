   <!-- Begin Page Content -->
   <div class="container-fluid">

       <!-- Page Heading -->
       <h1 class="h3 mb-2 text-gray-800">Data Review </h1>



       <div class="card">
           <div class="card-body">

               <form method="">
                   <div class="card">
                       <div class="card-header">
                           Detail Review
                       </div>
                       <div class="card-body">
                           <p class="card-text">Nama Catering:<?= $review['nama_catering']; ?></p>
                           <p class="card-text">Isi Review:   </p>
                      <p> <textarea style="width:300px; height:150px" readonly="readonly    "><?= $review['review']; ?> </textarea> </p>
                           <a href="<?= base_url('review/lihat') ?>" class="btn btn-primary">Back</a>
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