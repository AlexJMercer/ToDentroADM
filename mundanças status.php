<?php
if ($_SESSION['tipo_usuario']==3 || $_SESSION['tipo_usuario']==4)
{
?>

<div class="form-group">
  <label for="status" class="col-sm-2 control-label">Status:</label>
  <div class="col-sm-10">
    <select class="form-control select2" name="status" id="status" style="width:100%;" data-toggle="tooltip" title="Campo Obrigatório!" required>
      <option value=""></option>
      <?php
          $staSelect = new Select();
          $staSelect->statusSelect();
      ?>
    </select>
  </div>
</div>

<?php
}
else
{
?>
<div class="form-group">
  <label for="status" class="col-sm-2 control-label">Status:</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" value="SOB AVALIAÇÃO!" disabled>
    <input type="hidden" name="status" value="1">
  </div>
</div>
<?php
}
?>
