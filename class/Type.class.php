<?php
include_once 'Carrega.class.php';

/**
 *
 */

class Type
{
   private $id;
   private $type;
   private $bd;

   public function __construct()
   {
      $this->bd = new BD();
   }

   public function __destruct()
   {
      unset($this->bd);
   }


   function __get($key)
   {
     return $this->$key;
   }

   function __set($key, $value)
   {
     $this->$key = $value;
   }

}
?>
