<?php

class AlunoController extends Zend_Controller_Action
{

    public function indexAction(){
        
        $modelAluno = new Application_Model_Aluno();
        
        
        //passar variavel para a camada view.
        $rowSet = $modelAluno->fetchAll();
        $this->view->dados = $rowSet;
     
    }
    public function formularioAction(){    
        
        $dados = $this->_getAllParams();
        $modelAluno = new Application_Model_Aluno();
        
        if(!empty($dados['id_aluno']))
        $row = $modelAluno->fetchRow('id_aluno = '. $dados['id_aluno']);
        $this->view->row = $row;
             
    }
     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelAluno = new Application_Model_Aluno();
        $modelAluno->gravar($dados);  
        $this->redirect('aluno/index');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelAluno = new Application_Model_Aluno();
        $modelAluno->excluir($dados);  
        $this->redirect('aluno/index');
        
        
        
    }
}