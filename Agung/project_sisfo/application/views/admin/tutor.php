<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">List of Tutor</h1>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data of Tutor </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">


        <a href="<?= base_url('admin/create') ?>" class="btn btn-sm btn-primary mb-3"><i class="fas fa-fw fa-user-plus"></i> <span>New Tutor</span></a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>

            <th>No</th>
            <th>Name</th>

            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pengajar as $tr) : ?>

              <tr>
                <td><?php echo $no++ ?></td>

                <td><?= $tr->nama ?></td>


                <td>
                  <a href="<?= base_url('admin/detail/' . $tr->id) ?>" class="btn btn-sm btn-success"><i class="fas fa-fw fa-eye"></i></a>
                  <a href="<?= base_url('admin/hapus/' . $tr->id) ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                  <a href="<?= base_url('admin/update/' . $tr->id) ?>" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                </td>

              <?php endforeach; ?>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Halaman ini digunakan untuk menampilkan beberapa nama tutor dari bimbel New Ways to English Course  -->