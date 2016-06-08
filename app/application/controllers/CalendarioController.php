<?php

class CalendarioController extends Zend_Controller_Action
{

    public function indexAction()
    {
        $modelEvento = new Application_Model_Evento();
        $rowSet = $modelEvento->fetchAll('id_aluno = "'. $_SESSION['id_aluno'].'"');
        $this->view->dados = $rowSet;
     }

     public function formularioAction(){    
        
        $dados = $this->_getAllParams();
        print_r($dados);
        $modelEvento = new Application_Model_Evento();
        if(!empty($dados['id_aluno']))
        {
            $this->view->dados = $dados;
        }else{
            $dadoAluno = array(
                "id_aluno" => $_SESSION['id_aluno'],
                );

            $this->view->dados = array_merge($dados, $dadoAluno);
        }
        print_r($dados);
        if(!empty($dados['id_evento'])){
            $row = $modelEvento->fetchRow('id_evento = '. $dados['id_evento']);
            $this->view->row = $row;
        }
                  
    }

     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelEvento = new Application_Model_Evento();
        $modelEvento->gravar($dados);  
        $this->redirect('calendario/index');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $dados['id_aluno'] = "0";
        $modelEvento = new Application_Model_Evento();
        $modelEvento->excluir($dados);  
        $this->redirect('calendario/index');
        
        
        
    }
}