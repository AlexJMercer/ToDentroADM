<form id="formali">
<div class="form-group">
   <label for="alimento" class="col-sm-2 control-label">Alimento:</label>
   <div class="col-sm-8">
        <input type="text" class="form-control" name="new" placeholder="Digite a alimento aqui" autofocus data-toggle="tooltip" title="Campo Obrigatório!" required>
   </div>
   <div class="col-sm-2">
      <button class="btn btn-success btn-flat" type="submit" name="cadastrar" value="cadastrar" style="width:100%;"><i class="fa fa-check"></i> Cadastrar </button>
   </div>
</div>
</form>
<div id="resposta"></div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#formali').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax(
      {
				type: "POST",
				url: "../alimentos/cadAlimentos.php",
				data: dados,
            success: function (data)
            {
               jQuery('#resposta').html(data);

               atualiza();

               function atualiza()
               {
                  jQuery.get('../alimentos/Listagem_Alimentos.php', function (resultado){
                     jQuery('#listagemAlimentos').html(resultado);
                  })
               }
            }
         });
         return false;
      });
   });
</script>
