<header class="main-header">
  <!-- Logo -->
  <a href="../index/index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b><b>D</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Tô </b><b>Dentro</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">

      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../../dist/img/LogoIFSP.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['nome']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../dist/img/LogoIFSP.jpg" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['nome']; ?>
                <small>Teste</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <form class="" action="" method="post">
                <div class="pull-left">
                  <button type="button" name="button" class="btn btn-primary btn-flat"><i class="fa fa-user"></i>  Profile </button>
                </div>
                <div class="pull-right">
                  <button type="submit" name="logout" value="logout" formaction="../index/logout.php" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i>  Logout </button>
                </div>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
