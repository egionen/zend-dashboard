<?php

class HomeController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

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