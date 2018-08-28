<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
   <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./index.php?link=1">Nome da companhia</a>
    
   <div class="row text-light" >
   <?php 
   //se a variavel global de sessão "user" existir
   if(!empty($_SESSION['user'])){
        echo $_SESSION['user']; 
   }else{
       echo "-";
   }
   ?> 
   </div>
    
   
   <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <?php 
            if(empty($_SESSION['user'])){
        ?>
            <a class="nav-link" href="#" data-toggle="modal" data-target="#mdLogin">Logar</a>
        <?php
            }else{
        ?>
            <a class="nav-link" href="./dao/sair.php">Sair</a>
        <?php
            }
        ?>
    </li>
    </ul>
</nav>"


<div class="container-fluid" >
<div class="row">
<nav class="col-md-2 mb-1 px-4 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky"  style="padding-top: 30px;">
    <ul class="nav flex-column">
    <?php
    if(!empty($_SESSION['permissoes'])){

        if(in_array('1', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=2">           
            <span data-feather="home"></span>
            Dashboard <span class="sr-only"></span>
        </a>
        </li>
    <?php
        }
        if(in_array('2', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=3">
            <span data-feather="file"></span>
            Nova Venda
        </a>
        </li>
    <?php
        }
        if(in_array('3', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=4">
            <span data-feather="file"></span>
            Vendas
        </a>
        </li>
    <?php
        }
        if(in_array('4', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=5">
            <span data-feather="shopping-cart"></span>
            Produtos
        </a>
        </li>
    <?php
        }
        if(in_array('5', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=6">
            <span data-feather="users"></span>
            Clientes
        </a>
        </li>
    <?php
        }
        if(in_array('6', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="/usuario.php?link=7">
            <span data-feather="bar-chart-2"></span>
            Usuários
        </a>
        </li>
    <?php
        }
        if(in_array('7', $_SESSION['permissoes'])){
    ?>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
        </a>
        </li>
    <?php
        }
    }
    ?>
    </ul>
    </div>
</nav>
</div>

<?php
    include "./contents/modalsLogin/modalLogin.php";
?>

</div>