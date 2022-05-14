<?php require_once("head.php"); ?>

<?php

    $az = $obj->read( $_GET['atualizar'] );

    if ( isset( $_POST['atualizar'] ) ){
        if ( $obj->update( $_POST ) == TRUE ){
            header("location: /");
        }else{
            echo '<script>Erro ao atualizar dados</script>';
        }
    }
?>

<h1 class="text-center">
    <a href="atualizar=/<?php echo $_GET['atualizar']; ?>">
        Atualizar Dados
    </a>        
</h1>

<hr>
<code><?php echo date("d/m/Y → H:i:s" , strtotime( $az['data']) ); ?></code>
<hr>

<form action="?atualizar=<?php echo $_GET['atualizar']; ?>" method="post">

<div class="form-group">
    <label>Nome</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $az['nome']; ?>">
</div>

<div class="form-group">
    <label>E-mail</label>
    <input type="email" class="form-control" name="email" value="<?php echo $az['email']; ?>">
</div>

<div class="form-group">
    <label>Senha</label>
    <input type="password" class="form-control" name="senha" value="<?php echo $az['senha']; ?>">
</div>

<div class="form-group">
    <label>Check me out</label>
    <br>
    <textarea class="form-control" name="mensagem" ><?php echo $az['mensagem']; ?></textarea>
</div>
<input type="hidden" name="id" value="<?php echo $_GET['atualizar']; ?>">

<button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button> 
<a href="/" type="submit" class="btn btn-danger">Cancelar</a>
</form>

<?php require_once("footer.php"); ?>
