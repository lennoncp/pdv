<?php
    session_start();
    include "../../conexao.php";

    $id= $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $situacao_id = $_POST['situacao_id'];
    $criador = $_SESSION['user_id'];

    //echo " Nome: ".$nome." Descricao curta: ".$descricao_curta." Descricao Longa: ".$descricao_longa." Preço: ".$preco." Situacao ".$situacao_id." Criador: ".$criador;

    $insert = mysqli_query($conexao, "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco', situacao_id='$situacao_id', dt_criado=NOW(), criador_id='$criador' WHERE id='$id' " ) or die(mysqli_error($conexao));

    if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto editado sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto não pode ser editado.");
                </script>
        <?php

        }                                 

?>