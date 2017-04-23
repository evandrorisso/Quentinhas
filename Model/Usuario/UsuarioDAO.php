<?php
/**
* Implementando Codigos Sql aqui fica o CRUD (Create, Reading(readingAll e readingById),Update e Delete)
*/
class UsuarioDAO{
	public function insert(UsuariosVO $value){
		$SQL = "INSERT INTO usuarios (nome, senha, email) VALUES (";
        $SQL .= "?, ?, ?)";
        
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        
        $pstm->bind_param("sss", $value->getNome(), $value->getSenha(), $value->getEmail());
        
        if($pstm->execute())
            return true;
        else
            return false;
	}
	public function update(UsuariosVO $value){
		$SQL = "UPDATE usuarios SET nome = ?, senha = ?, email = ? WHERE id = ?";
        
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        
        $pstm->bind_param("sssi", $value->getNome(), $value->getSenha(), $value->getEmail(), $value->getId());
        
        if($pstm->execute())
            return true;
        else
            return false;
	}
	public function delete(UsuariosVO $value){
		$SQL = "DELETE FROM usuarios WHERE id = ?";
        
        $DB = new DB();
        $DB->getConnection();
        $pstm = $DB->execSQL($SQL);
        
        $pstm->bind_param("i", $value->getId());
        
        if($pstm->execute())
            return true;
        else
            return false;
	}
	public function readingById($id){
		$SQL = "SELECT * FROM usuarios WHERE id = ".  addslashes($id);
        
        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        
        $vo = new UsuariosVO();
        
        while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $vo->setId($reg["id"]);
            $vo->setNome($reg["nome"]);
            $vo->setEmail($reg["email"]);
            $vo->setSenha($reg["senha"]);
        }
        
        return $vo;
	}
    public function readingByEmail($email){
        $SQL = "SELECT * FROM usuarios WHERE email = '".  addslashes($email)."'";
        
        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        
        $vo = new UsuariosVO();
        
        while($reg = $query->fetch_array(MYSQLI_ASSOC)){
            $vo->setId($reg["id"]);
            $vo->setNome($reg["nome"]);
            $vo->setEmail($reg["email"]);
            $vo->setSenha($reg["senha"]);
        }
        
        return $vo;
    }
    public function loginSistema($email,$senha){
        $SQL = "SELECT * FROM usuarios WHERE email = '".  addslashes($email)."' and senha='".addslashes($senha)."';";
        
        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        if($query->num_rows > 0)
        {
            return true;
        }      
        else{
            return false;
        }
    }
	public function readingAll(){
		$SQL = "SELECT * FROM usuarios";
        
        $DB = new DB();
        $DB->getConnection();
        $query = $DB->execReader($SQL);
        $array = array();
        
        while($row = $query->fetch_array()){
            $array[] = array($row["id"], $row["nome"], $row["email"], $row["senha"]);
        }
        
        return $array;
	}
}
?>