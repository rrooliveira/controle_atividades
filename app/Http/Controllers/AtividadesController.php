<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AtividadesController extends Controller
{
	//PROPRIEDADE COM AS CORES DE ACORDO COM A ATIVIDADE
	protected $cores_linha = array("class='default'","class='default'","class='default'","class='danger'");
	
    //MÉTODO PARA CADASTRAR A ATIVIDADE
	public function cadastrar(){
		//RETORNA OS DADOS DA TABELA STATUS
		$resultado = DB::select('SELECT * FROM STATUS');
		return view('cadastrar')->with("resultado",$resultado);
	}
	
	//MÉTODO PARA CADASTRAR OS DADOS DA ATIVDADE NO BANCO DE DADOS
	public function cadastrarAtividade(Request $request){
    	$nome 		 = $request->input('nome');
    	$descricao 	 = $request->input('descricao');
    	$data_inicio = $request->input('data_inicio');
    	$data_fim 	 = $request->input('data_fim');
    	$status 	 = $request->input('status');
    	$situacao 	 = $request->input('situacao');
    	
    	$id = DB::table('atividade')->insertGetId(
		    ['NOME' 	   => $nome,
		     'DESCRICAO'   => $descricao,
		     'DATA_INICIO' => $data_inicio,
		     'DATA_FIM'	   => $data_fim,
		     'ID_STATUS'   => $status,
		     'SITUACAO'    => $situacao
		    ]
		);
		
		if($id){
			$msg = 'Atividade cadastrada com sucesso!';
		}
		
		return view('cadastrar_atividade')->with("mensagem",$msg);
    }
	
	//MÉTODO PARA EDITAR UMA ATIVIDADE
	public function editar($idAtividade){		
		if((int)$idAtividade){
			//FAZ A TIPAGEM DA VARIÁVEL PARA INTEIRO
			$idAtividade = (int)$idAtividade;
			
			//RETORNA OS DADOS DA ATIVIDADE
			$atividade = DB::select('SELECT * FROM ATIVIDADE WHERE ID = ?',[$idAtividade]);
			
			//RETORNA OS DADOS DA TABELA STATUS
			$resultado = DB::select('SELECT * FROM STATUS');
			
			return view('editar')
					->with("atividade",$atividade)
					->with("resultado",$resultado);
		}else{
			echo 'ATIVIDADE N&Atilde;O ENCONTRADA!!!';
		}
	}
	
	//MÉTODO PARA EDITAR OS DADOS DA ATIVDADE NO BANCO DE DADOS
	public function editarDados(Request $request){
		$id			 = $request->input('id_atividade');
    	$nome 		 = $request->input('nome');
    	$descricao 	 = $request->input('descricao');
    	$data_inicio = $request->input('data_inicio');
    	$data_fim 	 = $request->input('data_fim');
    	$status 	 = $request->input('status');
    	$situacao 	 = $request->input('situacao');
    	
    	DB::table('atividade')
    		->where('ID', $id)
    		->update(
		    ['NOME' 	   => $nome,
		     'DESCRICAO'   => $descricao,
		     'DATA_INICIO' => $data_inicio,
		     'DATA_FIM'	   => $data_fim,
		     'ID_STATUS'   => $status,
		     'SITUACAO'    => $situacao
		    ]
		);
		
		$msg = 'Atividade alterada com sucesso!';
		
		return view('editar_atividade')->with("mensagem",$msg);
    }
	
	//MÉTODO PARA DELETAR UMA ATIVIDADE ESPECÍFICA
	public function deletar(){}
	
	//FUNÇÃO PARA MOSTRAR AS ATIVIDADES CADASTRADAS
    public function listar(){
    	$atividades = DB::select('SELECT ATIVIDADE.ID AS ID,
			    					     ATIVIDADE.NOME,
			    					     ATIVIDADE.DESCRICAO AS ATIV_DESC,
			    					     DATE_FORMAT(ATIVIDADE.DATA_INICIO, "%d/%m/%Y") AS DATA_INICIO,
			    					     DATE_FORMAT(ATIVIDADE.DATA_FIM, "%d/%m/%Y") AS DATA_FIM,
			    					     ATIVIDADE.SITUACAO,
			    					     STATUS.ID AS ID_STATUS,
			    					     STATUS.DESCRICAO AS STAT_DESC 
			    					     
	    					     FROM ATIVIDADE 
	    					     
	    					     INNER JOIN STATUS 
	    					     ON STATUS.ID = ATIVIDADE.ID_STATUS');
    	$linhas = '';
	    foreach($atividades as $atividade){
	    	$cor = $this->cores_linha[$atividade->ID_STATUS-1];
			$linhas .= "<tr $cor >
							<td>$atividade->ID</td>
							<td>$atividade->NOME</td>
							<td>$atividade->ATIV_DESC</td>
							<td>$atividade->DATA_INICIO</td>
							<td>$atividade->DATA_FIM</td>
							<td>$atividade->STAT_DESC</td>
							<td>$atividade->SITUACAO</td>
							<td><a class='btn btn-primary' href=\"/editar/$atividade->ID\" role='button'>Editar</a></td>
						</tr>";
		}
    	
    	
    	//RETORNA OS DADOS DA TABELA STATUS
		$infoStatus = DB::select('SELECT * FROM STATUS');
		
		
    	
    	return view('listar')
    		->with("atividades",htmlspecialchars($linhas))
    		->with("infoStatus",$infoStatus);
    }
    
    public function listagemFiltrada($status,$situacao){
    	if($status == 'ALL' && $situacao == 'ALL'){
    		$query = "SELECT ATIVIDADE.ID AS ID,
    					     ATIVIDADE.NOME,
    					     ATIVIDADE.DESCRICAO AS ATIV_DESC,
    					     DATE_FORMAT(ATIVIDADE.DATA_INICIO, '%d/%m/%Y') AS DATA_INICIO,
    					     DATE_FORMAT(ATIVIDADE.DATA_FIM, '%d/%m/%Y') AS DATA_FIM,
    					     ATIVIDADE.SITUACAO,
    					     STATUS.ID AS ID_STATUS,
    					     STATUS.DESCRICAO AS STAT_DESC
    					      
    				  FROM ATIVIDADE 
    				  
    				  INNER JOIN STATUS 
    				  ON STATUS.ID = ATIVIDADE.ID_STATUS";
    	
    	}else if($status != 'ALL' && $situacao == 'ALL'){
    		$query = "SELECT ATIVIDADE.ID AS ID,
    					     ATIVIDADE.NOME,
    					     ATIVIDADE.DESCRICAO AS ATIV_DESC,
    					     DATE_FORMAT(ATIVIDADE.DATA_INICIO, '%d/%m/%Y') AS DATA_INICIO,
    					     DATE_FORMAT(ATIVIDADE.DATA_FIM, '%d/%m/%Y') AS DATA_FIM,
    					     ATIVIDADE.SITUACAO,
    					     STATUS.ID AS ID_STATUS,
    					     STATUS.DESCRICAO AS STAT_DESC
    		
    				  FROM ATIVIDADE 
    				  
    				  INNER JOIN STATUS 
    				  ON STATUS.ID = ATIVIDADE.ID_STATUS
    				  
    				  WHERE STATUS.ID = $status";
    	
    	}else if($status == 'ALL' && $situacao != 'ALL'){
    		$query = "SELECT ATIVIDADE.ID AS ID,
    					     ATIVIDADE.NOME,
    					     ATIVIDADE.DESCRICAO AS ATIV_DESC,
    					     DATE_FORMAT(ATIVIDADE.DATA_INICIO, '%d/%m/%Y') AS DATA_INICIO,
    					     DATE_FORMAT(ATIVIDADE.DATA_FIM, '%d/%m/%Y') AS DATA_FIM,
    					     ATIVIDADE.SITUACAO,
    					     STATUS.ID AS ID_STATUS,
    					     STATUS.DESCRICAO AS STAT_DESC
    		
    				  FROM ATIVIDADE 
    				  
    				  INNER JOIN STATUS 
    				  ON STATUS.ID = ATIVIDADE.ID_STATUS
    				  
    				  WHERE ATIVIDADE.SITUACAO = '$situacao'";
    	
    	}else{
    		$query = "SELECT ATIVIDADE.ID AS ID,
    					     ATIVIDADE.NOME,
    					     ATIVIDADE.DESCRICAO AS ATIV_DESC,
    					     DATE_FORMAT(ATIVIDADE.DATA_INICIO, '%d/%m/%Y') AS DATA_INICIO,
    					     DATE_FORMAT(ATIVIDADE.DATA_FIM, '%d/%m/%Y') AS DATA_FIM,
    					     ATIVIDADE.SITUACAO,
    					     STATUS.ID AS ID_STATUS,
    					     STATUS.DESCRICAO AS STAT_DESC
    		
    				  FROM ATIVIDADE 
    				  
    				  INNER JOIN STATUS 
    				  ON STATUS.ID = ATIVIDADE.ID_STATUS
    				  
    				  WHERE STATUS.ID = $status
    				  AND ATIVIDADE.SITUACAO = '$situacao'";
    	}
    	
    	//RETORNA OS DADOS DA TABELA STATUS
		$atividades = DB::select($query);
		
		$linhas = '';
		foreach($atividades as $atividade){
			$cor = $this->cores_linha[$atividade->ID_STATUS-1];
			$linhas .= "<tr $cor>
							<td>$atividade->ID</td>
							<td>$atividade->NOME</td>
							<td>$atividade->ATIV_DESC</td>
							<td>$atividade->DATA_INICIO</td>
							<td>$atividade->DATA_FIM</td>
							<td>$atividade->STAT_DESC</td>
							<td>$atividade->SITUACAO</td>
							<td><a class='btn btn-primary' href=\"/editar/$atividade->ID\" role='button'>Editar</a></td>
						</tr>";
		}		
    	echo $linhas;
    }
}