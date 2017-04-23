	<h1 align="center">Cadastro de Usuários</h1> 
	<form method="POST" action="http://localhost:50/MVC/produto/update/<?php echo $_SESSION["id"];?>">
		<label for="exampleInputEmail1">Nome Completo</label>
		<div class="input-group">
		    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
		    <input type="text" class="form-control" name="txtNome" value="<?php $_SESSION["nome"]; ?>" placeholder="Nome">
		</div>
		<label for="exampleInputEmail1">Endereço de E-mail</label>	
	  	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
  			<input type="email" class="form-control" name="txtEmail" value="<?php $_SESSION["email"]; ?>" placeholder="Email" aria-describedby="basic-addon1">
		</div>
		<label for="exampleInputPassword1">Senha</label>
	  	<div class="input-group">
	    	<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
	    	<input type="password" class="form-control" name="txtSenha" value="<?php $_SESSION["senha"]; ?>" id="exampleInputPassword1" placeholder="Senha">
	  	</div>
	  	<label for="exampleInputPassword1">Confirmar Senha</label>
	  	<div class="input-group">
	    	<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
	    	<input type="password" class="form-control" name="txtcontrasenha" id="exampleInputPassword2" placeholder="Confirme a Senha">
	  	</div>
	  	<input type="hidden">
	  	<!--<div class="form-group">
	    	<label for="exampleInputFile">Enviar Arquivo</label>
	    	<input type="file" id="exampleInputFile">
	    	<p class="help-block">Selecionar a Foto de perfil.</p>
	  	</div>-->
	  	<br/>
	  	<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>