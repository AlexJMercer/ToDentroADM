<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    <div class="inner">
      <?php
        $noticia = new Select();
      ?>
      <h3><?php echo $noticia->totalNoticias(); ?></h3>
      <p>Notícias</p>
    </div>
    <div class="icon">
      <i class="fa fa-newspaper-o"></i>
    </div>
    <a href="../noticias/ViewNoticiasObj.php" class="small-box-footer">Ir para notícias <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-aqua">
    <div class="inner">
      <?php
        $eventos = new Select();
      ?>
      <h3><?php echo $eventos->totalEventos(); ?></h3>
      <p>Eventos</p>
    </div>
    <div class="icon">
      <i class="fa fa-rocket"></i>
    </div>
    <a href="../eventos/ViewEventosObj.php" class="small-box-footer">Ir para eventos <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-aqua">
    <div class="inner">
      <?php
        $estagios = new Select();
      ?>
      <h3><?php echo $estagios->totalEstagios(); ?></h3>
      <p>Estágios</p>
    </div>
    <div class="icon">
      <i class="fa fa-file-text-o"></i>
    </div>
    <a href="../estagios/ViewEstagiosObj.php" class="small-box-footer">Ir para estágios <i class="fa fa-arrow-circle-right"></i></a>
  </div>

</div>
<!--Bloco-->
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-maroon">
    <div class="inner">
      <?php
        $cardapios = new Select();
      ?>
      <h3><?php echo $cardapios->totalCardapios(); ?></h3>
      <p>Cardápios</p>
    </div>
    <div class="icon">
      <i class="fa fa-cutlery"></i>
    </div>
    <a href="../cardapio/ViewCardapiosObj.php" class="small-box-footer">Ir para cardápios <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-maroon">
    <div class="inner">
      <?php
        $assistencias = new Select();
      ?>
      <h3><?php echo $assistencias->totalAssistencias(); ?></h3>
      <p>Assistências</p>
    </div>
    <div class="icon">
      <i class="fa fa-medkit"></i>
    </div>
    <a href="../assistencias/ViewAssistenciasObj.php" class="small-box-footer">Ir para assistências <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-maroon">
    <div class="inner">
      <?php
        $setores = new Select();
      ?>
      <h3><?php echo $setores->totalSetores(); ?></h3>
      <p>Setores</p>
    </div>
    <div class="icon">
      <i class="fa fa-flag"></i>
    </div>
    <a href="../setores/ViewSetoresObj.php" class="small-box-footer">Ir para setores <i class="fa fa-arrow-circle-right"></i></a>
  </div>

</div><!-- ./col -->
<!--Fim do Bloco-->
<!--Bloco-->
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-orange-active">
    <div class="inner">
      <?php
        $monitorias = new Select();
      ?>
      <h3><?php echo $monitorias->totalMonitorias(); ?></h3>
      <p>Monitorias</p>
    </div>
    <div class="icon">
      <i class="fa fa-laptop"></i>
    </div>
    <a href="../monitorias/PreviewMonitoriasObj.php" class="small-box-footer">Ir para monitorias <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-orange-active">
    <div class="inner">
      <?php
        $cursos = new Select();
      ?>
      <h3><?php echo $cursos->totalCursos(); ?></h3>
      <p>Cursos</p>
    </div>
    <div class="icon">
      <i class="fa fa-graduation-cap"></i>
    </div>
    <a href="../cursos/ViewCursosObj.php" class="small-box-footer">Ir para cursos <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-orange-active">
    <div class="inner">
      <?php
        $locais = new Select();
      ?>
      <h3><?php echo $locais->totalLocais(); ?></h3>
      <p>Locais</p>
    </div>
    <div class="icon">
      <i class="fa fa-map"></i>
    </div>
    <a href="../locais/ViewLocaisObj.php" class="small-box-footer">Ir para locais <i class="fa fa-arrow-circle-right"></i></a>
  </div>

</div><!-- ./col -->
<!--Fim do Bloco-->
<!--Bloco-->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-teal">
    <div class="inner">
      <?php
        $categorias = new Select();
      ?>
      <h3><?php echo $categorias->totalCategorias(); ?></h3>
      <p>Categorias</p>
    </div>
    <div class="icon">
      <i class="fa fa-tags"></i>
    </div>
    <a href="../categoria/ViewCategoriasObj.php" class="small-box-footer">Ir para categorias <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <div class="small-box bg-teal">
    <div class="inner">
      <?php
        $usuarios = new Select();
      ?>
      <h3><?php echo $usuarios->totalUsuarios(); ?></h3>
      <p>Usuários</p>
    </div>
    <div class="icon">
      <i class="fa fa-users"></i>
    </div>
    <a href="../usuarios/ViewUsersObj.php" class="small-box-footer">Ir para usuarios <i class="fa fa-arrow-circle-right"></i></a>
  </div>

</div><!-- ./col -->
