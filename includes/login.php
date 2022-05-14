<?php 
    require_once("head.php");

    if( isset( $_POST['logar'] ) ){
        if ( $obj->login( $_POST['email'] , $_POST['senha'] ) ){
            header("location: ./");
        }else{
            echo "Falha ao logar";
        }
    }
?>

<h1 class="text-center">
    <a href="./">Logar</a>
</h1>

<form action="./" method="post">
  <div class="form-group">
    <label>Insira seu e-mail</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label>Informe sua senha</label>
    <input type="password" class="form-control" name="senha">
  </div>
  <button type="submit" class="btn btn-primary" name="logar" value="Logar">Logar</button>
</form>

<?php require_once("footer.php"); ?>