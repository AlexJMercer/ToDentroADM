<?php

include_once "../../class/Carrega.class.php";

include "../Session.php";
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
    <!--Font Awesome-->
    <link rel="stylesheet" href="../../plugins/font-awesome-4.5.0/font-awesome-4.5.0/css/font-awesome.min.css">
    <!--Ionicons-->
    <link rel="stylesheet" href="../../plugins/ionicons-2.0.1/ionicons-2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
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
          <h1>Usuários</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Informações do usuário</h3>
                </div><!-- /.box-header -->
                <?php

                    $exib = new Usuarios();
                    $comp = $exib->ListUserInfo($_SESSION['id']);
                    //print_r($_SESSION);

                    if ($exib != null)
                    {
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <dl class="dl-horizontal">
                        <dt>Nome:</dt>
                        <dd><?php echo $comp->nome; ?></dd>
                        <dt>E-mail:</dt>
                        <dd><?php echo $comp->email; ?></dd>
                        <dt>Tipo de usuário:</dt>
                        <dd><?php $type = new Select();
                                  $type->labelType($comp->tipo); ?></dd>
                      </dl>
                    </div>
                <?php
                    }
                ?>
                  </div>
                  <div class="box-footer">
                    <form action="UserEditProfileObj.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $comp->id; ?>"/>
                      <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat btn-block"><i class="fa fa-edit"></i> Editar informações pessoais</button>
                    </form>
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
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

  </body>
</html>
