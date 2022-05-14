<?php require_once("head.php"); ?>


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

<?php require_once("footer.php"); ?>
