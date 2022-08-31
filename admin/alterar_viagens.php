<?php

    include('../backend/conexao.php');
    include('../backend/controle_sessao.php');

    // captura a variavel global ID recebida via GET-
    $id = $_GET['id'];

    // echo $id;
    try{
        // comando sql que irá selecionar as viagens por ID
        $sql = "SELECT * FROM tb_viagens WHERE id = $id";

        $comando = $con->prepare($sql);

        $comando->execute();

        $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // var_dump($dados);
        // echo "</pre>";

        // echo $dados[0]['titulo'];

    }catch(PDOException $erro){
        // tratamento de erro
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
    <title>Alterar Viagens</title>
</head>
<body>
    <div id="container-al">
        <h3>Alterar Viagens</h3>
        <form action="../backend/_alterar_viagens.php" method="post" enctype="multipart/form-data">
            <div id="grid-alterar">
                <div>
                    <!-- pra mandar o id porem escondido(readonly hiden) -->
                    <label for="">ID</label>
                    <input type="text" name="id" id="id"
                    value="<?php echo $dados[0]['id']?>" readonly>
                </div>
                <div>
                    <label for="titulo">título</label>
                    <input type="text" name="titulo" id="titulo"
                    value="<?php echo $dados[0]['titulo']?>">
                </div>
                <div>
                    <label for="local">Local</label>
                    <input type="text" name="local" id="local"
                    value="<?php echo $dados[0]['local']?>">
                </div>
                <div>
                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor"
                    value="<?php echo $dados[0]['valor']?>">
                </div>
                <div id="img-a">
                    <img class="img-alterar" src="../img/upload/<?php echo $dados[0]['imagem'] ?>" alt="">
                    <input type="file" name="aimg" id="aimg" value="">
                </div>
                <div>
                    <label for="desc">Descrição</label>
                    <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $dados[0]['desc']?></textarea>
                </div>
            </div>
            <input type="submit" value="Salvar" name="" id="">
        </form>
    </div>
    
</body>
</html>