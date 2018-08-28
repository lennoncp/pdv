<?php
    session_start();
?>
<html lang="pt-br">
<head>
    <title>Page Title</title>
    <?php 
        include "includes/head.php";
    ?>
</head>
<body>
    <?php 
        include "includes/navbar.php";
        
    if(!empty($_GET['link'])){
        
            $link = $_GET['link'];
        

        $page['1'] = "contents/login.php";
        $page['2'] = "contents/dashboard.php";
        $page['3'] = "contents/nova_venda.php";
        $page['4'] = "contents/vendas.php";
        $page['5'] = "contents/produtos.php";
        $page['6'] = "contents/clientes.php";
        $page['7'] = "contents/usuarios.php";
        $page['8'] = "contents/login.php";

        if(!empty($link)){
            if(file_exists($page[$link])){
                include $page[$link];
            }else{
                include $page['1'];
            }
        }else{
            include $page['1'];
        }

    } 

        include "includes/footer.php";
    ?>
</body>
</html>