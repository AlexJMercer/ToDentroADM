<div class="small-box bg-maroon">
  <div class="inner">
    <?php
      $assistencias = new Select();
    ?>
    <h3><?php echo $assistencias->totalAssistencias(); ?></h3>
    <p>Assistências</p>
  </div>
  <div class="icon">
    <i class="ion ion-bag"></i>
  </div>
  <a href="../assistencias/ViewAssistenciasObj.php" class="small-box-footer">Ir para assistências <i class="fa fa-arrow-circle-right"></i></a>
</div>
