<?php

include_once "../../class/Carrega.class.php";

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
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/center.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Cárdapios
          <a class="btn btn-primary btn-flat pull-right" href="CardapioObj.php"><i class="fa fa-plus"></i>   Cadastrar cardápio </a>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Listagem de cárdapios</h3>
                  <a class="btn btn-info btn-flat pull-right" href="ViewCardapiosObj.php" title="Atualizar resultados" data-toggle="tooltip" data-placement="left"><i class="fa fa-refresh"></i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th style="text-align:center">Dia</th>
                        <th style="text-align:center">Data</th>
                        <th style="text-align:center">Opções</th>
                      </tr>
                    </thead>
                    <?php

                      $listar = new Cardapios();
                      $list   = $listar->ListarCardapios();

                      if ($list != null)
                      {
                        foreach ($list as $line)
                        {
                    ?>
                  <form name="view" class="" action="EditCardapioObj.php" method="post">
                    <tbody>
                      <tr>
                        <td><?php echo $line->dia; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($line->data)); ?></td>
                        <td style="text-align:center">
                            <input type='hidden' name='id' value='<?php echo $line->id; ?>'>
                            <button type="submit" name="exibir" value="exibir" formaction="ShowCardapioObj.php" class="btn btn-info btn-flat"><i class="fa fa-expand"></i> Exibir </button>
                            <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i> Editar </button>
                            <button type="submit" name="excluir" value="excluir" formaction="ExcluirCardapioObj.php" class='btn btn-danger btn-flat'><i class="fa fa-times"></i> Excluir </button></td>
                      </tr>
                    </tbody>
                  </form>
                  <?php
                      }
                    }
                    else
                    {
                  ?>
                  <tr class="odd gradeX">
                    <td>
                      <p>Nada cadastrado!!</p>
                    </td>
                    <td>
                      <button type="button" class="btn btn-flat btn-warning" disabled><i class="fa fa-edit"></i> Editar </button>
                      <button type="button" class='btn btn-flat btn-danger' disabled><i class="fa fa-times"></i> Excluir </button>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer"></div>
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
        include '../inc/footer.html';
        include '../inc/style_page.html';
      ?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
  </body>
</html>
