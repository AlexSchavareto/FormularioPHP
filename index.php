<?php

session_start();

if( isset($_GET['deslogar'] ) ){
	unset($_SESSION);
	session_destroy();
	header('login.php');
}

if( !isset( $_SESSION['meu-site'] ) ){
	header("location: login.php");
}

echo "Você está logado com o usuário: " . $_SESSION['meu-site'];
echo "<br>";
echo "<a href='?deslogar'>Deslogar></a>";

	if( isset( $_GET ) && ! empty( $_GET ) ){
		if( isset( $_GET['deletar'] ) ){
			//echo "Delete a linha: " . $_GET['deletar'];
			$del = $_GET['deletar'];
			$conexao = new mysqli("localhost", "root", "123456", "terminalroot");
			if ( ! $conexao->connect_error ){
		
				$sql = "DELETE FROM dados WHERE id= '$del' ";
					if ($conexao->query($sql) === TRUE ){
						echo "ID: $del excluído com sucesso";
						header("location: ./");
					}else{
						echo "Falha ao deletar dados";
					}
		}else{
				echo "ERRO! Falha ao conectar no banco de dados";
			}

		}else{
			require_once("head.php");
			$a = $_GET['atualizar'];

			$conexao = new mysqli("localhost", "root", "123456", "terminalroot");

			$sql = "SELECT * FROM dados WHERE id=$a";

			$r = $conexao->query( $sql );

			$ar = $r->fetch_assoc();

			require_once("atualizar.php");

			if( isset($_GET['update'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$mensagem = $_POST['mensagem'];
				$sql = "UPDATE dados SET nome='$nome', email='$email', mensagem='$mensagem' WHERE id='$a'";
				if( $conexao->query($sql) === TRUE){
					header("location: ./");

				}else{
					echo "Falha ao atualizar";
				}
			}

			echo "\n</div>\n</body>\n</html>"; // Esse echo serve para o código html não ficar quebrado(faltando tags, devido ao exit da linha abaixo)
			$conexao->close();
			exit; //Coloque o exit para não duplicar o formulário
		}
	}


	require_once("head.php");
	
		if (isset($_POST['enviar'])){
			if (in_array(NULL, $_POST)) { //troquei os if e else de cada campo do formulário, para a função in_array, que já faz uma mensagem padrão caso algum campo estiver vazio
?>
	<div class="alert alert-primary text-center" role="alert">
		Algum campo está vazio, volte e preencha novamente.
	</div>
	<p>
		<a href="./">Voltar</a>
	</p>

<?php
		}else{				
?>

	<div class="alert alert-success" role="alert">
		<?php require_once("gravar.php"); ?>
	</div>


		<p>
			<a href="./">Voltar</a>
		</p>

<?php
		}

			}else{
?>

	<h1 class="text-center">Formulário de Contato</h1>
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
				<label>Mensagem</label>
				<pre><textarea type="text" name="mensagem" class="form-control"></textarea></pre>
			</div>

			<button type="submit" name="enviar" class="btn btn-primary" value="enviar">Enviar</button>
		</form>

<?php
			}
?>

<hr>

<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Mensagem</th>
				<th scope="col">Atualizar</th>
				<th scope="col">Deletar</th>
			</tr>
		</thead>

<?php

    $conexao = new mysqli("localhost", "root", "123456", "terminalroot");

    if ( ! $conexao->connect_error ){

        $sql = "SELECT * FROM dados";
        $resultado = $conexao->query($sql);
        while ($ex = $resultado->fetch_assoc()){

?>

    <tr>
		<td><?php echo $ex['id'];?></td>
        <td><?php echo $ex['nome'];?></td>
        <td><?php echo $ex['email'];?></td>
        <td><?php echo $ex['mensagem'];?></td>
        <td><a href="?atualizar=<?php echo $ex['id'];?>">↺</a></td>
		<td><a href="?deletar=<?php echo $ex['id'];?>">X</a></td>
		
	</tr>

<?php

			};
	}else{
		echo "ERRO! Falha ao conectar";
	}
?>


	</table>
		</div>
	</body>
</html>
