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

    public function InserirPermissions()
    {
      $sql       = "INSERT INTO permissions (user_id, noticias, cardapios, cursos, monitorias, estagios, eventos, categorias, locais, assistencias, setores)
                          VALUES ('$this->usuario', '$this->noticias', '$this->cardapios', '$this->cursos', '$this->monitorias', '$this->estagios',
                                  '$this->eventos', '$this->categorias', '$this->locais', '$this->assistencias', '$this->setores')";
      $resultado = pg_query($sql);
      return $resultado;
    }

    public function AtualizarPermissions()
    {
      $sql    = "UPDATE permissions SET noticias = '$this->noticias',
                                        categorias ='$this->categorias',
                                        cardapios = '$this->cardapios',
                                        cursos = '$this->cursos',
                                        monitorias = '$this->monitorias',
                                        estagios = '$this->estagios',
                                        eventos = '$this->eventos',
                                        locais = '$this->locais',
                                        assistencias = '$this->assistencias',
                                        setores = '$this->setores'
                                        WHERE id_perm = $this->id";
      $return = pg_query($sql);
      return $return;
    }

    public function ExcluirPermissions()
    {
      $return = null;
      $sql    = "DELETE FROM permissions WHERE id_perm = $this->id";
      $return = pg_query($sql);
      return $return;
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

    public function LoadIdPermission($id='')
    {
      $sql       = "SELECT p.id_perm FROM permissions p WHERE p.user_id = $id";
      $resultado = pg_query($sql);
      $num       = pg_num_rows($resultado);
      $return    = NULL;

      if ($num==1)
      {
        while ($registro = pg_fetch_assoc($resultado))
        {
          $object               = new Permissions();
          $object->id           = $registro['id_perm'];

          $return = $object;
        }
      }
      return $return;
    }

    public function EditarPermissions($id='')
    {
      $sql       = "SELECT * FROM permissions p WHERE p.user_id = $id";
      $resultado = pg_query($sql);
      $num       = pg_num_rows($resultado);
      $return    = NULL;

      if ($num==1)
      {
        while ($registro = pg_fetch_assoc($resultado))
        {

          $object               = new Permissions();
          $object->id           = $registro['id_perm'];
          $object->usuario      = $registro['user_id'];
          $object->noticias     = $registro['noticias'];
          $object->cardapios    = $registro['cardapios'];
          $object->cursos       = $registro['cursos'];
          $object->monitorias   = $registro['monitorias'];
          $object->estagios     = $registro['estagios'];
          $object->eventos      = $registro['eventos'];
          $object->categorias   = $registro['categorias'];
          $object->locais       = $registro['locais'];
          $object->assistencias = $registro['assistencias'];
          $object->setores      = $registro['setores'];

          $return = $object;
        }
        return $return;
      }


    }

  }
?>
