<?php
include_once "../../class/Carrega.class.php";
ini_set('session.save_path', '../tmp');

session_start();
?>
<label for="categoria" class="col-sm-2 control-label">Categorias da noticia:</label>
  <div class="col-sm-8">
    <span data-toggle="tooltip" title="Campo Obrigatório!">
      <select class="form-control select2" id="categoria" name="categoria" placeholder="Selecione a(s) categoria(s)" style="width:100%;" required>
        <option value=""></option>
        <?php
          $catSelect = new Select();
          $catSelect->categoriaMultiSelected($_SESSION['categoria_edit']);
          ?>
        </select>
   </span>
  </div>
  <script type="text/javascript">
   $(document).ready(function(){
      $("#categoria").select2({
        placeholder:"Selecione a categoria"
      });
   });
  </script>
