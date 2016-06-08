<?php

class Application_Model_Evento extends Zend_Db_Table
{
	    protected $_name = 'evento';

	    public function gravar($dados){
        
        if(!empty($dados['id_evento'])){
            
            
            $row = $this->fetchRow('id_evento = '. $dados['id_evento']);
            
        }else{
        $row = $this->createRow();}
        $row->setFromArray($dados);
        $row->save();   
        return true;        
    }
    
    public function excluir($dados)
    {
        $this->delete('id_evento ='.$dados['id_evento']);    
    }
	    
	
}
      

