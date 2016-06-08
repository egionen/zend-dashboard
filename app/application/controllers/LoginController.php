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

       if($_SESSION['checkUser'] == 0 or $_SESSION['checkEmail'] == 0)
       {

        $_SESSION['mensagem'] = "
            <script type='text/javascript'>
            swal(
            'Desculpe',
            'Por Favor escolha um email ou usuário diferente',
            'error'
            )
            </script>";
            $this->redirect('login');
       }
        

    	$dados = $this->_getAllParams();
    	$modelAluno = new Application_Model_Aluno();
    	if($modelAluno->gravar($dados)){
            $row = $modelAluno->fetchAll('user = "' . $dados['user']. '"');
                echo "chegou aki";
                $_SESSION = array(
                    "id_aluno" => $row['id_aluno'],
                    "nome" => $row['nome'],
                    "nasc" => $row['nasc'],
                    "user" => $row['user'],
                    "pass" => $row['pass'],
                    "avatar" => $row['avatar'],
                    "email" => $row['email'],
                    "mensagem" => "<script type='text/javascript'>
                        swal(
                        'Logado com sucesso',
                        'Bem Vindo ".$dados['nome']."!',
                        'success'
                        )
                        </script>",
                    );
            $this->redirect('home/index');
        }
            
    }
    
    public function verificarAction(){

    
    $this->_helper->layout->disableLayout();
    $dados = $this->_getAllParams();
    
    $modelAluno = new Application_Model_Aluno();
    if(!empty($dados['user'])){
            $row = $modelAluno->fetchRow("user = '{$dados['user']}'");    

        if($row){
            echo "
            <script type='text/javascript'>
            swal(
            'Desculpe',
            'Usuário não está disponível',
            'error'
            )
            </script>";
            $_SESSION['checkUser'] = 0;
        }else{
            echo "
            <script type='text/javascript'>
            swal(
            'Disponível',
            'Usuário está disponível',
            'success'
            )
            </script>";
            $_SESSION['checkUser'] = 1;
            
        }
    }

    if(!empty($dados['email'])){
        $row = $modelAluno->fetchRow("email = '{$dados['email']}'");
        if($row){
            echo "
            <script type='text/javascript'>
            swal(
            'Desculpe',
            'Email não está disponível',
            'error'
            )
            </script>";
            $_SESSION['checkEmail'] = 0;
        }else{
            echo "
            <script type='text/javascript'>
            swal(
            'Disponível',
            'Email está disponível',
            'success'
            )
            </script>";
            $_SESSION['checkEmail'] = 1;
        }
    }



    die;
    }
    public function unsetAction()
    {

    	session_unset();
    	$this->redirect('index');


    }
}
