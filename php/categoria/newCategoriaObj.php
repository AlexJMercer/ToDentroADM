<form id="formcat">
<div class="form-group">
   <label for="categoria" class="col-sm-2 control-label">Categoria:</label>
   <div class="col-sm-8">
        <input type="text" class="form-control" name="new" placeholder="Digite a categoria aqui" autofocus data-toggle="tooltip" title="Campo Obrigatório!" required>
   </div>
   <div class="col-sm-2">
      <button class="btn btn-success btn-flat" type="submit" name="cadastrar" value="cadastrar" style="width:100%;"><i class="fa fa-check"></i> Cadastrar </button>
   </div>
</div>
</form>
<div id="resposta"></div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#formcat').submit(function(){
			var dados = jQuery( this ).serialize();
			jQuery.ajax(
      {
				type: "POST",
				url: "../categoria/CadCategoria.php",
				data: dados,
            success: function (data)
            {
               jQuery('#resposta').html(data);

               atualiza();

               function atualiza()
               {
                  jQuery.get('../categoria/listagem_categorias_multiple.php', function (resultado){
                     jQuery('#listagemCategorias').html(resultado);
                  })
               }
            }
         });
         return false;
      });
   });
</script>
