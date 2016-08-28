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
    <!--FileInput-->
    <link rel="stylesheet" href="../../plugins/fileinput/css/fileinput.min.css">
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
        <div id="loader"></div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Eventos
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Eventos</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" name="evento" method="post" action="CrudEventos.php" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="evento"> Evento: </label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" title="Campo Obrigatório!" id="evento" name="evento" placeholder="Nome do Evento" data-toggle="tooltip" title="Campo Obrigatório!" required>
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
                      <?php
                      if ($_SESSION['tipo_usuario']==3 || $_SESSION['tipo_usuario']==4)
                      {
                      ?>
                      <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="status" id="status" style="width:100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
                            <option value="">Selecione o status da publicação</option>
                            <?php
                                $staSelect = new Select();
                                $staSelect->statusSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <?php
                      }
                      else
                      {
                      ?>
                      <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="SOB AVALIAÇÃO!" disabled>
                          <input type="hidden" name="status" value="1">
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                      <div class="form-group">
                         <label for="dataInicio" class="col-sm-2 control-label"> Data de inicio do evento: </label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" title="Campo Obrigatório!" name="dataInicio" id="dataInicio" data-toggle="tooltip" title="Campo Obrigatório!" required placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="dataFim" class="col-sm-2 control-label"> Data de término do evento: </label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="dataFim" id="dataFim" placeholder="dd/mm/yyyy" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask onchange="validar_datas()">
                         </div>
                      </div>
                      <div class="form-group">
                        <label for="horario" class="col-sm-2 control-label"> Horário do evento: </label>
                        <div class="col-sm-10">
                          <input type="text" name="horario" id="horario" title="Campo Obrigatório!" class="form-control" placeholder="Digite aqui os horários do evento. Exemplos: 14h; 17h30 - 23h." data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="texto" class="col-sm-2 control-label"> Descrição: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control" title="Campo Obrigatório!" name="texto" id="texto" rows="8" cols="40" placeholder="Descrição do evento" data-toggle="tooltip" title="Campo Obrigatório!" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="imagem" class="col-sm-2 control-label"> Adicionar imagem: </label>
                        <div class="col-sm-10">
                            <input class="file" type="file" id="imagem" name="imagem" data-show-upload="false" data-min-file-count="0"/>
                        </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-flat btn-block" ><i class="fa fa-check"></i> Enviar </button>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
            </div><!--/.col (right) -->
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
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!--FileInput-->
    <script src="../../plugins/fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../../plugins/fileinput/js/fileinput_locale_pt-BR.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../js/validar_datas.js"></script>

    <script type="text/javascript">
		  // Este evendo é acionado após o carregamento da página
		    jQuery(window).load(function() {
			//Após a leitura da pagina o evento fadeOut do loader é acionado, esta com delay para ser perceptivo em ambiente fora do servidor.
			    jQuery("#loader").delay(2600).fadeOut();
		    });
	  </script>

    <script type="text/javascript">
    $(function(){
      $(".select2").select2({
        placeholder: "Selecione a categoria do evento!"
      });

      //InputMask
      $("#datemask").inputmask("dd/mm/yyyy");
      //Money Euro
      $("[data-mask]").inputmask();

    });

    $('.file').fileinput({
        browseClass: "btn btn-info btn-flat btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        language: 'pt-BR',
        overwriteInitial: true,
        maxFileSize: '500KB',
        maxImageWidth: 300,
        maxImageHeight: 180,
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
             $.get('../categoria/Listagem_Categorias.php', function (resultado){
                  $('#listagemCategorias').html(resultado);
             })
         }
      });
   </script>
  </body>
</html>
