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
    <!--Loader-->
    <link rel="stylesheet" href="../../dist/css/loader.css">
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
      <div id="container">
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
        <div id="loader"></div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Cardápios</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de cardápios</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" name="cadcardapio" id="form" method="post" action="CrudCardapios.php">
                  <div class="box-body">
                      <div class="form-group">
                        <label for="dia" class="col-sm-2 control-label">Dia:</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="dia" name="dia" style="width: 100%;" required>
                            <option value=""></option>
                            <?php $diaSelect = new Dia();
                                  $diaSelect->diaSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="date">Data:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="data" id="date" placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                        </div>
                      </div>
                      <div class="form-group">
                          <?php
                            if (isset($_SESSION['alimento_edit']))
                            {
                              unset($_SESSION['alimento_edit']);
                            }
                          ?>
                          <span id="listagemAlimentos"></span>
                          <div class="col-sm-2">
                            <button type="button" class="btn btn-info btn-flat" id="cadAli" name="button" style="width:100%;"><i class="fa fa-plus"></i> Adicionar Alimento </button>
                          </div>

                      </div>
                      <div id="resposta"></div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-lg btn-flat btn-block"><i class="fa fa-check"></i> Enviar</button>
                    <br>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
        include '../inc/footer.html';
      ?>
     </div><!-- /.container -->
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript">
		  // Este evendo é acionado após o carregamento da página
		    jQuery(window).load(function() {
			//Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
			    jQuery("#loader").delay(2600).fadeOut();
		    });
	  </script>

    <script type="text/javascript">
    $(function(){
      //InputMask
      $("#datemask").inputmask("dd/mm/yyyy");
      //Money Euro
      $("[data-mask]").inputmask();
    });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
         $("#cadAli").click(function(){
             $.ajax({
                 type: 'post',
                 url: '../alimentos/newAlimentoObj.php',
                 dataType: 'html',
                 success: function (txt) {
                     $('#resposta').html(txt);
                 }
             });
         });
         atualiza();

         function atualiza()
         {
             $.get('../alimentos/Listagem_Alimentos.php', function (resultado){
                  $('#listagemAlimentos').html(resultado);
             })
         }
    });
   </script>

  </body>
</html>
