<?php
//Nomes dos métodos/funções

?>
<a class="btn btn-primary btn-flat pull-right" href="Obj.php"><i class="fa fa-plus"></i>   Cadastrar  </a>
<a class="btn btn-info btn-flat pull-right" href="ViewObj.php" title="Atualizar resultados" data-toggle="tooltip" data-placement="left"><i class="fa fa-refresh"></i></a>
<i class="fa fa-check"></i>
<i class="fa fa-magic"></i>
<button type="button" name="cancelar" value="cancelar" onclick="location.href='ViewObj.php'" class="btn btn-default btn-flat btn-block btn-sm"><i class="fa fa-times"></i> Cancelar </button>
<!-- Toast -->
<link rel="stylesheet" href="../../plugins/toastr/jquery.toast.css" type="text/css">
<!-- Toast -->
<script src="../../plugins/toastr/jquery.toast.js"></script>
<?php
        }
      }
      else
      {
?>
        <tr class="odd gradeX">
          <td>
            <?php  echo "<h2> Nada cadastrado!!</h2>"; ?>
          </td>
        </tr>
<?php
      }
?>
--------------------------------------------------------------------------------------
<?php
        }
      }
      else
      {
?>
<tr class="odd gradeX">
  <td>
    <p> Nada cadastrado!!</p>
  </td>
  <td>

    <button type="button" class="btn btn-flat btn-warning" disabled><i class="fa fa-edit"></i> Editar </button>

    <button type="button" class='btn btn-flat btn-danger' disabled><i class="fa fa-times"></i> Excluir </button>
  </td>
</tr>
<?php
      }

?>
http://jsfiddle.net/RtH3K/1/
