<?php

    //Comexão de casa
    $host="localhost";
    $user="root";
    $pass="";
    $dbname="bdcursos_alunos";

    //Conexão da escola

    // $host="localhost";
    // $user ="root";
    // $pass ="bdjmf";
    // $dbname = "bdCursos_Alunos";

    try {
        // Conectar ao banco de dados com a string de conexão correta
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $error) {
        echo "Erro de conexão: " . $error->getMessage();
    }
