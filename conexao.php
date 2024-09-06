<?php

    $host="localhost";
    $user ="root";
    $pass ="bdjmf";
    $dbname = "dbCursos_Alunos";

    try{
        $conn = new PDO("mysql:host=$host; dbname". $dbname , $user, $pass);
    }catch(PDOException $error){
        echo "ERRO de conexão Erro Gerado ". $error->getmessage();
    }


