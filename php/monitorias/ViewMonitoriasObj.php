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
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/skin-green-light.min.css">

      <link rel="stylesheet" href="../../bootstrap/css/center.css">

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">

      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css" >

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
            include '../inc/topotime.php';
            include '../inc/menutime.php';
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Monitorias
          <a class="btn btn-primary btn-flat pull-right" href="MonitoriasObj.php"><i class="fa fa-plus"></i>   Cadastrar monitoria </a>
          </h1>
        </section>
        <?php
          $curso = $_POST["curso"];
        ?>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Listagem de monitorias</h3>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="curso" value="<?php echo $curso; ?>">
                    <button type="submit" name="recarregar" class="btn btn-info btn-flat pull-right" title="Atualizar resultados" data-toggle="tooltip" data-placement="left"><i class="fa fa-refresh"></i></button>
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataT" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> Disciplina </th>
                        <th> Opções </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      if (isset($_POST['pesquisar']) || isset($_POST['retornar']) || isset($_POST['recarregar']))
                      {
                        $listar = new Monitorias();
                        $list = $listar->ListarEspecify($curso);

                        if ($list != null)
                        {
                          foreach ($list as $line)
                          {
                    ?>
                      <tr class="odd gradeX">
                        <form name="view" action="EditMonitoriasObj.php" method="post">
                        <td><?php echo $line->disciplina; ?></td>
                        <td>
                          <input type='hidden' name='id' value='<?php echo $line->id; ?>'>
                          <input type="hidden" name="curso" value="<?php echo $curso;?>">
                          <button type="submit" name="exibir" value="exibir" formaction="ShowMonitoriasObj.php" class="btn btn-flat btn-info"><i class="fa fa-expand"></i> Exibir </button>
                          <button type="submit" name="editar" value="editar" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> Editar </button>
                          <button type="submit" name="excluir" value="excluir" formaction="CrudMonitorias.php" class='btn btn-flat btn-danger'><i class="fa fa-times"></i> Excluir </button>
                        </td>
                      </tr>
                      </form>
                    <?php
                            }
                          }
                          else
                          {
                            echo "<h2> Nada cadastrado!!</h2>";
                          }
                        }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script >
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script-->
    <script>
      $(function ()
      {
        $("#dataT").DataTable({

          "ordering": false,
          "oLanguage": { "sSearch": "",
                         "sInfo": "Um total de _TOTAL_ monitorias (_START_ de _END_)",
                         "sLengthMenu": "Listar _MENU_ monitorias"},
        });
        $('.dataTables_filter input').attr("placeholder", "Pesquise aqui");
      });
    </script>
  </body>
</html>
