<?php
    session_start();

    $_SESSION['nav_ativa'] = 0;
?>
<html lang="pt-br">
<head>
    <title>PDV LcpSystems</title>
    <?php 
        include "includes/head.php";
    ?>
</head>
<body>
    <?php 
        include "includes/navbar.php";

        If(!empty($_GET['link'])){
            $link = $_GET['link'];

            $page['1'] = "contents/index.php";
            $page['2'] = "contents/login.php";

            if(!empty($link)){
                if(file_exists($page[$link])){
                    include $page[$link];
                }else{
                    include $page[$link];
                }
            }else{
                include $page['1'];
            }
        }else{
            include "contents/index.php";
        }

        

        //include "contents/index.php";

        include "includes/footer.php";
    ?>
</body>
</html>