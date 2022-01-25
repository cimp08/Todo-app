<?php require 'includes/views/header.php'; ?>
<?php require 'includes/views/navbar.php'; ?>     
    
  <div class="container">
    <div class="p-5 mb-4 mt-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-6 text-uppercase">Welcome <?php if(isset($_SESSION['user_username'])){echo $_SESSION['user_username'];}?>!</h1>
        <p class="col-md-8 fs-4">This is an application for you to register personal tasks</p>
      </div>
    </div>
  </div>

    
<?php require 'includes/views/footer.php'; ?>  
