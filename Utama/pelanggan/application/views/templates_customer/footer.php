<!-- Footer -->
  <footer class="py-5 bg-dark mt-auto">
    <div class="container">
      <p class="mt-auto text-center text-white">Copyright &copy; Laring <?= date("Y", strtotime("now"))?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url('assets/assets_shop/') ?>vendor/jquery/jquery.min.js"></script>
  <script>
    function toTarget(){
      document.getElementById("menu").scrollIntoView({behavior: 'smooth'});
    }
    function kelihatan(id){
      var e = document.getElementById(id);
      if(e.style.display == 'block')
        e.style.display = 'none';
      else
        e.style.display = 'block';
    }    
  </script>
  <script src="<?php echo base_url('assets/assets_shop/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>