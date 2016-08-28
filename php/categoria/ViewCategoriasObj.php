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
    <!-- Toast -->
    <link rel="stylesheet" href="../../plugins/toastr/jquery.toast.css" type="text/css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="../../bootstrap/css/center.css">

    <style type='text/css'>
      .alerta{
        /*display: none;*/
        z-index: 1001;
      }
    </style>
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
          <h1>
          Categorias
          <a class="btn btn-primary btn-flat pull-right" href="CategoriaObj.php"><i class="fa fa-plus"></i>   Cadastrar Categorias </a>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Listagem de categorias</h3>
                  <a class="btn btn-info btn-flat pull-right" href="ViewCategoriasObj.php" title="Atualizar resultados" data-toggle="tooltip" data-placement="left"><i class="fa fa-refresh"></i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataT" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Categoria</th>
                        <th>Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      $listar = new Categorias();
                      $list = $listar->ListarCategorias();

                      if ($list != null)
                      {
                        foreach ($list as $line)
                        {
                    ?>
                      <tr class="odd gradeX">
                        <form name="view" action="EditCategoriaObj.php" method="post">
                        <td><?php echo $line->categoria; ?></td>
                        <td>
                          <input type='hidden' name='id' value='<?php echo $line->id; ?>'>
                          <button type="submit" name="editar" value="editar" class="btn btn-flat btn-warning"><i class="fa fa-edit"></i> Editar </button>
                          <button type="submit" name="excluir" value="excluir" formaction="ExcluirCategoriaObj.php" class='btn btn-flat btn-danger'><i class="fa fa-times"></i> Excluir </button>
                        </td>
                      </tr>
                      </form>
                    <?php
                        }
                      }
                      else
                      {
                    ?>
                      <tr class="odd gradeX">
                        <td>
                          <p> Nada cadastrado!!</p>
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
    <!-- Toast -->
    <script src="../../plugins/toastr/jquery.toast.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../../plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- page script -->
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script>
      $(function ()
      {
        $("#dataT").DataTable({
          responsive:{details: false},
          "ordering": false,
          "oLanguage": { "sSearch": "",
                         "sInfo": "Um total de _TOTAL_ categorias (_START_ de _END_)",
                         "sLengthMenu": "Listar _MENU_ categorias"},
        });
        $('.dataTables_filter input').attr("placeholder", "Pesquise aqui");
      });
    </script>

    <?php
        if (isset($_GET['success']))
        {
    ?>
        <script type="text/javascript">
        $(document).ready(function()
        {
          $(window).load(function()
          {
            $.toast({
              text: "Operação Completada!", // Text that is to be shown in the toast
              heading: 'Sucesso!', // Optional heading to be shown on the toast
              icon: 'success', // Type of toast icon
              showHideTransition: 'slide', // fade, slide or plain
              allowToastClose: true, // Boolean value true or false
              hideAfter: 3500, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
              stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
              position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
              textAlign: 'left',  // Text alignment i.e. left, right or center
              loader: true,  // Whether to show loader or not. True by default
              loaderBg: '#008548',  // Background color of the toast loader #00ff40
            })
          }
          );
        });
        </script>
    <?php
        }
        elseif (isset($_GET['erro']))
        {
    ?>
    <script type="text/javascript">
    $(document).ready(function()
    {
      $(window).load(function()
      {
        $.toast({
          text: "Erro durante execução da operação!", // Text that is to be shown in the toast
          heading: 'Erro!', // Optional heading to be shown on the toast
          icon: 'error', // Type of toast icon
          showHideTransition: 'slide', // fade, slide or plain
          allowToastClose: true, // Boolean value true or false
          hideAfter: 3500, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
          stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
          position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
          textAlign: 'left',  // Text alignment i.e. left, right or center
          loader: true,  // Whether to show loader or not. True by default
          loaderBg: '#008548',  // Background color of the toast loader #00ff40
        })
      }
      );
    });
    </script>
    <?php
        }
    ?>
  </body>
</html>
