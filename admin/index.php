<?php

    // inicia a sessão
    session_start();

    if(isset($_SESSION['usuario'])){
        header('location: gerenciar_viagens.php');
    }




?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Página de Login</title>
</head>
<body> 
    
    <div id="container-a">
        <h2 id="t-login">Página de Login</h2>
        <form action="../backend/_validar_login.php" id="login" method="post">
            <div id="login-grid">

                <div>
                    <label for="usuario">Usuário</label>
                    <input class="inpt" type="email" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
                </div>

                <div>
                    <label for="senha">Senha</label>
                    <input class="inpt" type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>

            </div>
            <input type="submit" id="btn-entrar" value="Entrar">
        </form>
    </div>
    
</body>
</html>