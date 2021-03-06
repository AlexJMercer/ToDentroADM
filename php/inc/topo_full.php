<header class="main-header">
  <!-- Logo -->
  <a href="../index/index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b><b>D</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b> Tô </b><b> Dentro </b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php

                $ShowAval = new Select();
                $number   = $ShowAval->ShowAvaliacao();

                if($number != null)
                {
            ?>
            <i class="fa fa-warning"></i>
            <span class="label label-danger"><?php echo $number->total;?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header"> <i class="fa fa-warning text-red"></i> <?php echo $number->total;?> itens estão sob avaliação!</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="../noticias/ViewNoticiasByStatusObj.php">
                    <i class="fa fa-newspaper-o text-red"></i><?php echo $number->noticia;?> Notícias para avaliação!
                  </a>
                </li>
                <li>
                  <a href="../eventos/ViewEventosByStatusObj.php">
                    <i class="fa fa-rocket text-red"></i><?php echo $number->evento;?> Eventos para avaliação!
                  </a>
                </li>
                <li>
                  <a href="../estagios/ViewEstagiosByStatusObj.php">
                    <i class="fa fa-file-text-o text-red"></i><?php echo $number->estagio;?> Estágios para avaliação!
                  </a>
                </li>
                <li>
                  <a href="../monitorias/ViewMonitoriasByStatusObj.php">
                    <i class="fa fa-laptop text-red"></i><?php echo $number->monitoria;?> Monitorias para avaliação!
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <?php
              }
          ?>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" data-toggle="modal" data-target="#notificacao">
            <i class="glyphicon glyphicon-phone fa-1x"></i>
            <span class="hidden-xs"> Enviar notificações </span>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../../dist/img/LogoIFSul.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['nome']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="../../dist/img/LogoIFSul.png" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['nome']; ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="form-group">
                  <a href="../usuarios/UsersProfileObj.php" class="btn btn-primary btn-flat btn-block"><i class="fa fa-user"></i> Informações pessoais </a>
                </div>
                <form action="../index/logout.php" method="post">
                  <div class="form-group">
                    <button type="submit" name="logout" value="logout" class="btn btn-danger btn-flat btn-block"><i class="fa fa-sign-out"></i>  Sair </button>
                  </div>
                </form>
            </li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" data-toggle="modal" title="Informações básicas" data-target="#info">
            <i class="fa fa-info fa-1x"></i>
          </a>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!--li class="dropdown user user-menu">
         <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i>
         <span class="hidden-xs"> Temas </span></a>
       </li-->
      </ul>
    </div>
  </nav>
</header>

<div class="modal fade" id="notificacao" tabindex="0" role="dialog" aria-labelledby="notificacaoLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title">Enviar notificações</h4>
     </div>
     <div class="modal-body">
       <form class="form-horizontal" action="../notificacoes/CrudNotificacoes.php" method="post">
        <div class="form-group">
           <label for="titulo" class="col-sm-2 control-label">Título:</label>
           <div class="col-sm-10">
             <input type="text" class="form-control" name="titulo" id="titulo" data-toggle="tooltip" title="Campo Obrigatório!" required>
           </div>
           <br>
       </div>
       <div class="form-group">
          <label for="texto" class="col-sm-2 control-label">Texto:</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="texto" id="texto" rows="8" cols="40" data-toggle="tooltip" title="Campo Obrigatório!" required></textarea>
          </div>
      </div>
      <div class="form-group">
         <label for="notificar" class="col-sm-2 control-label">Notificar aplicativo:</label>
         <div class="col-sm-10">
           <div class="checkbox">
             <label>
               <input type="checkbox"  name="notificar" value="notificar">
                  Enviar notificação!
             </label>
           </div>
         </div>
      </div>
     </div>
     <div class="modal-footer">
       <button type="submit" name='enviar' value='enviar' class="btn btn-success btn-flat btn-block"><i class="fa fa-search"></i>  Enviar </button>
       <button type="reset" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-magic"></i> Limpar </button>
       </form>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="info" tabindex="0" role="dialog" aria-labelledby="infoLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title">Informações</h4>
     </div>
     <div class="modal-body">
       <dl>
         <dt>Campos Obrigatórios:</dt>
         <dd>Todos os campos de preenchimento obrigatórios apresentam o comportamento, demonstrado no exemplo abaixo, ao se sobrepor o cursor sobre o campo.</dd>
         <dd><input type="text" name="name" class="form-control" placeholder="Exemplo de campo obrigatório" data-toggle="tooltip" title="Campo Obrigatório!"></dd>
         <br>
         <dt>Imagens:</dt>
         <dd>Todas as imagens cadastradas no sistema, devem estar com os seguintes parâmetros.</dd>
         <dd>Formato de imagem suportados:</dd>
         <dd class="text-muted"><i>.png, .jpg, .gif</i></dd>
         <dd>Tamanho máximo da imagem:</dd>
         <dd class="text-muted"><i>500KB</i></dd>
         <dd>Largura e altura da imagem:</dd>
         <dd>Notícias:</dd>
         <dd class="text-muted"><i>Largura máxima: 400px</i></dd>
         <dd class="text-muted"><i>Altura máxima: 200px</i></dd>
         <dd>Eventos e Cursos:</dd>
         <dd class="text-muted"><i>Largura máxima: 300px</i></dd>
         <dd class="text-muted"><i>Altura máxima: 180px</i></dd>
       </dl>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-dafault btn-block btn-flat" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span><i class="fa fa-times"></i> Fechar</button>
     </div>
   </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
