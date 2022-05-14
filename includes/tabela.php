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

<?php foreach ( $dados as $d ): ?>
    <tr>
        <th scope="row"><?php echo $d['id']; ?></th>
        <td><?php echo $d['nome']; ?></td>
        <td><?php echo $d['email']; ?></td>
        <td><?php echo $d['senha']; ?></td>
        <td><?php echo  stripslashes( $d['mensagem'] ); ?></td>
        <td><?php echo date( "d/m/Y H:i:s" , strtotime( $d['data']) ); ?></td>

        <td class="text-center">
            <a href="atualizar/<?php echo $d['id']; ?>" class="text-success">
            <svg class="bi bi-arrow-clockwise" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3.17 6.706a5 5 0 0 1 7.103-3.16.5.5 0 1 0 .454-.892A6 6 0 1 0 13.455 5.5a.5.5 0 0 0-.91.417 5 5 0 1
            1-9.375.789z"/>
            <path fill-rule="evenodd" d="M8.147.146a.5.5 0 0 1 .707 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 1 1-.707-.708L10.293 3
            8.147.854a.5.5 0 0 1 0-.708z"/>
            </svg>
            </a>
        </td>

        <td class="text-center">
            <a href="?deletar= <?php echo $d['id']; ?>" class="text-danger">

            <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1
            0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
            </svg>

            </a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
