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
    	<form name='form_atividade' action='/editar-dados' method='POST'>
    		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    		<input type="hidden" name="id_atividade" value="{{$atividade[0]->ID}}" />
	    	<div class='container'>
	    		<div class='panel panel-default'>
	    			<div class='panel-heading col-md-12'>
	    				<div class='col-md-4'>
	    					<img src="{!! asset('imagens/duosystem_logo.png') !!}">
	    				</div>
	    				<div class='col-md-8'>
	    					<h2>EDITAR ATIVIDADE</h2>
    					</div>
    				</div>
	    			<div class='panel-body'>
	    				<div class='form-group'>
	    					<label>Nome:</label>
	    					<input type="text" name='nome' id='nome' value='{{$atividade[0]->NOME}}' class='form-control' maxlength="255" required>
	    				</div>	
	    				<div class='form-group'>
	    					<label>Descri&ccedil;&atilde;o:</label>
	    					<input type="text" name='descricao' id='descricao' value="{{$atividade[0]->DESCRICAO}}" class='form-control' maxlength="600" required>
	    				</div>
	    				<div class='form-group'>
    						<label>Data In&iacute;cio:</label>
    						<input type="date" name='data_inicio' id='data_inicio' value='{{$atividade[0]->DATA_INICIO}}' class='form-control' required>		
    					</div>
	    				<div class='form-group'>
	    					<label>Data Fim:</label>
		    				<input type="date" name='data_fim' id='data_fim' value='{{$atividade[0]->DATA_FIM}}' class='form-control' required>
	    				</div>
	    				<div class='form-group'>
	    					<label>Status:</label>
		    				<select name="status" id="status" class="form-control" required>
						    	<option selected>Selecione...</option>
						    	@foreach($resultado as $status)
						    		@if($status->ID == $atividade[0]->ID_STATUS)
						    			{{$selected = 'selected'}};
						    		@else
						    			{{$selected = ''}};
						    		@endif 
						    	
						    		<option value='{{$status->ID}}' {{$selected}}>{{$status->DESCRICAO}}</option>
						    	@endforeach	
					    	</select>
	    				</div>
	    				<div class='form-group'>
		    				<label>Situa&ccedil;&atilde;o:</label><br>
	    					<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="ATIVO" required @if($atividade[0]->SITUACAO == 'ATIVO') checked @endif>Ativo</label>
							</div>
							<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="INATIVO" @if($atividade[0]->SITUACAO == 'INATIVO') checked @endif>Inativo</label>
							</div>
	    				</div>
	    				<div class='form-group'>
	    					<input type="submit" name='editar' id='editar' value='Editar' class="btn btn-primary">
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
    	</form>
    </body>
</html>
@if($atividade[0]->ID_STATUS == 4)
	<script>
		$('#editar').prop('disabled',true);
	</script>
@endif