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
    <!--FileInput-->
    <link rel="stylesheet" href="../../plugins/fileinput/css/fileinput.min.css">
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
        <section class="content-header">
          <h1>Cursos
            <a class="btn btn-info btn-flat pull-right" href="ViewCursosObj.php"><i class="fa fa-list"></i>  Listar cursos</a>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div id="cadCurso">
                <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de curso</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" id="form_curso" method="post" action="CrudCursos.php" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                        <label for="curso" class="col-sm-2 control-label">Nome do curso:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nome" id="curso" placeholder="Digite o nome aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                         <label for="inst" class="col-sm-2 control-label">Instituto:</label>
                         <div class="col-sm-10">
                           <select class="form-control" name="instituto" id='inst' data-toggle="tooltip" title="Campo Obrigatório!" placeholder="Selecione um instituto" required>
                             <option value="">Selecione um instituto</option>
                             <?php
                                 $instituto = new Select();
                                 $instituto->institutoSelect();
                             ?>
                           </select>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="desc" class="col-sm-2 control-label">Descrição:</label>
                         <div class="col-sm-10">
                            <textarea class="form-control" name="texto" id="desc" rows="14" placeholder="Digite aqui..."></textarea>
                         </div>
                      </div>
                      <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">Logo:</label>
                        <div class="col-sm-10">
                          <input id="logo" name="logo" class="file" type="file" multiple data-min-file-count="0">
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
              </div>
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
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!--FileInput-->
    <script src="../../plugins/fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../../plugins/fileinput/js/fileinput_locale_pt-BR.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script type="text/javascript">
      $('.file').fileinput({
          overwriteInitial: true,
          browseClass: "btn btn-info btn-flat btn-block",
          showCaption: false,
          showRemove: false,
          showUpload: false,
          maxImageWidth: 300,
          maxImageHeight: 180,
          language: 'pt-BR',
          allowedFileExtensions : ['jpg', 'png','gif']

      });
    </script>
  </body>
</html>
