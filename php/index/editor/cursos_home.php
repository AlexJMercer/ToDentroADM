<div class="small-box bg-orange-active">
  <div class="inner">
    <?php
      $cursos = new Select();
    ?>
    <h3><?php echo $cursos->totalCursos(); ?></h3>
    <p>Cursos</p>
  </div>
  <div class="icon">
    <i class="ion ion-bag"></i>
  </div>
  <a href="../cursos/ViewCursosObj.php" class="small-box-footer">Ir para cursos <i class="fa fa-arrow-circle-right"></i></a>
</div>
