<?php

class Application_Model_Materia extends Zend_Db_Table
{
	    protected $_name = 'materia';
	    
	public function gravar($dados){
        
        if(!empty($dados['id_materia'])){
            
            
            $row = $this->fetchRow('id_materia = '. $dados['id_materia']);
            
        }else{
        $row = $this->createRow();}
        
        $row->setFromArray($dados);
        $row->save();   
        return true;        
    }
    
    public function excluir($dados)
    {
        $this->delete('id_materia ='.$dados['id_materia']);   
        

    }
}
      

