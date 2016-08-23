<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/LogoIFSP.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['nome']; ?></p>
           <?php  $type = new Select();
                  $type->userType($_SESSION['tipo_usuario']);
           ?>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <?php

          if($_SESSION['tipo_usuario']==3)
          {
            include '/admin/menuadmin.html';
          }
          elseif($_SESSION['tipo_usuario']==4)
          {
            include '/revisor/menurevisor.html';
          }
          elseif($_SESSION['tipo_usuario']==2)
          {

            if ($_SESSION['perm_noticias'] != null)
            {
              include '/editor/noticias.html';
            }

            if ($_SESSION['perm_cardapios'] != null)
            {
              include '/editor/cardapios.html';
            }

            if ($_SESSION['perm_cursos'] != null)
            {
              include '/editor/cursos.html';
            }

            if ($_SESSION['perm_monitorias'] != null)
            {
              include '/editor/monitorias.html';
            }

            if ($_SESSION['perm_estagios'] != null)
            {
              include '/editor/estagios.html';
            }

            if ($_SESSION['perm_eventos'] != null)
            {
              include '/editor/eventos.html';
            }

            if ($_SESSION['perm_categorias'] != null)
            {
              include '/editor/categorias.html';
            }

            if ($_SESSION['perm_locais'] != null)
            {
              include '/editor/locais.html';
            }

            if ($_SESSION['perm_assistencias'] != null)
            {
              include '/editor/assistencias.html';
            }

            if ($_SESSION['perm_setores'] != null)
            {
              include '/editor/setores.html';
            }

          }
          elseif ($_SESSION['tipo_usuario']==1)
          {
            include '/autor/menubasic.html';
          }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
