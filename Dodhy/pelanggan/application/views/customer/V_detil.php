
<div class="container detil">

  <div class="row">

    <div class="col-lg-9">
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-4 text-center">Fluid jumbotron</h1>
        </div>
      </div>

      <h5 class="mb-3">Menu Hari Ini</h5>
    </div>

    <div class="col-lg-3 ">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home"
            role="tab" aria-controls="home">Home</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile"
            role="tab" aria-controls="profile">Profile</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages"
            role="tab" aria-controls="messages">Messages</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings"
            role="tab" aria-controls="settings">Settings</a>
        </div>
    </div>
  </div>

    <div class="row mb-4">
      <?php foreach ($detail_menu as $dm){?>
      <div class="col-lg-4 ">
      
        <div class="card text-center" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $dm->nama_menu ?></h5>
            <span class="badge badge-pill badge-success"><?= $dm->harga_menu?></span></br>
            <a href="#" class="btn btn-primary mt-2">Masukkan Ke Keranjang</a>
          </div>
        </div>
        
      </div>
      <?php } ?>
    </div>
  

</div>