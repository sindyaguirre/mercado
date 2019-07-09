<html lang="en">
    <head>
        <link rel="stylesheet" href="<?= base_url("css/bootstrap.css")?>">
    </head>
    <body> 
        <div class="container">
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
            ?>
        </div>
    </body>
</html>