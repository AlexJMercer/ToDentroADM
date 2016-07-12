<?php
/**
 *
 */

include_once 'Carrega.class.php';

  class Class
  {
    private $;
    private $;
    private $;
    private $;
    private $bd;

    function __construct()
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

    public function InserirClass()
    {
      # code...
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
      
    }

  }

?>
