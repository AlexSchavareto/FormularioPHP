<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<title>Formulário de Contato</title>
</head>
<style media="screen">
body {background-color: #2F4F4F; color: #FFFFF0}
.container {padding-top: 25px}
.table {color: #FFFFF0}
</style>

<body>

	<div class="container">


		<?php
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

					<?php 
						require_once("gravar.php"); 
					?>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Nome</th>
							<th scope="col">E-mail</th>
							<th scope="col">Mensagem</th>
						</tr>
					</thead>

<?php 

    if( file_exists( "dados.txt" ) ) {
        
        $fp = fopen( "dados.txt", "r"); // o "r" significa leitura.

        while( !feof( $fp ) ) { //Enquanto não chegar ao final do arquivo declarado na variavel $fp
            $linha_atual = fgets( $fp );
            if( !empty( $linha_atual )){ //Esse if serve para não imprimir a linha vazia
                $ex = explode(";",$linha_atual); //função explode cria um array de cada linha com o separador ";"
                $i = 1; //criei essa variávei para a coluna ID

?>

    <tr>
		<td><?php echo $i ?> </td>
        <td><?php echo $ex[0];?></td>
        <td><?php echo $ex[1];?></td>
        <td><?php echo $ex[2];?></td>
    </tr>

<?php
				$i++;
            }
        }

        fclose( $fp );

    }else{
        echo "Arquivo não existe";
    }
?>
					</table>
					



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

		</div>


	</body>
	</html>
