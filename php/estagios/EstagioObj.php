<?php

include_once "../../class/Carrega.class.php";

include "../Session.php";?>
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
        <section class="content-header">
          <h1>Estágios
            <a class="btn btn-info btn-flat pull-right" href="ViewEstagiosObj.php"><i class="fa fa-list"></i>  Listar estágios</a>
          </h1>
        </section>
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Cadastro de estágio</h3>
                </div><!-- /.box-header -->
                <form class="form-horizontal" id="form" method="post" action="CrudEstagios.php">
                  <div class="box-body">
                      <div class="form-group">
                        <label for="titulo" class="col-sm-2 control-label">Título:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Digite aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="atividades" class="col-sm-2 control-label">Atividades:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="atividades" id="atividades" placeholder="Digite aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="salario" class="col-sm-2 control-label">Salário:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="salario" id="salario" placeholder="Digite aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="condicoes" class="col-sm-2 control-label">Condições:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="condicoes" id="condicoes" placeholder="Digite aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exigencias" class="col-sm-2 control-label">Exigências:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="exigencias" id="exigencias" placeholder="Digite aqui" data-toggle="tooltip" title="Campo Obrigatório!" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="curso" class="col-sm-2 control-label">Cursos:</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" name="curso[]" multiple style="width: 100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
                            <option value=""></option>
                            <?php $cursoSelect = new Select();
                                  $cursoSelect->cursoGeneralSelect();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="info" class="col-sm-2 control-label">Informações adicionais:</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="info" id="info" rows="8" cols="40"></textarea>
                        </div>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" name="enviar" value="enviar" class="btn btn-success btn-lg btn-flat btn-block"><i class="fa fa-check"></i> Enviar </button>
                    <br>
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
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>
    <!--MaskMoney-->
    <script src="../../plugins/jquery-maskmoney/src/jquery.maskMoney.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    <script type="text/javascript">
    $(function(){
      $(".select2").select2();


      $("#salario").maskMoney({
        prefix:'R$ ',
        decimal:'.',
        affixesStay: false});
    });
    </script>
  </body>
</html>
