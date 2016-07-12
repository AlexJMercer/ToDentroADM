<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Permissions
  {
    private $id;
    private $usuario;
    private $noticias;
    private $cardapios;
    private $cursos;
    private $categorias;
    private $locais;
    private $eventos;
    private $estagios;
    private $assistencias;
    private $monitorias;
    private $setores;
    private $bd;

    public function __construct()
    {
      $this->bd = new BD();
    }

    public function __destruct()
    {
       unset($this->bd);
    }

    public function __get($key)
    {
       return $this->$key;
    }

    public function __set($key, $value)
    {
       $this->$key = $value;
    }

    public function Inserir()
    {
      $sql       = "INSERT INTO permissaoteste (user_id, noticias, cardapios, cursos) VALUES ('$this->usuario', '$this->noticias', '$this->cardapios', '$this->cursos')";
      $resultado = pg_query($sql);
      return $resultado;
    }

    public function InserirPermissions()
    {
      $sql       = "INSERT INTO permissions (user_id, noticias, cardapios, cursos, monitorias, estagios, eventos, categorias, locais, assistencias, setores)
                          VALUES ('$this->usuario', '$this->noticias', '$this->cardapios', '$this->cursos', '$this->monitorias', '$this->estagios',
                                  '$this->eventos', '$this->categorias', '$this->locais', '$this->assistencias', '$this->setores')";
      $resultado = pg_query($sql);
      return $resultado;
    }

    public function Listar($value='')
    {
      # code...
    }

    public function Atualizar($value='')
    {
      # code...
    }

    public function Excluir($value='')
    {
      # code...
    }

    public function Editar($value='')
    {
      # code...
    }

    public function loadPermissionsTESTE($id)
    {
      $sql       = "SELECT * FROM permissaoteste pt WHERE pt.user_id = $id";
      $resultado = pg_query($sql);

        while ($registro = pg_fetch_assoc($resultado))
        {
          $_SESSION['permissao_id']   = $registro['id_perm'];
          $_SESSION['perm_noticias']  = $registro['noticias'];
          $_SESSION['perm_cardapios'] = $registro['cardapios'];
          $_SESSION['perm_cursos']    = $registro['cursos'];
        }
    }

    public function loadPermissions($id)
    {
      $sql       = "SELECT * FROM permissions p WHERE p.user_id = $id";
      $resultado = pg_query($sql);
      $num       = pg_num_rows($resultado);

      if ($num==1)
      {
        while ($registro = pg_fetch_assoc($resultado))
        {
          $_SESSION['permissao_id']      = $registro['id_perm'];
          $_SESSION['perm_noticias']     = $registro['noticias'];
          $_SESSION['perm_cardapios']    = $registro['cardapios'];
          $_SESSION['perm_cursos']       = $registro['cursos'];
          $_SESSION['perm_monitorias']   = $registro['monitorias'];
          $_SESSION['perm_estagios']     = $registro['estagios'];
          $_SESSION['perm_eventos']      = $registro['eventos'];
          $_SESSION['perm_categorias']   = $registro['categorias'];
          $_SESSION['perm_locais']       = $registro['locais'];
          $_SESSION['perm_assistencias'] = $registro['assistencias'];
          $_SESSION['perm_setores']      = $registro['setores'];
        }
        return $_SESSION;
      }
      else
      {
        header("Location:../index/erro_permission.php");
      }
    }


  }
?>
