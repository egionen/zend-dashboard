<?php

class Application_Model_Diario extends Zend_Db_Table
{
	    protected $_name = 'diario';
	    
	public function gravar($dados){
        
        $row = $this->createRow();
        $row->setFromArray($dados);
        $row->save();   
        return true;        
    }
    
    public function excluir($dados)
    {
        $this->delete('id_diario ='.$dados['id_diario']);    
    }
}
      

