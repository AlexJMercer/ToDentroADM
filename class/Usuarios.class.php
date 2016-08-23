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
         $sql    = "SELECT * FROM usuarios ORDER BY usuarios.id_user";
         $resultado = pg_query($sql);
         $return = null;

         while ($registro = pg_fetch_assoc($resultado))
         {
            $object       = new Usuarios();
            $object->id   = $registro["id_user"];
            $object->nome = $registro["nome"];
            $object->tipo = $registro["type_id"];

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
                          type_id  ='$this->tipo'
                      WHERE id_user  = $this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function ExibirUsuarios($id = "")
      {
         $sql       = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype =usertype.id AND usuarios.id =$id ";
         $resultado = pg_query($sql);
         $return    = null;
         while ($registro = pg_fetch_assoc($resultado))
         {
            $object        = new Usuarios();
            $object->id    = $registro["id"];
            $object->nome  = $registro["nome"];
            $object->email = $registro["email"];
            $object->type  = $registro["type"];

            $return = $object;
         }
         return $return;
      }

      public function EditarUsuarios($id = "")
      {
         $sql       = "SELECT * FROM usuarios WHERE usuarios.id_user =$id ";
         $resultado = pg_query($sql);
         $return    = null;

         while ($registro = pg_fetch_assoc($resultado))
         {
            $object        = new Usuarios();
            $object->id    = $registro["id_user"];
            $object->nome  = $registro["nome"];
            $object->email = $registro["email"];
            $object->tipo  = $registro["type_id"];
            $object->senha = $registro["senha"];

            $return = $object;
         }
         return $return;
      }

      public function EditPermissionsUser($id='')
      {
        $sql    = "SELECT * FROM usuarios WHERE usuarios.id_user=$id";
        $resultado = pg_query($sql);
        $return = null;

        while ($registro = pg_fetch_assoc($resultado))
        {
           $object        = new Usuarios();
           $object->id    = $registro["id_user"];
           $object->nome  = $registro["nome"];
           $object->email = $registro["email"];
           $object->tipo  = $registro["type_id"];

           $return = $object;
        }
        return $return;
      }

      public function NewUserPermission($email)
      {
        /*$sql_user_id = "SELECT CURRVAL('usuarios_id_user_seq')";
        $busca       = pg_query($sql_user_id);
        $id_user     = pg_fetch_array($busca);
        $this->id    = $id_user[0];*/

        $sql       = "SELECT * FROM usuarios WHERE usuarios.email='$email'";
        $resultadoado = pg_query($sql);
        $retorno   = null;

        while ($registro = pg_fetch_assoc($resultadoado))
        {
          $object        = new Usuarios();
          $object->id    = $registro["id_user"];
          $object->nome  = $registro["nome"];
          $object->email = $registro["email"];
          $object->tipo  = $registro["type_id"];

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

        $sql       = "SELECT * FROM usuarios WHERE usuarios.id_user='$id'";
        $resultadoado = pg_query($sql);
        $retorno   = null;

        while ($registro = pg_fetch_assoc($resultadoado))
        {
          $object        = new Usuarios();
          $object->id    = $registro["id_user"];
          $object->nome  = $registro["nome"];
          $object->email = $registro["email"];
          $object->tipo  = $registro["type_id"];

          $retorno = $object;
        }
        return $retorno;
      }
}
?>
