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
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="form-group">
                  <a href="../usuarios/UsersProfileObj.php" class="btn btn-primary btn-flat btn-block"><i class="fa fa-user"></i> Informações pessoais </a>
                </div>
                <div class="form-group">
                  <button type="submit" name="logout" value="logout" formaction="../index/logout.php" class="btn btn-danger btn-flat btn-block"><i class="fa fa-sign-out"></i>  Sair </button>
                </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li class="dropdown user user-menu">
         <a href="#"  data-toggle="control-sidebar"><i class="fa fa-gears"></i>
         <span class="hidden-xs"> Temas </span></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
