<?php
    require_once("class/objects.php");

    $obj = new Objects;
    $dados = $obj->select();

    if ( isset( $_POST['enviar'])){

      if ( $obj->insert( $_POST ) ){
        $s = "Dados inserido com sucesso!";
        $a = "success";
      }else{
        $s = "Falha ao inserir dados.";
        $a = "danger";
    }
  }

  if( isset( $_GET['atualizar']) ){
    header( "/inclues/update.php?atualizar=" . $_GET['atualizar'] );

  }

  include_once ( "includes/head.php" );
?>

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

	<button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
</form>
<hr>

<?php if( isset( $s ) ): ?>
  <div class="alert alert-<?php echo $a; ?>" role="alert">
    <?php echo $s; ?>
  </div>

<?php else: ?>
  <div class="alert alert-light" role="alert">
  Preencha seus dados!
  </div>

<?php endif; ?>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Mensagem</th>
      <th scope="col">Data/Hora</th>
      <th scope="col">Atualizar</th>
      <th scope="col">Deletar</th>
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
      <td>
          <a href = "?atualizar=<?php echo $d['id'];?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
          <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
          </svg>  
          </a>
      </td>
      <td>
        <a href = "?deletar=<?php echo $d['id'];?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
        </svg>
        </a>
        </td>
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
    <?php include_once ( "/includes/footer.php"); ?>
