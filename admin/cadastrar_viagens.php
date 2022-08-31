<?php

    include('../backend/conexao.php');
    include('../backend/controle_sessao.php');

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastros e Viagens</title>
</head>
<body>
    <div id="container">
        <h3>Cadastro de Viagens</h3>
        <hr>

        <a href="gerenciar_viagens.php">gerenciar Viagens</a>

        <hr>
        <form action="../backend/_cadastrar_viagens.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="titulo">Título</label>
                <input type="text" name="título" id="titulo">
            </div>
            <div>
                <label for="">Local</label>
                <input type="text" name="local" id="local">
            </div>
            <div>
                <label for="">Valor</label>
                <input type="number" name="Valor" id="Valor">
            </div>
            <div>
                <label for="">Imagem</label>
                <input type="file" name="imagem" id="imagem">
            </div>
            <div>
                <label for="">desc</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" value="Cadastrar">

        </form>
    </div>
</body>
</html>