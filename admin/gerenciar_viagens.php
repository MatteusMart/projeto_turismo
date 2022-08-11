<?php

include('../backend/conexao.php');

try{
    $sql = "SELECT * FROM tb_viagens";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo"<pre>";
    // var_dump($dados);
    // echo"</pre>";


}catch(PDOException $erro){
    // exibe a mensagem de erro
    echo $erro->getMessage();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Gerenciar Imagens</title>
</head>
<body>
    <div id="container">
        <h3>Gerenciar Viagens</h3>
        <div id="tabela">
            <table border ="1">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php foreach($dados as $viagem):?>
                <tr>
                    <td><?php echo $viagem['id'];?></td>
                    <td><?php echo $viagem['titulo'];?></td>
                    <td><?php echo $viagem['local'];?></td>
                    <td>R$ <?php echo $viagem['valor'];?></td>
                    <td><?php echo $viagem['desc'];?></td>
                    <td>Alterar</th>
                    <td>
                        <a href="../backend/_deletar_viagens.php?id=<?php echo $viagem['id'];?>"> Deletar</a>
                    </th>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    <?php
        $con = null;
    ?>
    
</body>
</html>