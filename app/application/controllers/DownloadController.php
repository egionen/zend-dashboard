<?php

class DownloadController extends Zend_Controller_Action
{

    public function indexAction(){
        
        $modelDownload = new Application_Model_Download();
        
        
        //passar variavel para a camada view.
        $rowSet = $modelDownload->fetchAll();
        $this->view->dados = $rowSet;
     
    }
    public function formularioAction(){    
        
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        
        if(!empty($dados['id_download']))
        $row = $modelDownload->fetchRow('id_download = '. $dados['id_download']);
        $this->view->row = $row;
             
    }
     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->gravar($dados);  
        $this->redirect('Download/index');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->excluir($dados);  
        $this->redirect('Download/index');
        
        
        
    }
}