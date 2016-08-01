<?php
include_once "../../class/Carrega.class.php";
session_start();
?>
<label for="alimentos" class="col-sm-2 control-label">Alimentos:</label>
<div class="col-sm-8">
  <select class="form-control select2" id="alimentos" name="alimento[]" multiple="multiple" style="width: 100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
    <option value=""></option>
    <?php $alimentoSelect = new Select();
          $alimentoSelect->alimentoSelect($_SESSION['alimento_edit']);
    ?>
  </select>
</div>
<script type="text/javascript">
 $(document).ready(function(){
    $(".select2").select2({
      placeholder:"Selecione o(s) alimento(s)"
    });
 });
</script>
