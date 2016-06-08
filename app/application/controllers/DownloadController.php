<?php

class DownloadController extends Zend_Controller_Action
{

    public function indexAction(){

        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $rowSet = $modelDownload->fetchAll('id_materia = "'.$dados['id_materia'].'"');
        $this->view->dados = $rowSet;


    }
   
     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->gravar($dados);  
        $this->redirect('download/index');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->excluir($dados);  
        $this->redirect('download/index');
        
        
        
    }
}