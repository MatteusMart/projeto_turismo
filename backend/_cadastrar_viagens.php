<?php


// Include da conexão com o banco de dados
include 'conexao.php';

try{
    // exibir as váriaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_FILES);
    // echo"</pre>";
    // exit;

    //var_dump($_POST);
    //echo "</pre>";

    // variaveis que recebem os dados enviados via POST
    $titulo = $_POST['título'];
    $local = $_POST['local'];
    $Valor = $_POST['Valor'];
    $desc = $_POST['desc'];

    // ===================================
    // upload de imagem
    // armazena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];

    // descobrir a extensão da imagem
    // formatos validos: jpg/png/jpeg
     $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);
    

    // verificaçaõ de extensao de imagem, se for diferente dos formatos válidos,
    // irá retornar o erro ao usuário
    if($extensao != 'jpg' &&$extensao != 'jpeg' &&
    $extensao != 'png'){
        echo 'Formato de imagem inválido';
        exit;
    }

    // gera um nome aleatorio para imagem(hash)
    // a função iniqid gera um hash aleatorio baseado no tempo em microsegundos, mas ela nao é confiavel
    // utilizamos o nome temporario da imagem gerada pelo php mais o uniqid para incrementar o codigo gerado
    // utilizamos o md5 para gerar outro hash baseado no uniqid(nome temp + uniqid)
    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));

    $nome_final_imagem = $hash.'.'.$extensao;

    // caminho onde a imagem será armazenada
    $pasta = '../img/upload/';

    // define o novo nome da imagem para upload
    $nimagem = 'foto.jpg';

    // função php que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);


    // variaveis que recebe a query SQL que será executada no BD
    $sql = "INSERT INTO
                tb_viagens
            (
                `titulo`,
                `local`,
                `valor`,
                `desc`,
                `imagem`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$Valor',
                '$desc',
                '$nome_final_imagem'
            )    
            ";

    // prepara a execucão da query SQL acima
    $comando = $con->prepare($sql);

    // executa o comando com a query do banco de dados
    $comando -> execute();
    
    // exibe msg de sucesso ao inserir
    echo "cadastro realizado com sucesso";

    // fechar a conexão
    $con = null;


}catch(PDOException $erro){
    echo $erro -> getMessage();
    die();

}

?>