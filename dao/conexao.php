<?php

    $conexao = mysqli_connect("127.0.0.1", "root", "", "pdv");
    mysqli_select_db($conexao, "pdv");

    # Aqui está o segredo
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');

?>