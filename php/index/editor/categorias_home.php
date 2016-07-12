<div class="small-box bg-teal">
  <div class="inner">
    <?php
      $categorias = new Select();
    ?>
    <h3><?php echo $categorias->totalCategorias(); ?></h3>
    <p>Categorias</p>
  </div>
  <div class="icon">
    <i class="ion ion-bag"></i>
  </div>
  <a href="../categorias/ViewCategoriasObj.php" class="small-box-footer">Ir para categorias <i class="fa fa-arrow-circle-right"></i></a>
</div>
