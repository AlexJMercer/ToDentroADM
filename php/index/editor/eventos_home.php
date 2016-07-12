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
