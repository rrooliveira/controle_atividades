<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Atividades</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    	<div class='container'>
    		<div class='panel panel-default'>
	    		<div class='panel-heading col-md-12'>
	    			<div class='col-md-4'>
	    				<img src="{!! asset('imagens/duosystem_logo.png') !!}">
	    			</div>
	    			<div class='col-md-8'>
	    				<h2>LISTA DE ATIVIDADES</h2>
    				</div>
    			</div>
	    		<div class='panel-body'>
	    			<div class='form-group'>
	    				<label>Status:</label>
		    			<select name="status" id="status" class="form-control">
						   	<option value='ALL' selected>Selecione...</option>
						   	@foreach($infoStatus as $status)					   	
						   		<option value='{{$status->ID}}'>{{$status->DESCRICAO}}</option>
						   	@endforeach	
					    </select>
	    			</div>
	    			<div class='form-group'>
	    				<div class='form-group'>
		    				<label>Situa&ccedil;&atilde;o:</label><br>
		    				<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="ALL" checked>Todos</label>
							</div>
	    					<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="ATIVO">Ativo</label>
							</div>
							<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="INATIVO">Inativo</label>
							</div>
	    				</div>
	    			</div>
		     		<div class='form-group'>
				    	<table width='100%' id="tbl_atividade" class='table table-striped'>
				    		<thead>
				    			<tr>
					    			<th>ID</th>
					    			<th>NOME</th>
					    			<th>DESCRI&Ccedil;&Atilde;O</th>
					    			<th>DATA IN&Iacute;CIO</th>
					    			<th>DATA FIM</th>
					    			<th>STATUS</th>
					    			<th>SITUACAO</th>
					    			<th>EDITAR</th>
				    			</tr>
				    		</thead>
				    		<tbody>
				    				{!! html_entity_decode($atividades) !!}	    				
				    		</tbody>
				    	</table>
			    	</div>
			    	<div class='form-group'>
		    			<a href="/cadastrar"><input type="button" name='cadastrar' value='+ Incluir Nova Atividade' class="btn btn-primary"></a>
		    		</div>
    			</div>
	    		<div class='panel-footer'>
    				<article>
					  <p><img alt="Desenvolvedor" src="{!! asset('imagens/desenvolvedor.png') !!}"><strong> Rodrigo Ruy Oliveira</strong></p>
					  <p><img alt="Contato" src="{!! asset('imagens/whats.png') !!}"><strong> +55 11 98209-5120</strong></p>
					  <p><img alt="Gmail" src="{!! asset('imagens/gmail.png') !!}"> <a href="mailto:rro.oliveira@gmail.com?Subject=Contato"> rro.oliveira@gmail.com</a></p>
					  <p><img alt="Skype" src="{!! asset('imagens/skype.png') !!}"> <strong>rodrigo.ruy.oliveira</strong></p>
					  <p><a href="https://github.com/rrooliveira/"><img alt="Repositório Git" src="{!! asset('imagens/git.png') !!}"><strong> Reposit&oacute;rio Github</strong></a></p>
					</article>
    			</div>
    		</div>
    	</div>
    </body>
</html>
<script>
$(document).ready(function(){
	$('#status').change(function(){
		var status = $("#status").val();
		var situacao = $("#situacao:checked").val();
		
		$.get('/listagem-filtrada/'+status+'/'+situacao, function(response){
			$('#tbl_atividade tbody').html(response);
		});
	});

	$('input[type=radio][name=situacao]').change(function(){
		var status = $("#status").val();
		var situacao = $("#situacao:checked").val();
		
		$.get('/listagem-filtrada/'+status+'/'+situacao, function(response){
			$('#tbl_atividade tbody').html(response);
		});
	});
});
</script>