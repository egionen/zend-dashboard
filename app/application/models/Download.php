<?php

class Application_Model_Download extends Zend_Db_Table
{
	    protected $_name = 'download';
	    
	public function gravar($dados){
        
        if(!empty($dados['id_download'])){
            
            
            $row = $this->fetchRow('id_download = '. $dados['id_download']);
            
        }else{
        $row = $this->createRow();}
        
        $row->setFromArray($dados);
        $row->save();   
        return true;        
    }
    
    public function excluir($dados)
    {
        $this->delete('id_download ='.$dados['id_download']);    
    }
}
      

