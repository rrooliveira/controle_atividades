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
    	<form name='form_atividade' action='/cadastrar-atividade' method='POST'>
    		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
	    	<div class='container'>
	    		<div class='panel panel-default'>
	    			<div class='panel-heading col-md-12'>
	    				<div class='col-md-4'>
	    					<img src="{!! asset('imagens/duosystem_logo.png') !!}">
	    				</div>
	    				<div class='col-md-8'>
	    					<h2>CADASTRO DE ATIVIDADES</h2>
    					</div>
    				</div>
	    			<div class='panel-body'>
	    				<div class='form-group'>
	    					<label>Nome:</label>
	    					<input type="text" name='nome' id='nome' class='form-control' placeholder="Nome da atividade" maxlength="255" required>
	    				</div>	
	    				<div class='form-group'>
	    					<label>Descri&ccedil;&atilde;o:</label>
	    					<input type="text" name='descricao' id='descricao' class='form-control' placeholder="Descri&ccedil;&atilde;o da atividade" maxlength="600" required>
	    				</div>
	    				<div class='form-group'>
    						<label>Data In&iacute;cio:</label>
    						<input type="date" name='data_inicio' id='data_inicio' class='form-control' required>		
    					</div>
	    				<div class='form-group'>
	    					<label>Data Fim:</label>
		    				<input type="date" name='data_fim' id='data_fim' class='form-control' required>
	    				</div>
	    				<div class='form-group'>
	    					<label>Status:</label>
		    				<select required name="status" id="status" class="form-control">
						    	<option value=''>Selecione...</option>
						    	@foreach($resultado as $status)
						    		<option value='{{$status->ID}}'>{{$status->DESCRICAO}}</option>
						    	@endforeach	
					    	</select>
	    				</div>
	    				<div class='form-group'>
		    				<label>Situa&ccedil;&atilde;o:</label><br>
	    					<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="ATIVO" required>Ativo</label>
							</div>
							<div class="radio-inline">
							  <label><input type="radio" name="situacao" id="situacao" value="INATIVO">Inativo</label>
							</div>
	    				</div>
	    				<div class='form-group'>
	    					<input type="submit" name='cadastrar' value='Cadastrar' class="btn btn-primary">
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
