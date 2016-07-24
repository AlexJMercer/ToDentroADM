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
        <!-- Notifications Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu toggle button -->
          <a href="#" data-toggle="modal" data-target="#notificacao">
            <i class="glyphicon glyphicon-phone fa-1x"></i>
            <span class="label label-danger">!</span>
            <span class="hidden-xs"> Enviar notificações </span>
          </a>
        </li>
        <!-- Control Sidebar Toggle Button >
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Skins</a>
        </li-->
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
                <small>Administrador</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <form class="" action="" method="post">
                <div class="form-group">
                  <button type="button" name="button" class="btn btn-primary btn-flat btn-block"><i class="fa fa-user"></i> Informações pessoais </button>
                </div>
                <div class="form-group">
                  <button type="button" data-toggle="control-sidebar" class="btn bg-teal btn-flat btn-block"><i class="fa fa-gears"></i> Temas </button>
                </div>
                <div class="form-group">
                  <button type="submit" name="logout" value="logout" formaction="../index/logout.php" class="btn btn-danger btn-flat btn-block"><i class="fa fa-sign-out"></i>  Sair </button>
                </div>
              </form>
            </li>
          </ul>

        </li>
      </ul>
    </div>
  </nav>
</header>

<div class="modal fade" id="notificacao" tabindex="0" role="dialog" aria-labelledby="notificacaoLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title">Enviar notificações</h4>
     </div>
     <div class="modal-body">
       <form class="form-horizontal" action="../notificacoes/CrudNotificacoes.php" method="post">
        <div class="form-group">
           <label for="titulo" class="col-sm-2 control-label">Título:</label>
           <div class="col-sm-10">
             <input type="text" class="form-control" name="titulo" id="titulo" data-toggle="tooltip" title="Campo Obrigatório!" required>
           </div>
           <br>
       </div>
       <div class="form-group">
          <label for="texto" class="col-sm-2 control-label">Texto:</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="texto" id="texto" rows="8" cols="40" data-toggle="tooltip" title="Campo Obrigatório!" required></textarea>
          </div>
      </div>
      <div class="form-group">
         <label for="notificar" class="col-sm-2 control-label">Notificar aplicativo:</label>
         <div class="col-sm-10">
           <div class="checkbox">
             <label>
               <input type="checkbox" name="notificar" value="notificar">
                  Enviar notificação!
             </label>
           </div>
         </div>
      </div>
     </div>
     <div class="modal-footer">
       <button type="submit" name='enviar' value='enviar' class="btn btn-success btn-flat btn-block"><i class="fa fa-search"></i>  Enviar </button>
       <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
       </form>
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
