<?php

class Application_Model_Aluno extends Zend_Db_Table
{
	    protected $_name = 'aluno';
	    
	public function gravar($dados){
        
        if(!empty($dados['id_aluno'])){
            
            
            $row = $this->fetchRow('id_aluno = '. $dados['id_aluno']);
            
        }else{
        $row = $this->createRow();}
        
        $row->setFromArray($dados);
        $row->save();   
        return true;        
    }
    
    public function excluir($dados)
    {
        $this->delete('id_aluno ='.$dados['id_aluno']);    
    }
}
      

