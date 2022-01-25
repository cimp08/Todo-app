<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand text-uppercase" href="index.php">Todo-app</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" aria-current="page" href="index.php">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="includes/todos.inc.php">todos</a>
            </li>
          </ul>
          <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php
              if(isset($_SESSION['user_username'])): ?>
                <li class="nav-item">
                  <a class="nav-link active text-uppercase" href="index.php"><?php echo $_SESSION['user_username']; ?></a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-outline-primary text-uppercase" href="includes/logout.inc.php">Logout</a>
                </li>
              <?php 
              else:?>
                <li class="nav-item">
                  <a class="nav-link active text-uppercase" href="signup.php">Sign Up</a>
                </li>
                <a class="btn btn-outline-success text-uppercase" href="login.php">Login</a>
              <?php
              endif; ?>  
            </ul>
          </div>
        </div>
      </div>
    </nav>