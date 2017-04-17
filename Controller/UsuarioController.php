<?php 
include("Model/Usuario/UsuarioModel.php");
include("Model/Usuario/UsuariosVO.php");
include("Model/Usuario/UsuarioDAO.php");
include("Model/DB.php");

class UsuarioController{
	public function UsuarioController(){
        
    }
    
    public function salvar(){
        $model = new UsuarioModel();
        $vo = new UsuariosVO();
        $vo->setNome($_POST["txtNome"]);
        $vo->setSenha($_POST["txtSenha"]);
        $vo->setEmail($_POST["txtEmail"]);
        
        if($model->insertModel($vo)){
            $_SESSION["msg"] = "Usuario cadastrado com sucesso.";
        } else {
            $_SESSION["msg"] = "Erro ao cadastrar o usuarios.";
        }
        
        header("Location: ../../View/Usuario/retorno.php");
    }
    
    public function listar(){
        $model = new UsuarioModel();
        
        $_SESSION["data"] = $model->getAllModel();
        include("View/Usuario/list.php");
    }
    
    public function update(){
        $model = new UsuarioModel();
        $vo = new UsuariosVO();
        
        $vo->setId($_GET["id"]);
        $vo->setNome($_POST["txtNome"]);
        $vo->setEmail($_POST["txtEmmail"]);
        $vo->setSenha($_POST["txtSenha"]);
        
        if($model->updateModel($vo)){
            $_SESSION["msg"] = "Usuario atualizado com sucesso.";
        } else {
            $_SESSION["msg"] = "Erro ao atualizar o usuario.";
        }

        header("Location: ../../View/Usuario/retorno.php");
    }
    
    public function novo(){
        include("View/Usuario/insert.php");
    }
    
    public function editar(){
        
        $model = new UsuariosModel();
        
        $vo = $model->getByIdModel($_GET["id"]);
        
        $_SESSION["id"] = $vo->getId();
        $_SESSION["nome"] = $vo->getNome();
        $_SESSION["email"] = $vo->getEmail();
        $_SESSION["senha"] = $vo->getSenha();
        
        include("View/Usuario/editar.php");
    }
    
    public function delete(){
        
        $model = new ProdutoModel();
        
        $vo = $model->getByIdModel($_GET["id"]);
        if ($model->deleteModel($vo)){
             header("Location: http://http://quentinha.exodoti.xyz/usuarios/listar");
        } else {
            include("View/usuarios/error.php");
        }
    }
}

?>