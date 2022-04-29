<h1 class="text-center">Formulário de Contato</h1>
		<form action="./?atualizar=<?php echo $ar['id']; ?>&update=1" method="post">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control" value = <?php echo $ar['nome']; ?> >
			</div>

			<div class="form-group">
				<label>E-mail</label>
				<input type="email" name="email" class="form-control" value = <?php echo $ar['email']; ?> >
			</div>

			<div class="form-group">
				<label>Mensagem</label>
				<pre><textarea type="text" name="mensagem" class="form-control"><?php echo $ar['mensagem']; ?></textarea></pre>
			</div>

			<button type="submit" name="atualizar" class="btn btn-primary" value="atualizar">Enviar</button>
		</form>