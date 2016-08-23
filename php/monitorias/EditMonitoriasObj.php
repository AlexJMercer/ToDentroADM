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
    <!--link rel="stylesheet" href="/css/master.css" media="screen" title="no title" charset="utf-8"-->
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
                <?php

                  $id = $_POST["id"];

                  if (isset($_POST["editar"]))
                  {
                    $edit = new Monitorias();
                    $comp = $edit->EditarMonitorias($id);

                    if ($edit != null)
                    {
                ?>
                <form class="form-horizontal" name="cadcardapio" id="form" method="post" action="<?php $SELF_PHP;?>">
                  <div class="box-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label" >Curso:</label>
                        <div class="col-sm-10">
                          <p class="form-control-static"><?php echo $comp->curso; ?></p>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Disciplina:</label>
                        <div class="col-sm-10">
                          <p class="form-control-static"> <?php echo $comp->disciplina; ?></p>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="semestre" class="col-sm-2 control-label">Semestre:</label>
                          <div class="col-sm-10">
                            <select class="form-control select2" id="semestre" name="semestre" style="width: 100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
                              <option value=""></option>
                              <?php $semestreSelect = new Select();
                                    $semestreSelect->semestreSelect($comp->semestre);
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                           <label for="sala" class="col-sm-2 control-label">Sala:</label>
                           <div class="col-sm-10">
                              <select class="form-control select2" name="sala" id="sala" style="width: 100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
                                 <option value=""></option>
                                 <?php $localSelect = new Select();
                                       $localSelect->localSelect($comp->sala);
                                 ?>
                             </select>
                           </div>
                         </div>
                         <div class="form-group">
                            <label for="info" class="col-sm-2 control-label">Informações adicionais:</label>
                            <div class="col-sm-10">
                               <textarea class="form-control" name="info" rows="4" placeholder="Digite aqui..." data-toggle="tooltip" title="Campo Obrigatório!" required><?php echo $comp->info; ?></textarea>
                            </div>
                         </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <input type="hidden" name="id" value="<?php echo $comp->id; ?>"/>
                    <button type="submit" name="atualizar" value="atualizar" class="btn btn-success btn-flat btn-block">Atualizar</button>
                    <br>
                    <button type="reset" class="btn btn-default btn-flat btn-block btn-sm ">Limpar</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              <!-- general form elements disabled -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php
            }
          }
      ?>
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
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>

    <script type="text/javascript">
    $(function(){
      $(".select2").select2();

      $('#reservation').daterangepicker({
        singleDatePicker: true,
        format: 'DD/MM/YYYY',
        "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sab"
        ],
        "monthNames": [
            "Janeiro",
            "Feveireiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        "firstDay": 1
    },
      });
    });
    </script>
  </body>
</html>
