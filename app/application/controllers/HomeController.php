<?php

class HomeController extends Zend_Controller_Action
{

    

    public function indexAction()
    {
      if($_SESSION['user'] == "")
  		{
  			$_SESSION['mensagem'] = "<script type='text/javascript'>
    			swal(
    			'Desculpe',
    			'Você deve Logar para acessar as funções',
    			'error'
  			)
  			</script>";
  			$this->redirect('index');
      	}


    $modelMateria = new Application_Model_Materia();
    $modelEvento = new Application_Model_Evento();

    $rowMateria = $modelMateria->fetchAll($modelMateria->select()->where('id_aluno = "'.$_SESSION['id_aluno'].'"')->order('id_materia DESC')->limit(4,0));
    $this->view->materias = $rowMateria;
    $rowEvento = $modelEvento->fetchAll($modelEvento->select()->where('id_aluno = "'.$_SESSION['id_aluno'].'"')->order('id_evento DESC')->limit(4,0));
    $this->view->eventos = $rowEvento;
    echo "<pre>";
    
	}
  public function diarioAction()
  {


     $dados = $this->_getAllParams();
        $modelDiario = new Application_Model_Diario();
        $modelDiario->gravar($dados); 
        $this->redirect('home');
  }
  public function diariosAction()
  {

    $modelDiario = new Application_Model_Diario();
        
        
        //passar variavel para a camada view.
        $rowSet = $modelDiario->fetchAll('id_aluno = "'.$_SESSION['id_aluno'].'"');
        $this->view->dados = $rowSet;
     
  }
  public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelDiario = new Application_Model_Diario();
        $modelDiario->excluir($dados);  
        $this->redirect('home');
        
        
        
    }
}