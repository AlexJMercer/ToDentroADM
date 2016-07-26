<?php
   include_once 'Carrega.class.php';
   /**
    * Editado dia 29/07/2015
    */
   class Usuarios
   {
      private $id;
      private $nome;
      private $email;
      private $senha;
      private $bd;
      private $tipo;
      //private $inSession = true;

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

      public function InserirUsuarios()
      {
         $sql    = "INSERT INTO usuarios (nome, email, senha, type_id) VALUES ('$this->nome', '$this->email', '$this->senha', '$this->tipo')";
         $return = pg_query($sql);
         return $return;
      }

      public function ListarUsuarios()
      {
         $sql    = "SELECT * FROM usuarios, usertype WHERE usuarios.type_id = usertype.id_type ORDER BY usuarios.id_user";
         $result = pg_query($sql);
         $return = null;

         while ($reg = pg_fetch_assoc($result))
         {
            $object       = new Usuarios();
            $object->id   = $reg["id_user"];
            $object->nome = $reg["nome"];
            $object->tipo = $reg["type"];

            $return[] = $object;
         }
         return $return;
      }

      public function ExcluirUsuarios()
      {
         $sql    = "DELETE FROM usuarios WHERE id_user = $this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function AtualizarUsuarios()
      {
         $return = false;
         $sql    = "UPDATE usuarios
                      SET nome  ='$this->nome',
                          email ='$this->email',
                          senha ='$this->senha',
                          type  ='$this->type'
                      WHERE id  = $this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function ExibirUsuarios($id = "")
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id AND usuarios.id=$id ";
         $result = pg_query($sql);
         $return = null;
         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->id = $reg["id"];
            $object->nome = $reg["nome"];
            $object->email = $reg["email"];
            $object->type = $reg["type"];
            $object->login = $reg['login'];
            $return = $object;
         }
         return $return;
      }

      public function EditarUsuarios($id = "")
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id AND usuarios.id=$id ";
         $result = pg_query($sql);
         $return = null;
         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->id = $reg["id"];
            $object->nome = $reg["nome"];
            $object->email = $reg["email"];
            $object->type = $reg["usertype"];
            $object->login = $reg['login'];
            $return = $object;
         }
         return $return;
      }

      public function editPermissionsUser($id='')
      {
        $sql    = "SELECT * FROM usuarios, usertype WHERE usuarios.type_id =usertype.id_type AND usuarios.id_user=$id";
        $result = pg_query($sql);
        $return = null;

        while ($reg = pg_fetch_assoc($result))
        {
           $object        = new Usuarios();
           $object->id    = $reg["id_user"];
           $object->nome  = $reg["nome"];
           $object->email = $reg['email'];
           $object->tipo  = $reg["type"];

           $return = $object;
        }
        return $return;
      }

      public function newUserPermission($email)
      {
        /*$sql_user_id = "SELECT CURRVAL('usuarios_id_user_seq')";
        $busca       = pg_query($sql_user_id);
        $id_user     = pg_fetch_array($busca);
        $this->id    = $id_user[0];*/

        $sql       = "SELECT * FROM usuarios, usertype WHERE usuarios.type_id =usertype.id_type AND usuarios.email='$email'";
        $resultado = pg_query($sql);
        $retorno   = null;

        while ($reg = pg_fetch_assoc($resultado))
        {
          $object        = new Usuarios();
          $object->id    = $reg["id_user"];
          $object->nome  = $reg["nome"];
          $object->email = $reg["email"];
          $object->tipo  = $reg["type"];

          $retorno = $object;
        }
        return $retorno;
      }

      public function ListUserPermission($id)
      {
        /*$sql_user_id = "SELECT CURRVAL('usuarios_id_user_seq')";
        $busca       = pg_query($sql_user_id);
        $id_user     = pg_fetch_array($busca);
        $this->id    = $id_user[0];*/

        $sql       = "SELECT * FROM usuarios, usertype WHERE usuarios.type_id =usertype.id_type AND usuarios.id_user='$id'";
        $resultado = pg_query($sql);
        $retorno   = null;

        while ($reg = pg_fetch_assoc($resultado))
        {
          $object        = new Usuarios();
          $object->id    = $reg["id_user"];
          $object->nome  = $reg["nome"];
          $object->email = $reg["email"];
          $object->tipo  = $reg["type"];

          $retorno = $object;
        }
        return $retorno;
      }
}
?>
