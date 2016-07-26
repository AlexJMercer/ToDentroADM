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
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
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
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> Eventos </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <!-- Horizontal Form -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Eventos</h3>
                </div><!-- /.box-header -->
                <?php

                  $id = $_POST["id"];

                  if (isset($_POST["editar"]))
                  {
                    $edit = new Eventos();
                    $comp = $edit->editar($id);
                    print_r($comp);

                      if ($edit != null)
                      {
                ?>
                <!-- form start -->
                <form class="form-horizontal" id="form" method="post" action="CrudEventos.php" enctype="multipart/form-data">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" for="evento"> Evento: </label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="evento" name="evento" placeholder="Nome do Evento" value="<?php echo $comp->evento; ?>" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <?php $_SESSION['categoria_edit']=$comp->categoria; ?>
                        <span id="listagemCategorias"></span>
                        <div class="col-sm-2">
                         <button type="button" class="btn btn-info btn-flat" id="cadCat" name="button" style="width:100%;"><i class="fa fa-plus"></i> Categorias </button>
                        </div>
                      </div>
                      <div id="resposta"></div>
                      <div class="form-group">
                         <label for="dataInicio" class="col-sm-2 control-label">Data de inicio do evento:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="dataInicio" id="dataInicio" value="<?php echo date('d/m/Y', strtotime($comp->dataInicio)); ?>" required data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                         </div>
                      </div>
                      <div class="form-group">
                         <label for="dataFim" class="col-sm-2 control-label">Data de término do evento:</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="dataFim" id="dataFim" value="<?php echo date('d/m/Y', strtotime($comp->dataFim)); ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                         </div>
                      </div>
                      <div class="form-group">
                        <label for="horario" class="col-sm-2 control-label">Horário do evento:</label>
                        <div class="col-sm-10 bootstrap-timepicker">
                          <input type="text" name="horario" id="horario" value="<?php echo $comp->horario; ?>" class="form-control timepicker">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="texto" class="col-sm-2 control-label"> Descrição: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="texto" id="texto" rows="8" cols="40"><?php echo $comp->texto; ?></textarea>
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
                    <input type="hidden" name="id" value="<?php echo $comp->id; ?>"/>
                    <button type="submit" name="atualizar" value="atualizar" class="btn btn-success btn-lg btn-flat btn-block"><i class="fa fa-check"></i> Atualizar </button>
                    <br>
                    <button type="button" name="cancelar" value="cancelar" onclick="location.href='ViewEventosObj.php'" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Cancelar </button>
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
  include '../inc/style_page.html';
        include '../inc/control-sidebar.html';
      ?>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!--FileInput-->
    <script src="../../plugins/fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="../../plugins/fileinput/js/fileinput_locale_pt-BR.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>



    <script type="text/javascript">
    $(function(){
      $(".select2").select2({
        placeholder: "Selecione a categoria do evento!"
      });

      //InputMask
      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      //Money Euro
      $("[data-mask]").inputmask();

    });

    $('.file').fileinput({
        //var file = "<?php echo $comp->imagem; ?>";
        initialPreview: [
          '<img src="<?php echo $comp->imagem; ?>" class="file-preview-image">'
        ],
        browseClass: "btn btn-info btn-flat btn-block",
        showCaption: false,
        showRemove: false,
        showUpload: false,
        language: 'pt-BR',
        overwriteInitial: true,
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
<?php
    }
  }
?>
