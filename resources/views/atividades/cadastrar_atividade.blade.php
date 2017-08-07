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
	   					<h2>CADASTRO DE ATIVIDADE</h2>
    				</div>
    			</div>
	    		<div class='panel-body'>
	    			<div class='form-group'>
	    				&nbsp;
	    			</div>
	    			<div class="alert alert-success">
					  <strong>{{$mensagem}}</strong>
					</div>
					<div class='form-group'>
						<a class="btn btn-primary" href="/" role="button">Ver Atividades</a>					
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
