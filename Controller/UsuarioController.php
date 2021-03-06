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
        $vo->setSenha(sha1($_POST["txtSenha"]));
        $vo->setEmail($_POST["txtEmail"]);
        
        if($model->insertModel($vo)){
            $_SESSION["msg"] = "Usuario cadastrado com sucesso.";
        } else {
            $_SESSION["msg"] = "Erro ao cadastrar o usuarios.";
        }
        
        header("Location: http://quentinha.exodoti.xyz/Usuario/retorno");
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

        header("Location: http://quentinha.exodoti.xyz/Usuario/retorno");
    }
    
    public function novo(){
        include("View/Home/Header.php");
        include("View/Home/Menu.php");
        include("View/Usuario/insert.php");
        include("View/Home/Footer.php");
        include("View/Home/js.php");
    }
    
    public function retorno(){
        include("View/Home/Header.php");
        include("View/Home/Menu.php");
        include("View/Usuario/retorno.php");
        include("View/Home/Footer.php");
        include("View/Home/js.php");
    }

    public function login(){
        include("View/Home/Header.php");
        include("View/Home/Menu.php");
        include("View/Usuario/Login.php");
        include("View/Home/Footer.php");
        include("View/Home/js.php");
    }
    
    public function logout(){
        include("View/Home/Header.php");
        include("View/Home/Menu.php");
        include("View/Usuario/Logout.php");
        include("View/Home/Footer.php");
        include("View/Home/js.php");
    }

    public function editar(){
        
        $model = new UsuarioModel();
        
        $vo = $model->getByIdModel($_GET["id"]);
        
        $_SESSION["id"] = $vo->getId();
        $_SESSION["nome"] = $vo->getNome();
        $_SESSION["email"] = $vo->getEmail();
        $_SESSION["senha"] = $vo->getSenha();
        
        include("View/Usuario/editar.php");
    }
    
    public function logando(){
        
        $model = new UsuarioModel();
        $login = $model->loginSistemaModel($_POST["txtEmail"],sha1($_POST["txtSenha"]));
        if ($model->loginSistemaModel($_POST["txtEmail"],sha1($_POST["txtSenha"]))){
            $vo = $model->getByEmailModel($_POST["txtEmail"]);
            $_SESSION["id"] = $vo->getId();
            $_SESSION["nome"] = $vo->getNome();
            $_SESSION["email"] = $vo->getEmail();
            $_SESSION["senha"] = $vo->getSenha();
            header('location:http://quentinha.exodoti.xyz/');
        }else{
            unset ($_SESSION['nome']);
            unset ($_SESSION['senha']);
            unset ($_SESSION['id']);
            unset ($_SESSION['email']);
            $_SESSION["msg"] = "Usuário ou Senha Errados.";
            header("Location: http://quentinha.exodoti.xyz/Usuario/retorno");
        }
        
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