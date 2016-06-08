<?php

class CalendarioController extends Zend_Controller_Action
{

    

    public function indexAction()
    {
        $modelEvento = new Application_Model_Evento();
        $rowSet = $modelEvento->fetchAll('id_aluno = "'. $_SESSION['id_aluno'].'"');
        $this->view->dados = $rowSet;
        	}
}