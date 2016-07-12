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

      public function inserir()
      {
         $sql    = "INSERT INTO usuarios (nome, email, senha, type_id) VALUES ('$this->nome', '$this->email', '$this->senha', '$this->tipo')";
         $return = pg_query($sql);
         return $return;
      }

      public function listarUsuarios()
      {
         $sql    = "SELECT * FROM usuarios, usertype WHERE usuarios.type_id =usertype.id_type Order by usuarios.id_user";
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

      public function excluir()
      {
         $sql    = "DELETE from usuarios where id_user =$this->id";
         $return = pg_query($sql);
         return $return;
      }

      public function atualizar()
      {
         $return = false;
         $sql = "UPDATE usuarios
                  set nome='$this->nome',
                      email='$this->email',
                      senha='$this->senha',
                      type='$this->type',
                      login='$this->login'
                  where id=$this->cod";
         $return = pg_query($sql);
         return $return;
      }

      public function exibir($cod = "")
      {
         $sql = "SELECT * FROM usuarios, usertype WHERE usuarios.usertype=usertype.id AND usuarios.id=$cod ";
         $result = pg_query($sql);
         $return = null;
         while ($reg = pg_fetch_assoc($result))
         {
            $object = new Usuarios();
            $object->cod = $reg["id"];
            $object->nome = $reg["nome"];
            $object->email = $reg["email"];
            $object->type = $reg["type"];
            $object->login = $reg['login'];
            $return = $object;
         }
         return $return;
      }

      public function editar($id = "")
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

      public function codificaSenha($senha)
      {
          // Teste codificação
          // Altere aqui caso você use, por exemplo, o MD5:
          // return md5($senha);
         return sha1($senha);
      }

      public function logar($login="", $senha="")
      {
         //$senha = $this->codificaSenha($senha);
         $sql = "SELECT * FROM usuarios WHERE usuarios.email='$login' AND usuarios.senha='$senha' AND usuarios.usertype='$type'";
         $result = pg_query($sql);
         $cont=pg_num_rows($result);
         //$return= NULL;
         if($cont=1){
            while ($reg = pg_fetch_assoc($result))
            {
            session_start();
            echo $result;
            header('location:../php/ViewCardapioObj.php');
            }
         }
         else
         {
            echo $result;die();
            header('location:index.php');
         }
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
}
?>
