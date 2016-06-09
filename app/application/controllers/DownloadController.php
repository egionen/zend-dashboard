<?php

class DownloadController extends Zend_Controller_Action
{

    public function indexAction(){

        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $rowDown = $modelDownload->fetchAll('id_materia = "'.$dados['id_materia'].'"');
        $modelMateria = new Application_Model_Materia();
        $rowMateria = $modelMateria->fetchRow('id_materia = "'.$dados['id_materia'].'"');

        $this->view->dadosDown = $rowDown;
        $this->view->dadosMateria = $rowMateria;
    }

       public function formularioAction(){    
        
        $dados = $this->_getAllParams();
        $this->view->dados = $dados;
        $modelDownload = new Application_Model_Download();
        $modelMateria = new Application_Model_Materia();
        $rowMateria = $modelMateria->fetchAll('id_materia = "'.$dados['id_materia'].'"');
        $this->view->dadosMateria = $rowMateria;
        
        if(!empty($dados['id_download']))
        $rowDown = $modelDownload->fetchAll('id_download = '. $dados['id_download']);
        //$this->view->row = $rowDown;
             
    }


   
     public function gravarAction()
    {
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->gravar($dados);  
        $this->redirect('home');
    }
    public function excluirAction(){
        
        $dados = $this->_getAllParams();
        $modelDownload = new Application_Model_Download();
        $modelDownload->excluir($dados);  
        $this->redirect('home');
        
        
        
    }
}