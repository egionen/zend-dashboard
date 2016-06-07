<?php

class LoginController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
        
    }
    public function logarAction()
    {

    	$dados = $this->_getAllParams();
    	$modelAluno = new Application_Model_Aluno();
    	$result = $modelAluno->fetchRow('user = "'.$dados['user'].'"and pass ="'.$dados['pass'].'"');
        if($result)
        {

        $_SESSION = array(

        	"id_aluno" => $result['id_aluno'],
        	"nome" => $result['nome'],
        	"nasc" => $result['nasc'],
        	"user" => $result['user'],
        	"pass" => $result['pass'],
        	"avatar" => $result['avatar'],

        	);
         
        
        $_SESSION['mensagem'] = "<script type='text/javascript'>
  		swal(
  		'Logado com sucesso',
  		'Bem Vindo ".$_SESSION['nome']."!',
  		'success'
		)
		</script>";
        $this->redirect('home/index');	
        }else{

        	$_SESSION['mensagem'] = "
        	<script type='text/javascript'>
  			swal(
  			'Desculpe',
  			'Usuário ou senha inválidos',
  			'error'
			)
			</script>";
			$this->redirect('login');

        }
        die;

		
    }
    public function cadastarAction()
    {

    	$dados = $this->_getAllParams();
    	$modelAluno = new Application_Model_Aluno();
    	$modelAluno->gravar($dados);




    }
    public function unsetAction()
    {

    	session_unset();
    	$this->redirect('index');

    }
}
