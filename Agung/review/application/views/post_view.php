<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Building a 5 Star Rating System in CodeIgniter</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Bootstrap Star Rating CSS -->
    <link href='<?= base_url() ?>assets/bootstrap-star-rating/css/star-rating.min.css' type='text/css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/style.css" rel="stylesheet">

    <!-- jQuery Library -->
    <script src='<?= base_url() ?>assets/js/jquery-3.3.1.js' type='text/javascript'></script>

    <!-- Bootstrap Star Rating JS -->
    <script src='<?= base_url() ?>assets/bootstrap-star-rating/js/star-rating.min.js' type='text/javascript'></script>

  </head>
  <body>

    <div class='content'>

      <!-- Post List -->
      <?php 
      foreach($posts as $post){
        $id = $post['id'];
        $title = $post['title'];
        $content = $post['content'];
        $link = $post['link'];
        $rating = $post['rating']; // User rating on a post
        $averagerating = $post['averagerating']; // Average rating

      ?>
      <div class="post">
        <h1><a href='<?= $link ?>' class='link' target='_blank'><?= $title; ?></a></h1>
        <div class="post-text">
          <?= $content; ?>
        </div>
        <div class="post-action">

          <!-- Rating Bar -->
          <input id="post_<?= $id ?>" value='<?= $rating ?>' class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1">

          <!-- Average Rating -->
          <div >Average Rating: <span id='averagerating_<?= $id ?>'><?= $averagerating ?></span></div>
        </div>
      </div>
      <?php
      }
      ?>

    </div>

    <!-- Script -->
    <script type='text/javascript'>
    $(document).ready(function(){

      // Initialize
      $('.ratingbar').rating({
        showCaption:false,
        showClear: false,
        size: 'sm'
      });

      // Rating change
      $('.ratingbar').on('rating:change', function(event, value, caption) {
        var id = this.id;
        var splitid = id.split('_');
        var postid = splitid[1];

        $.ajax({
          url: '<?= base_url() ?>index.php/employee/updateRating',
          type: 'post',
          data: {postid: postid, rating: value},
          success: function(response){
             $('#averagerating_'+postid).text(response);
          }
        });
      });
    });
 
    </script>

  </body>
</html>