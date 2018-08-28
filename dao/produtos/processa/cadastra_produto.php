<?php
    session_start();
    include "../../conexao.php";

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $situacao_id = $_POST['situacao_id'];
    $criador = $_SESSION['user_id'];

    //echo " Nome: ".$nome." Descricao curta: ".$descricao_curta." Descricao Longa: ".$descricao_longa." Preço: ".$preco." Situacao ".$situacao_id." Criador: ".$criador;

    $insert = mysqli_query($conexao, "INSERT INTO produtos( nome, descricao, preco, situacao_id, dt_criado, criador_id) VALUE ( '$nome', '$descricao', '$preco', '$situacao_id', NOW(), ".$criador." )" );

    if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto cadastradacom sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto não pode ser cadastrada.");
                </script>
        <?php

        }                                 

?>