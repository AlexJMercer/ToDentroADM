<?php

include_once "../../class/Carrega.class.php";
date_default_timezone_set('America/Sao_Paulo');

include "../Session.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel de Controle - Tô Dentro IFSul</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css">
    <!--Ionicons-->
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/skin-green-light.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-green-light sidebar-mini">
    <div class="wrapper">
      <?php
         if ($_SESSION['tipo_usuario']==3 || $_SESSION['tipo_usuario']==4)
{
  include '../inc/topo_full.php';
}
else
{
  include '../inc/topo_basic.php';
}
         include '../inc/menutime.php';
      ?>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Eventos</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Eventos</h3>
                </div><!-- /.box-header -->
                  <?php

                    $id = $_POST["id"];

                    if (isset($_POST["exibir"]))
                    {
                      $exib = new Eventos();
                      $comp = $exib->Editar($id);
                      //print_r($comp);
                      //var_dump($comp);
                      if ($exib != null)
                      {
                  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <dl class="dl-horizontal">
                        <dt>Evento:</dt>
                        <dd><?php echo $comp->evento; ?></dd>
                        <dt>Categoria:</dt>
                        <dd><?php $categoria = new Select();
                                  $categoria->labelCategorias($comp->categoria);
                            ?></dd>
                        <dt>Data do inicio do evento:</dt>
                        <dd><?php echo date('d/m/Y', strtotime($comp->dataInicio)); ?></dd>
                        <dt>Data de fim do evento:</dt>
                        <dd><?php echo date('d/m/Y', strtotime($comp->dataFim)); ?></dd>
                        <dt>Horário do evento:</dt>
                        <dd><?php echo $comp->horario; ?></dd>
                        <dt>Informações:</dt>
                        <dd><textarea class="form-control"  rows="8" cols="40" disabled><?php echo $comp->texto; ?></textarea></dd>
                        <br>
                        <dt>Logo:</dt>
                        <dd> <img class="img-responsive-pad" src="<?php echo $comp->imagem; ?>" alt="Logo do Evento" width="25%" height="25%" /> </dd>
                      </dl>
                      <form action="EditEventoObj.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="col-sm-6">
                          <button type="submit" name="retornar" value="retornar" class="btn bg-maroon btn-flat btn-block margin" formaction="ViewEventosObj.php"><i class="fa fa-edit"></i> Retornar para lista </button>
                        </div>
                        <div class="col-sm-6">
                          <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat btn-block margin"><i class="fa fa-edit"></i> Editar </button>
                        </div>
                      </form>
                    </div>
                  </div>

                  <?php
                      }
                    }
                  ?>
              <!-- general form elements disabled -->
            </div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
        include '../inc/footer.html';
      ?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>
</html>
