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
	}
}