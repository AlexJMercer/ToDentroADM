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
      <?php
            include '../inc/topotime.php';
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
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Monitorias</h3>
                </div><!-- /.box-header -->
<?php

  $id    = $_POST["id"];
  $curso = $_POST['curso'];

  if (isset($_POST["exibir"]))
  {
    $exib = new Monitorias();
    $comp = $exib->ShowMonitoria($id);

    if ($exib != null)
    {
?>
                <div class="box-body">
                  <div class="form-group">
                    <dl class="dl-horizontal">
                      <dt>Curso:</dt>
                      <dd><?php echo $comp->curso; ?></dd>
                      <dt>Disciplina:</dt>
                      <dd><?php echo $comp->disciplina; ?></dd>
                      <dt>Semestre:</dt>
                      <dd><?php echo $comp->semestre; ?></dd>
                      <dt>Local:</dt>
                      <dd><?php echo $comp->sala; ?></dd>
                      <dt>Informações:</dt>
                      <dd> <textarea class="form-control"  rows="8" cols="40" disabled><?php echo $comp->info; ?></textarea></dd>
                    </dl>
                    <form action="EditMonitoriasObj.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                      <input type="hidden" name="curso" value="<?php echo $curso; ?>">
                      <div class="col-sm-6">
                        <button type="submit" name="retornar" value="retornar" class="btn bg-maroon btn-flat btn-block margin" formaction="ViewMonitoriasObj.php"><i class="fa fa-edit"></i> Retornar para lista </button>
                      </div>
                      <div class="col-sm-6">
                        <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat btn-block margin"><i class="fa fa-edit"></i> Editar </button>
                      </div>
                    </form>
                  </div>
                </div>
<?php
    }
  }
?>
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
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>

    </script>
  </body>
</html>
