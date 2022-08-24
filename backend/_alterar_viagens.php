<?php
    include('conexao.php');

    try{
        // variaveis recebidas via $_POST
        $id     = $_POST['id'];
        $titulo = $_POST['titulo'];
        $local  = $_POST['local'];
        $valor  = $_POST['valor'];
        $desc   = $_POST['desc'];
        
        $nome_original_imagem = $_FILES['aimg']['name'];

        if($nome_original_imagem != null){
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
        $hash = md5(uniqid($_FILES['aimg']['tmp_name'],true));

        $nome_final_imagem = $hash.'.'.$extensao;

        // caminho onde a imagem será armazenada
        $pasta = '../img/upload/';

        // define o novo nome da imagem para upload
        $nimagem = 'foto.jpg';

        // função php que faz o upload da imagem
        move_uploaded_file($_FILES['aimg']['tmp_name'],$pasta.$nome_final_imagem);


            $sql = "UPDATE 
            tb_viagens
         SET
           `titulo` = '$titulo',`local` = '$local',`valor`  = '$valor',`desc` = '$desc', `imagem` = '$nome_final_imagem'
            WHERE id = $id;";

        }else{

            $sql = "UPDATE 
            tb_viagens
         SET
           `titulo` = '$titulo',`local` = '$local',`valor`  = '$valor',`desc` = '$desc'
            WHERE id = $id;";

        }

        $comando = $con->prepare($sql);

        $comando->execute();

        header('location: ../admin/alterar_viagens.php?id='.$id);


    }catch(PDOException $erro){
        echo $erro->getMessage();
    }
?>