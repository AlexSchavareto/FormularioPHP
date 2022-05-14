        <form action="./" method="post">

        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>

        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>

        <?php if( $email_r['nivel'] == 'admin' ): ?>
        <div class="form-group">
            <label>Senha</label>
            <input type="password" class="form-control" name="senha">
        </div>
      <?php endif; ?>

        <div class="form-group">
            <label>Check me out</label>
            <br>
            <textarea class="form-control" name="mensagem" ></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
        </form>
