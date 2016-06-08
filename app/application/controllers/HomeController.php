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

    $rowMateria = $modelMateria->fetchAll('id_aluno = "'.$_SESSION['id_aluno'].'"');
    $this->view->materias = $rowMateria;
    $rowEvento = $modelEvento->fetchAll('id_aluno = "'.$_SESSION['id_aluno'].'"');
    $this->view->eventos = $rowEvento;
    echo "<pre>";
    
	}
}