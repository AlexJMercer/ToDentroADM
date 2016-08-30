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
          <h1>Notícias</h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Notícias</h3>
                </div><!-- /.box-header -->
                  <?php

                     $id = $_POST["id"];

                     if (isset($_POST["exibir"]))
                     {
                        $exib = new Noticias();
                        $comp = $exib->ShowNoticias($id);
                        /*echo "<pre>";
                        var_dump($comp);
                        echo "</pre>";*/
                        if ($exib != null)
                        {
                  ?>
                <div class="box-body">
                  <div class="form-group">
                    <div class="col-sm-7">
                      <h1><?php echo $comp->titulo; ?></h1>
                      <h4><?php echo $comp->linha_apoio; ?></h4>
                      <?php echo $comp->texto; ?>
                      <br>
                      <dl>
                        <dt>Escrito por:</dt>
                        <dd><?php echo $comp->autor; ?></dd>
                        <dt>Data e hora:</dt>
                        <dd><?php
                                 echo date('d/m/Y', strtotime($comp->data));
                                 echo " - ";
                                 echo date('H:i', strtotime($comp->hora));
                            ?></dd>
                        <dt>Categorias:</dt>
                        <dd><?php
                                 $label = new Categorias();
                                 $label->labelCategorias($comp->categoria);
                        ?></dd>
                        <dt>Status:</dt>
                        <dd><?php $badge = new Select();
                                  $badge->labelStatus($comp->status);  ?></dd>
                        <dt>URL do site:</dt>
                        <dd> <a href="<?php echo $comp->url; ?>"><?php echo $comp->url; ?></a> </dd>
                      </dl>
                    </div>
                    <div class="col-sm-5" style="align: center;">
                      <br>
                      <img class="img-responsive-pad " src="<?php echo $comp->imagem; ?>" alt="Imagem" width="100%" height="100%" />
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                          <a href="javascript:history.back()" class="btn bg-maroon btn-flat btn-block"> <i class="fa fa-list"></i> Retornar para lista</a>
                          <!--button type="submit" name="retornar" value="retornar"  formaction="ViewNoticiasObj.php"> </button-->
                        </div>
                        <br>
                        <form action="EditNoticiaObj.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="col-sm-6">
                          <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat btn-block"><i class="fa fa-edit"></i> Editar </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><!-- /.box -->
            <?php
                }
              }
            ?>
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/select2.full.min.js"></script>

  </body>
</html>
