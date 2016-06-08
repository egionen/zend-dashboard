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
}