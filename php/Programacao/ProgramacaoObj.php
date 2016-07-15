<?php

include_once "../../class/Carrega.class.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel de Controle - Tô Dentro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="../../plugins/font-awesome.min.css">
    <link rel="stylesheet" href="../../plugins/ionicons.min.css">
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
  <body class="hold-transition skin-green sidebar-mini">
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
          <h1>Programação</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
            <div class="box box-success">
               <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de datas</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                <!-- form start -->
                  <form class="form-horizontal" id="form" method="post" action="CrudProgramacao.php">
                     <div class="form-group">
                        <label for="evento" class=" col-sm-2 control-label"> <i class="fa fa-check-circle"></i> Evento:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="evento" required>
                              <option value=""></option>
                              <?php
                                    $eventoSelect = new Select();
                                    $eventoSelect->eventoSelect();
                              ?>
                          </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="dataInicio" class="col-sm-2 control-label">Data de inicio de evento:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="dataInicio" id="dataInicio" required data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="dataFim" class="col-sm-2 control-label">Data de fim de evento:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="dataFim" id="dataFim" required data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                     </div>
                     <div class="form-group">
                       <label class="col-sm-2 control-label">Legenda:</label>
                       <div class="col-sm-10">
                         <p class="help-block"><i class="fa fa-check-circle"></i> Campo obrigatório</p>
                       </div>
                     </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-flat btn-block"><i class="fa fa-check"></i> Enviar </button>
                    <br>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
                  </div><!-- /.box-footer -->
               </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            </div>
          </div>   <!-- /.row -->
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
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
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
        //select2
        $(".select2").select2({
          placeholder:"Selecione o evento"
        });

        //InputMask
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();
      });
    </script>

  </body>
</html>
