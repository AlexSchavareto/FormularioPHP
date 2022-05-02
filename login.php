<?php require_once('head.php'); ?>

<?php
session_start();

if( isset( $_SESSION['meu-site'] ) ){
	header("location: ./");
}

if( isset($_POST['logar'])){
    $user = 'alex@login';
    $pass = 'yamaha';

    if( $_POST['usuario'] == $user && $_POST['senha'] == $pass){
        $_SESSION['meu-site'] = "$user";
        header('location: ./');
    }else{
        echo "Falha ao logar - Usuário / Senha incorreto";
    }


}
?>

<form method="post" action="login.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuário</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="usuario">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="senha">
  </div>
  <button type="submit" class="btn btn-primary" name=" logar">Logar</button>
</form>

<hr>
<a href="login.php">Regarregar pagina</a>

</div>
</body>
</html>