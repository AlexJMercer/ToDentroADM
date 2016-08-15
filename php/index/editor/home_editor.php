
  <?php
    if ($_SESSION['perm_noticias'] != null)
    {
      include 'noticia_home.php';
    }

    if ($_SESSION['perm_cardapios'] != null)
    {
      include 'cardapios_home.php';
    }

    if ($_SESSION['perm_monitorias'] != null)
    {
      include 'monitorias_home.php';
    }

    if ($_SESSION['perm_categorias'] != null)
    {
      include 'categorias_home.php';
    }

    if ($_SESSION['perm_eventos'] != null)
    {
      include 'eventos_home.php';
    }

    if ($_SESSION['perm_assistencias'] != null)
    {
      include 'assistencias_home.php';

    }
    
    if ($_SESSION['perm_cursos'] != null)
    {
      include 'cursos_home.php';
    }

    if ($_SESSION['perm_locais'] != null)
    {
      include 'locais_home.php';
    }

    if ($_SESSION['perm_estagios'] != null)
    {
      include 'estagios_home.php';
    }

    if ($_SESSION['perm_setores'] != null)
    {
      include 'setores_home.php';
    }

  ?>
