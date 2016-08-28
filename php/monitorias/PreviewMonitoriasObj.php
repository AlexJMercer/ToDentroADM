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
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
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
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Monitorias</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Filtrar monitorias</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <span title="Escolha um curso para filtrar as monitorias" data-toggle="tooltip" data-placement="bottom"><button class="btn btn-info btn-lg btn-flat btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-external-link"></i>   Selecionar curso  </button></span>

                <div class="modal fade" id="myModal" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">Listagem de monitorias</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <form class="" action="ViewMonitoriasObj.php" method="post">
                           <label for="curso">Curso:</label>
                           <select class="form-control" name="curso" id="curso" required>
                             <option value="">Selecione um curso para continuar</option>
                              <?php $cursoSelect = new Select();
                                    $cursoSelect->cursoSelect();
                              ?>
                           </select>
                       </div>
                     </div>
                     <div class="modal-footer">
                       <button type="submit" name='pesquisar' value='pesquisar' class="btn btn-info btn-flat btn-lg btn-block"><i class="fa fa-search"></i>  Pesquisar </button>
                     </div>
                   </div><!-- /.modal-content -->
                 </div><!-- /.modal-dialog -->
               </div><!-- /.modal -->
               </div>
              </div><!-- /.box -->
            </div>
          </div>   <!-- /.row -->
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
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script type="text/javascript">
    $(function()
    {
      $(".select2").select2();
    });

    $(window).load(function()
    {
        $('#myModal').modal('show');
    });
    </script>
  </body>
</html>
