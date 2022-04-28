<?php
//exit;
    $conexao = new mysqli("localhost", "root", "123456", "terminalroot");

    if ( ! $conexao->connect_error ){

        $sql = "SELECT * FROM dados";
        $resultado = $conexao->query($sql);
        while ($linha = $resultado->fetch_assoc()){

            echo "ID: " . $linha['id'] . "<br>";
            echo "Nome: " . $linha['nome'] . "<br>";
            echo "E-mail: " . $linha['email'] . "<br>";
            echo "Mensagem: " . $linha['mensagem'] . "<br>";
            echo "Data/Hora: " . $linha['data'] . "<br>";

            echo "<hr>";

            
                };
    }else{
        echo "ERRO! Falha ao conectar";
    }
    
?>



<?php
	if( isset( $_GET ) && ! empty( $_GET ) ){
		if( isset( $_GET['deletar'] ) ){	
			$del = $_GET['deletar'];
			
			$conexao = new mysqli("localhost", "root", "123456", "terminalroot");

			if ( ! $conexao->connect_error ){
		
				$sql = "DELETE FROM dados WHERE id= '$del' ";
					if ($conexao->query($sql) === TRUE ){
					echo $del . "excluído com sucesso";
					}else{
					echo "Falha ao inserir dados";
					}

			}
		}else{
				echo "ERRO! Falha ao conectar no banco de dados";
			}

	}else{
			echo "Atualize a linha: " . $_GET['atualizar'];
		}	
	
?>