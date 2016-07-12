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
        <h6><i class="fa fa-circle text-success"></i> Administrador </h6>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
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
            $erro = 0;
            $valida_menu = $erro;

            if ($_SESSION['perm_noticias'] != null)
            {
              include '/editor/noticias.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_cardapios'] != null)
            {
              include '/editor/cardapios.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_cursos'] != null)
            {
              include '/editor/cursos.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_monitorias'] != null)
            {
              include '/editor/monitorias.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_estagios'] != null)
            {
              include '/editor/estagios.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_eventos'] != null)
            {
              include '/editor/eventos.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_categorias'] != null)
            {
              include '/editor/categorias.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_locais'] != null)
            {
              include '/editor/locais.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_assistencias'] != null)
            {
              include '/editor/assistencias.html';
            }
            else
            {
              $valida_menu = $erro++;
            }

            if ($_SESSION['perm_setores'] != null)
            {
              include '/editor/setores.html';
            }
            else
            {
              $valida_menu = $erro++;
            }
            echo $valida_menu;

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
