<?php

  $exib = new Usuarios();
  $comp = $exib->ListUserInfo($_SESSION['id']);

  if ($comp != NULL)
  {
?>

<div class="col-lg-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Informações do usuário</h3>
    </div><!-- /.box-header -->
      <div class="box-body">
        <div class="form-group">
          <dl class="dl-horizontal">
            <dt>Nome:</dt>
            <dd><?php echo $comp->nome; ?></dd>
            <dt>E-mail:</dt>
            <dd><?php echo $comp->email; ?></dd>
            <dt>Tipo de usuário:</dt>
            <dd><?php $type = new Select();
                      $type->labelType($comp->tipo);?></dd>
          </dl>
        </div>
      </div><!-- /.box-body -->
      <div class="box-footer"></div>
  </div><!-- /.box -->
</div><!--/.col -->
<?php
  }
?>

<a href="../noticias/NoticiaObj.php"></a>
