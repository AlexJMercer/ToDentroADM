<?php

include_once "../../class/Carrega.class.php";

  if (!empty($_POST['new']))
  {
      $object            = new Categorias();
      $object->categoria = $_POST['new'];

      if ($object->InserirCategorias())
      {
        echo "<div class='alert alert-success alert-dismissable col-lg-12'>
                 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4>	<i class='icon fa fa-check'></i> Alerta!</h4>
                 Categoria cadastrada com sucesso!!
              </div>";
      }
      else
      {
        echo "<div class='alert alert-danger alert-dismissable'>
                 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                 <h4><i class='icon fa fa-ban'></i> Alerta!</h4>
                 Erro no cadastro!!
              </div>";
      }

  }
?>
