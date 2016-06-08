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
        $modelEvento = new Application_Model_Evento();
        $modelMateria = new Application_Model_Materia();

        if($dados['id_aluno'] == $_SESSION['id_aluno']){

            $modelEvento->delete('id_aluno = "'.$_SESSION['id_aluno'].'"');  
            $modelMateria->delete('id_aluno = "'.$_SESSION['id_aluno'].'"');  
            $modelAluno->delete('id_aluno = "'.$_SESSION['id_aluno'].'"');  


            session_unset();
            $this->redirect('index');
        }else{
        
        $modelAluno->excluir($dados);  
        $this->redirect('aluno/index');
        }
    }
    public function avatarAction()
    {

        print_r($_FILES);
        $arquivo = $_FILES['arquivo']['name'];
        
        $ext = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);   
         if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
            && $ext != "gif" ) {
                echo "somente imagens";
                die;
        }
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'], 'avatar/' . $_SESSION['id_aluno'] . '.' . $ext))
        {
            $destino = array( "avatar" => 'avatar/' . $_SESSION['id_aluno'] . '.' . $ext,);
            print_r($destino);
            $modelAluno = new Application_Model_Aluno();
            $modelAluno->update($destino, 'id_aluno = "'. $_SESSION['id_aluno'].'"');
            $_SESSION['avatar'] = $destino['avatar'];
        }
        $this->redirect('home');
    }
}