<?php

if ($_SESSION['tipo_usuario']==2)
{
    if(empty($_SESSION['permissao_id']) && empty($_SESSION['perm_noticias']) && empty($_SESSION['perm_cardapios']) &&
       empty($_SESSION['perm_cursos']) && empty($_SESSION['perm_monitorias']) && empty($_SESSION['perm_estagios']) &&
       empty($_SESSION['perm_eventos']) && empty($_SESSION['perm_categorias']) && empty($_SESSION['perm_locais']) &&
       empty($_SESSION['perm_assistencias']) && empty($_SESSION['perm_setores']))
    {
       header('Location:../index/erro_permission.php');

    }
}

?>
