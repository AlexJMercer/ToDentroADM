<?php

include_once "../../class/Carrega.class.php";

include "../Session.php";
?>
<?php

    $id = $_POST["id"];
    if (isset($_POST["permissions"]))
    {

      $exib = new Usuarios();
      $comp = $exib->ListUserInfo($id);
      //print_r($_SESSION);
      $load       = new Permissions();
      $permission = $load->LoadIdPermission($id);

      if ($permission != null)
      {
        $edit  = new Permissions();
        $dados = $edit->EditarPermissions($id);
      }
      else
      {
        $_SESSION['novo_usuario'] = $comp->email;
        header('Location:UsersPermissionsObj.php');
        exit;
      }

      if ($dados != NULL AND $comp != NULL)
      {
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
                  <div class="box-body">
                    <div class="form-group">
                      <dl class="dl-horizontal">
                        <dt>Nome:</dt>
                        <dd><?php echo $comp->nome; ?></dd>
                        <dt>E-mail:</dt>
                        <dd><?php echo $comp->email; ?></dd>
                        <dt>Tipo de usuário:</dt>
                        <dd><?php $type = new Select();
                                  $type->labelType($comp->tipo);?></dd>
                      </dl>
                    </div>
                      <div class="col-sm-12">
                        <div class="box box-success">
                          <div class="box-header with-border">
                            <h3 class="box-title">Permissões de acesso</h3>
                          </div><!-- /.box-header -->
                            <form class="form-horizontal" action="CrudPermissions.php" method="post">
                              <div class="box-body">
                                <div class="form-group">
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->noticias != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="noticias" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="noticias" value="Permitido">';
                                       }
                                     ?>
                                    <label> Notícias </label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->cardapios != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="cardapios" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="cardapios" value="Permitido">';
                                       }
                                     ?>
                                    <label> Cardápios </label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->cursos != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="cursos" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="cursos" value="Permitido">';
                                       }
                                     ?>
                                    <label> Cursos </label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->monitorias != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="monitorias" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="monitorias" value="Permitido">';
                                       }
                                     ?>
                                    <label>Monitorias</label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->estagios != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="estagios" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="estagios" value="Permitido">';
                                       }
                                     ?>
                                    <label>Estágios</label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->eventos != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="eventos"  value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="eventos" value="Permitido">';
                                       }
                                     ?>
                                    <label>Eventos</label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->categorias != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="categorias" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="categorias" value="Permitido">';
                                       }
                                     ?>
                                    <label>Categorias</label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->locais != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="locais" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="locais" value="Permitido">';
                                       }
                                     ?>
                                    <label>Locais</label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->assistencias != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="assistencias" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="assistencias" value="Permitido">';
                                       }
                                     ?>
                                    <label> Assistência Estudantil </label>
                                  </div>
                                  <div class="col-sm-3">
                                     <?php
                                       if ($dados->setores != null)
                                       {
                                          echo '<input class="icheck" type="checkbox" name="setores" value="Permitido" checked>';
                                       }
                                       else
                                       {
                                          echo '<input class="icheck" type="checkbox" name="setores" value="Permitido">';
                                       }
                                     ?>
                                    <label>Setores</label>
                                  </div>
                                </div>
                              </div><!-- /.box-body -->
                              <div class="box-footer">
                                  <input type="hidden" name="usuario" value="<?php echo $comp->id; ?>"/>
                                  <input type="hidden" name="id" value="<?php echo $dados->id; ?>">
                                  <button type="submit" name="atualizar" value="atualizar" class="btn btn-success btn-flat btn-block"><i class="fa fa-check"></i> Atualizar </button>

                                  <button type="button" name="voltar" value="voltar" onclick="location.href='ViewUsersObj.php'" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-undo"></i> Voltar </button>
                              </div><!-- /.box-footer -->

                            <?php
                                }
                                elseif ($exib == null)
                                {
                                  header('Location:ViewUsersObj.php');
                                  exit;
                                }
                              }
                            ?>
                        </div><!-- /.box -->
                      </div>
                    </div>
                    <div class="box-footer">
                      <button type="submit" formaction="CrudPermissions.php" name="excluir" value="excluir" class="btn btn-danger btn-flat btn-block"><i class="fa fa-times"></i> Excluir permissões</button>
                    </div>
                    </form>
                  </div>
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

    <script type="text/javascript">
    $(document).ready(function(){
      $('input.icheck').each(function(){
        var self = $(this),
        label = self.next(),
        label_text = label.text();

        label.remove();
        self.iCheck({
          checkboxClass: 'icheckbox_line-green',
          insert: '<div class="icheck_line-icon"></div>' + label_text
    });
  });
});
    </script>
  </body>
</html>
