<?php

include_once "../../class/Carrega.class.php";
date_default_timezone_set('America/Sao_Paulo');

include "../Session.php";

if ($_SESSION['tipo_usuario']==2)
{
  header('Location:ViewMyNoticiasObj.php');
  exit;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel de controle - Tô Dentro IFSul</title>
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
    <link rel="stylesheet" href="../../plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
    <!-- Toast -->
    <link rel="stylesheet" href="../../plugins/toastr/jquery.toast.css" type="text/css">
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
    <!--script >
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", "http://localhost/AdminTest/php/Noticias/ViewNoticiasObj.php");
    }
</script-->
  </head>
  <body class="hold-transition skin-green-light  sidebar-mini">
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
          <h1> Notícias
             <a class="btn btn-primary btn-flat pull-right" href="NoticiaObj.php"><i class="fa fa-plus"></i>  Cadastrar notícias </a>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Listagem de notícias</h3>
                  <a class="btn btn-info btn-flat pull-right" href="ViewNoticiasObj.php" title="Atualizar resultados" data-toggle="tooltip" data-placement="left"><i class="fa fa-refresh"></i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                  <table id="dataT" class="table table-bordered table-hover dt-responsive nowrap">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Notícia</th>
                        <th>Status</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      $listar = new Noticias();
                      $list   = $listar->ListarNoticias();
                    /* echo "<pre>";
                      var_dump($list);
                      echo "</pre>";*/

                      if ($list != null)
                      {
                        foreach ($list as $line)
                        {
                    ?>
                    <tr class="odd gradeX">
                      <form name="view" action="EditNoticiaObj.php" method="post">
                        <td><?php echo date('d/m/Y',strtotime($line->data)); ?></td>
                        <td><?php echo $line->titulo; ?></td>
                        <td><?php $badge = new Select();
                                  $badge->labelStatus($line->status);  ?></td>
                        <td>
                          <input type='hidden' name='id' value='<?php echo $line->id; ?>'>
                          <button type="submit" name="exibir" value="exibir" formaction="ShowNoticiaObj.php" class="btn btn-flat btn-info"><i class="fa fa-expand"></i> Exibir </button>
                          <button type="submit" name="editar" value="editar" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> Editar </button>
                          <button type="submit" name="excluir" value="excluir" formaction="ExcluirNoticiaObj.php" class='btn btn-flat btn-danger'><i class="fa fa-times"></i> Excluir </button>
                        </td>
                      </form>
                    </tr>
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
                    </tbody>
                  </table>
                  </div>
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

    <script>
      $(function ()
      {
        $("#dataT").DataTable({
          "responsive":false,
          "ordering": false,
          "oLanguage": { "sSearch": "",
                         "sInfo": "Um total de _TOTAL_ notícias (_START_ de _END_)",
                         "sLengthMenu": "Listar _MENU_ notícias"},
        });
        $('.dataTables_filter input').attr("placeholder", "Pesquise aqui");
      });
    </script>
  </body>
</html>
