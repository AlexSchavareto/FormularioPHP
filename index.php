<?php
    require_once("class/objects.php");

    $obj = new Objects;
    $dados = $obj->select();

    if ( isset( $_POST['enviar'])){
        if ( $obj->insert( $_POST ) ){
            $s = "Dados inserido com sucesso!";
        }else{
            $s = "Falha ao inserir dados";
        }
    }
?>

    <!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/bootstrap.css" rel="stylesheet">
    <script src="assets/bootstrap.bundle.js"></script>
    <script src="assets/popper.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    
    <title><?php echo $obj->tittle();?></title>
  </head>
  <body>

  <div class="container">

<h1 class="text-center"><?php echo $obj->tittle();?></h1>

<form action="./" method="post">
    <div class="form-group">
	    <label>Nome</label>
		<input type="text" name="nome" class="form-control" >
	</div>

	<div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" >
	</div>

    <div class="form-group">
	    <label>Senha</label>
		<input type="password" name="senha" class="form-control" >
	</div>

	<div class="form-group">
	    <label>Mensagem</label>
		<pre><textarea type="text" name="mensagem" class="form-control"></textarea></pre>
	</div>

	<button type="submit" name="enviar" class="btn btn-primary" value="enviar">Enviar</button>
</form>

<?php if ( isset( $s ) ){ ?>

  <div class="alert alert-primary" role="alert">
  A simple primary alert—check it out!
  </div>
<?php

}else{?>
  <div class="alert alert-primary" role="alert">
  Preencha seus dados!
  </div>
<?php } ?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Mensagem</th>
      <th scope="col">Data/Hora</th>


    </tr>
  </thead>
  <tbody>

  <?php foreach ( $dados as $d ): //Troquei as chaves por ":" para utilizar o endforeach na linha 66 ?>
   
    <tr>
      <th scope="row"><?php echo $d['id'];?></th>
      <td><?php echo $d['nome'];?></td>
      <td><?php echo $d['email'];?></td>
      <td><?php echo $d['senha'];?></td>
      <td><?php echo $d['mensagem'];?></td>
      <td><?php echo date( "d/m/Y H:i", strtotime( $d['data']) );?></td>

    </tr>

    <?php endforeach; ?>

  </tbody>
</table>

  </body>
</html>
