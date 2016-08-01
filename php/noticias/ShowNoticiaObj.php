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
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Notícias</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                  <?php

                     $id = $_POST["id"];

                     if (isset($_POST["exibir"]))
                     {
                        $exib = new Noticias();
                        $comp = $exib->ShowNoticias($id);

                        if ($exib != null)
                        {
                  ?>
                <div class="box-body">
                  <div class="form-group">
                    <div class="col-sm-7">
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
                      </dl>
                    </div>
                    <div class="col-sm-5" style="align: center;">
                      <br>
                      <img class="img-responsive-pad " src="<?php echo $comp->imagem; ?>" alt="Imagem" width="100%" height="100%" />
                    </div>
                    <br>
                    <form action="EditNoticiaObj.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                      <div class="col-sm-6">
                        <button type="submit" name="retornar" value="retornar" class="btn bg-maroon btn-flat btn-block" formaction="ViewNoticiasObj.php"><i class="fa fa-edit"></i> Retornar para lista </button>
                      </div>
                      <br>
                      <div class="col-sm-6">
                        <button type="submit" name="editar" value="editar" class="btn btn-warning btn-flat btn-block"><i class="fa fa-edit"></i> Editar </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div><!-- /.box -->
              <div class="box box-info collapsed-box">
                <div class="box-header with-border">
                  <h3 class="box-title">Informações cadastradas</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">
                    <dt>Titulo:</dt>
                    <dd><?php echo $comp->titulo; ?></dd>
                    <dt>Linha de apoio:</dt>
                    <dd><?php echo $comp->linha_apoio; ?></dd>
                    <dt>Status:</dt>
                    <dd><?php echo $comp->status; ?></dd>
                    <dt>URL do site:</dt>
                    <dd> <a href="<?php echo $comp->url; ?>"><?php echo $comp->url; ?></a> </dd>
                  </dl>
                </div><!-- /.box-body -->
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

    <script type="text/javascript">
    $(function()
    {
      $(".select2").select2();
    });

    $(window).load(function()
    {
        $('#myModal').modal('show');
    });
    </script>
  </body>
</html>
