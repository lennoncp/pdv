<?php
    session_start();
    include_once "conexao.php";

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    //echo "Usuário: ".$user." Senha: ".$pass;

    $_SESSION['autenticado'] = 'false';

    $select = mysqli_query($conexao, "SELECT * FROM usuarios WHERE user='$user' AND pass='$pass' LIMIT 1 ") or die(mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($select);

    if(!empty($select)){

        if($dados['status_id'] == 1){

            $_SESSION['user_id'] = $dados['id'];
            $_SESSION['user'] = $dados['nome'];

            //echo "ID: ".$dados['id']."<br>";

            //Cria array de permissoes do usuario
            $select_permisoes = mysqli_query($conexao, "SELECT p.id as id FROM usuarios u, usuario_permissoes up, permisao p WHERE u.id = up.usuario_id AND up.permisao_id = p.id AND u.id = ".$dados['id']." ") or die(mysqli_error($conexao));
            $permissoes = array();

            if(mysqli_num_rows($select_permisoes) > 0){
                while($row = mysqli_fetch_assoc($select_permisoes)){
                    $permissoes[] = $row['id'];
                }
            }

           $_SESSION['permissoes'] = $permissoes;

            header("Location: ../usuario.php");

        }else{

            header("Location: ../contents/login.php");

        }

    }
?>