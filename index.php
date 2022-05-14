<?php

    require_once("class/objects.php");
    $obj = new Objects;
    $dados = $obj->select();
    session_start();

    if( ! isset( $_SESSION['minha-sessao']) ){
        require_once("includes/login.php");
        exit;
    }

    if( isset( $_POST['enviar'] ) ){
        if ( $obj->insert( $_POST ) ){
            header("location: ./");
        }else{
            $s = "Falha ao inserir os dados";
            $a = "danger";
        }
    }

    if( isset( $_GET['atualizar'] ) ){
        require_once("includes/update.php");
        exit;
    }

    if( isset( $_GET['deletar'] ) ){
        if ( $obj->delete( $_GET['deletar'] ) == TRUE ){
            header("location: ./");
        }else{
            echo '<script>Falha ao deletar.</script>';
        }
    }

    if( isset( $_GET['deslogar'] ) ){
        $obj->deslogar();
        header("location: ./");
    }


    require_once("includes/head.php");
    $email_r = $obj->getemail( $_SESSION['minha-sessao'] );
?>

        <p class="text-center">

            <a href="?deslogar">
                Deslogar
            </a>

            |

            <a href="./">
            <?php echo $obj->title(); ?>
            </a>

            |
            Você está logado como:
            <u>
            <?php echo $_SESSION['minha-sessao']; ?>
            </u>
        </p>

        <?php require_once("includes/form.php"); ?>

        <hr>

        <?php if( isset( $s ) ): ?>
            <div class="alert alert-<?php echo $a; ?>" role="alert">
                <?php echo $s; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-light" role="alert">Preencha seus dados!</div>
        <?php endif; ?>

        <hr>


        <?php

          if( $email_r['nivel'] == 'admin' ){
            require_once("includes/tabela.php");
          }

        ?>

<?php require_once("includes/footer.php"); ?>
