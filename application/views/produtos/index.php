<html lang="en">
    <head>
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
    </head>
    <body> 
        <div class="container">
            <p class="alert-success"><?= $this->session->flashdata("success") ?></p>
            <p class="alert-danger"><?= $this->session->flashdata("danger") ?></p>
            
            <h1>Produtos</h1>
            <?php
            foreach ($produtos as $key => $value) {
                ?>
                <table class="table"> 
                    <tr>
                        <td><?= $value['nome'] ?></td>
                        <td><?= numeroEmReais($value['preco']) ?></td>
                    </tr>    
                </table>

                <?php
            }
            if ($this->session->userdata("usuario_logado")) {
                echo anchor("login/logout", "Logout", array("class" => "btn btn-primary"));
            } else {
                ?>
                <h1>Login</h1>
                <?php
//abrindo um formulario
                echo form_open("login/autenticar");
                echo form_label("Email", "email");
                echo form_input(array(
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'form-control',
                    'maxlength' => '255'
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    'name' => 'senha',
                    'id' => 'senha',
                    'class' => 'form-control',
                    'maxlength' => '255'
                ));

                echo form_button(array(
                    'class' => 'btn btn-primary',
                    'content' => 'Logar',
                    'type' => 'submit'
                ));

                echo form_close();
                ?>            
                <h1>Cadastros</h1>            
                <?php
//abrindo um formulario
                echo form_open("usuarios/novo");
                /* aqui é montado/chamado os campos com todas suas carcteristicas
                 * não esquecendo que para tanto, é preciso inicializar com helper('form') no controller */
                echo form_label("Nome", "nome");
                echo form_input(array(
                    'name' => 'nome',
                    'id' => 'nome',
                    'class' => 'form-control',
                    'maxlength' => '255'
                ));

                echo form_label("Email", "email");
                echo form_input(array(
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'form-control',
                    'maxlength' => '255'
                ));

                echo form_label("Senha", "senha");
                echo form_password(array(
                    'name' => 'senha',
                    'id' => 'senha',
                    'class' => 'form-control',
                    'maxlength' => '255'
                ));

                echo form_button(array(
                    'class' => 'btn btn-primary',
                    'content' => 'Cadastrar',
                    'type' => 'submit'
                ));

                echo form_close();
            }
            ?>

        </div>
    </body>
</html>