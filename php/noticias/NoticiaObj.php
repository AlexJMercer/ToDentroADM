<?php

include_once "../../class/Carrega.class.php";
date_default_timezone_set('America/Sao_Paulo');

include "../Session.php";
include "../Session_editor.php";

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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/ionicons-2.0.1/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
    <!-- FileInput -->
    <link rel="stylesheet" href="../../plugins/fileinput/css/fileinput.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!--Loader-->
    <link rel="stylesheet" href="../../dist/css/loader.css">
    <!-- Toast -->
    <link rel="stylesheet" href="../../plugins/toastr/jquery.toast.css" type="text/css">
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
            <h1>Notícias</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de notícias</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" id="form" method="post" action="CrudNoticias.php" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label"> Autor: </label>
                        <div class="col-sm-10">
                           <input type="text" value="Mercer" class="form-control" disabled>
                           <input type="hidden" name="autor" value="1">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Data:</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>" disabled>
                          <input type="hidden" name="data" value="<?php echo date('d/m/Y'); ?>">
                        </div>
                        <label class="col-sm-1 control-label">Hora:</label>
                        <div class="col-sm-4">
                          <input type="text" value="<?php echo date('H:i');?>" class="form-control" disabled>
                          <input type="hidden" name="hora" value="<?php echo date('H:i');?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite o título aqui" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="linha" class="col-sm-2 control-label">Linha de apoio:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  name="linha_apoio" id="linha" rows="2" cols="40"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="status" id="status" style="width:100%;" required>
                            <option value=""></option>
                            <?php
                                $staSelect = new Select();
                                $staSelect->statusSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <?php
                          if (isset($_SESSION['categoria_edit']))
                          {
                            unset($_SESSION['categoria_edit']);
                          }
                        ?>
                        <span id="listagemCategorias"></span>
                        <div class="col-sm-2">
                         <button type="button" class="btn btn-info btn-flat" id="cadCat" name="button" style="width:100%;"><i class="fa fa-plus"></i> Categorias </button>
                        </div>
                      </div>
                      <div id="resposta"></div>
                      <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL do site:</label>
                        <div class="col-sm-10">
                          <input type="text" class='form-control' name="url" id='url' placeholder="Coloque aqui o link da noticia do website">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="noticia" class="col-sm-2 control-label">Noticia:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  name="noticia" id="noticia" rows="16" cols="40" required></textarea>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="imagem" class="col-sm-2 control-label">Adicionar imagem:</label>
                        <div class="col-sm-10">
                          <input class="file" type="file" id="imagem" name="imagem" data-show-upload="false" data-min-file-count="0"/>
                        </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-lg btn-success btn-flat btn-block"><i class="fa fa-check"></i> Enviar </button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Toast -->
    <script src="../../plugins/toastr/jquery.toast.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- FileInput -->
    <script src="../../plugins/fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../../plugins/fileinput/js/fileinput_locale_pt-BR.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script type="text/javascript">
		  // Este evendo é acionado após o carregamento da página
		    jQuery(window).load(function() {
			//Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
			    jQuery("#loader").delay(2600).fadeOut();
		    });
	  </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $("#status").select2({
        placeholder:"Selecione o status"
      });

      CKEDITOR.replace('noticia');
    });

      $('.file').fileinput({
          browseClass: "btn btn-info btn-flat btn-block",
          showCaption: false,
          showRemove: false,
          showUpload: false,
          language: 'pt-BR',
          overwriteInitial: true,
          maxFileSize: '500KB',
          maxImageWidth: 400,
          maxImageHeight: 200,
          allowedFileExtensions : ['jpg', 'png','gif']
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
         $("#cadCat").click(function(){
             $.ajax({
                 type: 'post',
                 url: '../categoria/newCategoriaObj.php',
                 dataType: 'html',
                 success: function (txt) {
                     $('#resposta').html(txt);
                 }
             });
         });
         atualiza();

         function atualiza()
         {
             $.get('../categoria/listagem_categorias_multiple.php', function (resultado){
                  $('#listagemCategorias').html(resultado);
             })
         }
    });
   </script>



  </body>
</html>
