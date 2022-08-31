<?php
    // arquivo que protege as paginas administrativas do site
    // caso o usuario nao esteja logado, irá redirecionar para a tela de login

    // inicia sessão
    session_start();
    // cria a var $usuario que irá receber o valor da variavel de
    // sessao $_SESSION['usuario']
    $usuario = $_SESSION['usuario'];

    // se o usuario não estiver logado redireciona para a tela de login
    if($usuario == null){
        header("location: index.html");
        exit;
    }
?>