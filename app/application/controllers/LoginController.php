<?php

class LoginController extends Zend_Controller_Action
{
    public function indexAction()
    {
        
        $modelAluno = new Application_Model_Aluno();
        $result = $modelAluno->fetchAll();
        echo "<pre>";
        print_r($result);
        
    }
}
