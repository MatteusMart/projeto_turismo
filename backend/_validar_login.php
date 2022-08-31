<?php

include('conexao.php');

try{
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email='$usuario' AND senha='$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($dados);

    // verifica se existem dados dentro da variavel dados
    if($dados != null){
        // inicia sessão
        session_start();
        // var_dump(session_id());
        // exit;

        // cria uma variável de sessão e adiciona o usuario digitado
        $_SESSION['usuario']= $usuario;

        // exibe o valor adicionado na variável de sessão usuário
        // var_dump($_SESSION['usuario']);
        // exit;

        // se o usuario e senha sao validos,irá entrar nesse bloco de codigo
        header('location: ../admin/gerenciar_viagens.php');
    }else{
        // se o usuário e senha são invalidos,irá entrar nesse bloco de codigo
        echo "usuario ou senha invalidos";
    }
}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>