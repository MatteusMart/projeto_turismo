<?php

try{
     // dados da conexão com o BD
     define('SERVIDOR','10.97.46.100');
     define('USUARIO','mateus');
     define('SENHA','123');
     define('BASEDADOS','db_turismo_mateus');

     $con = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS, USUARIO, SENHA);
     // set the PDO error mode to exception
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  echo "Conectado com sucesso";


}catch(PDOException $erro){
    echo "Erro ao conectar no banco de dados: ".$erro->getMessage();


}
