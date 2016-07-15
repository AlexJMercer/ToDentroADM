<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Data Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="../../bootstrap/css/center.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-green  sidebar-mini">
    <div class="wrapper">
      <?php if ($_SESSION['tipo_usuario']==3 || $_SESSION['tipo_usuario']==4)
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
          <h1>
          Programação
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header box-info">
                  <h3 class="box-title">Listagem de eventos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataT" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Evento</th>
                        <th>Data de inicio</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
<?php

include_once "../../class/Carrega.class.php";

  $listar = new Programacao();
  $list   = $listar->listar();

  if ($list != null)
  {
    foreach ($list as $line)
    {
?>
                      <tr class="odd gradeX">
                        <form name="view" action="EditLocalObj.php" method="post">
                        <td><?php echo $line->evento; ?></td>
                        <td><?php echo date('d/m/Y',strtotime($line->dataInicio)); ?></td>
                        <td>
                          <input type='hidden' name='id' value='<?php echo $line->id; ?>'>

                          <button type="submit" name="editar" value="editar" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> Editar </button>

                          <button type="submit" name="excluir" value="excluir" formaction="CrudProgramacao.php" class='btn btn-flat btn-danger'><i class="fa fa-times"></i> Excluir </button>
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
        include '../inc/control-sidebar.html';
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
    <!-- page script>
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script-->
    <script>
      $(function ()
      {
        $("#dataT").DataTable({

          "ordering": false,
          "oLanguage": { "sSearch": "",
                         "sInfo": "Um total de _TOTAL_ locais (_START_ de _END_)",
                         "sLengthMenu": "Listar _MENU_ locais"},
        });
        $('.dataTables_filter input').attr("placeholder", "Pesquise aqui");
      });
    </script>
  </body>
</html>
