<?php
    $dir = dirname(__FILE__);
    include "$dir/../template/header.php";
    
?>
<link rel="stylesheet" href="<?php echo $_SERVER['url_path']?>public/css/login.css" >
<?php echo isset($dados['erros'])? $dados['erros']:'' ?>
<form action="<?php echo $_SERVER['url_path']?>home/acessar" method="post">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Email</label>
					<input id="user" type="text" class="input" name='email'>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name='password'>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Acessar">
				</div>
				<div class="hr"></div>
			</div>
		
		</div>
	
    <a href="<?php echo $_SERVER['url_path']?>home/registrar">Não tenho cadastro, clique aqui</a>
    </div>
</div>
</form>

<?php
    $dir = dirname(__FILE__);
    include "$dir/../template/footer.php";
    
?>