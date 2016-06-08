<?php

class MateriaController extends Zend_Controller_Action
{

    public function indexAction(){
        
        $modelMateria = new Application_Model_Materia();
        
        
        //passar variavel para a camada view.
        $rowSet = $modelMateria->fetchAll('id_aluno = "'.$_SESSION['id_aluno'].'"');
        $this->view->dados = $rowSet;
     
    }
    public function formularioAction(){    
        
        $dados = $this->_getAllParams();
        
        $modelMateria = new Application_Model_Materia();
        if(!empty($dados['id_aluno']))
        {
            $this->view->dados = $dados;
        }else{
            $dadoAluno = array(
                "id_aluno" => $_SESSION['id_aluno'],
                );

            $this->view->dados = array_merge($dados, $dadoAluno);
        }
        if(!empty($dados['id_materia'])){
            $row = $modelMateria->fetchRow('id_materia = '. $dados['id_materia']);
            $this->view->row = $row;
        }
                  
             
    }
     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelMateria = new Application_Model_Materia();
        $modelMateria->gravar($dados);  
        $this->redirect('materia/index');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelMateria = new Application_Model_Materia();
        $modelMateria->excluir($dados);  
        $this->redirect('materia/index');
        
        
        
    }
}