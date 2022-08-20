<?php
    include('backend/conexao.php');

    try{
        // mota a query $sql
        $sql = "SELECT * FROM tb_viagens";

        // prepara a execução query SQL acima
        $comando = $con->prepare($sql);

        // executa o comando com a query no banco de dados
        $comando->execute();

        // criando a variavel que ira armazenar os dados,
        //  e setando o fetch em modo associativo(chave/valor)
        $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // var_dump($dados);
        // echo "</pre>";

        
        
    }catch(PDOException $erro){
    echo $erro->getMessage();
    }

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importaçao do css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Viagens</title>
</head>
<body>
    <div id="conteiner">
        <h3>Lista de viagens</h3>
        <div id="grid-viagens">
            <?php
                foreach($dados as $d):
            ?>
            <figure class="figure-viagens">
                <img src="img/upload/" <?php echo $d ['imagem']?> alt="imagem da viagem" class="img-viagens">
                <figcaption class="figcaption-viagens">
                    <h4><?php echo $d['titulo'];?></h4>
                    <h5><?php echo $d['local'];?></h5>
                    <h5>R$ <?php echo $d['valor'];?></h5>
                    <small><?php echo $d['desc'];?></small>
                    <button class="btn-comprar">Comprar</button>
                </figcaption>
            </figure>

            <?php endforeach;?>
        </div>
    </div>
    
</body>
</html>