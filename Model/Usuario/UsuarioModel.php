<?php 
class UsuarioModel{
	    public function insertModel(UsuariosVO $value){
        $prod = new UsuarioDAO();
        //if($value->getPreco() == "0"){
        //   $value->setPreco("10.90");
        //}
        return $prod->insert($value);
    }
    
    public function deleteModel(UsuariosVO $value){
        $prod = new UsuarioDAO();
        
        return $prod->delete($value);
    }
    
    public function updateModel(UsuariosVO $value){
        $prod = new UsuarioDAO();
        
        return $prod->update($value);
    }
    
    public function getByIdModel($id){
        $prod = new UsuarioDAO();
        $vo = $prod->readingById($id);
 
        // Regra de Negocio
        //if($_GET["Action"] != "editar")
        //    $vo->setPreco("R$ ".number_format($vo->getPreco(), 2, ',', '.'));

        return $vo;
    }
    
    public function getAllModel(){
        $prod = new UsuarioDAO();
        return $prod->readingAll();
    }
}

 ?>