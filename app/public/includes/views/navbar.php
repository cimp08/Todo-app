<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">TODO-APP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">TODOS</a>
            </li>
          </ul>
          <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php
              if(isset($_SESSION['user_username'])): ?>
                <li class="nav-item">
                  <a class="nav-link active" href="#"><?php echo $_SESSION['user_username']; ?></a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-outline-success" href="includes/logout.inc.php">LOGOUT</a>
                </li>
              <?php 
              else:?>
                <li class="nav-item">
                  <a class="nav-link active" href="#">SIGN UP</a>
                </li>
                <a class="btn btn-outline-success" href="#">LOGIN</a>
              <?php
              endif; ?>  
            </ul>
          </div>
        </div>
      </div>
    </nav>