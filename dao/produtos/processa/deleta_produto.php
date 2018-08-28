<?php
    session_start();
    include "../../conexao.php";

    $id = $_GET['id'];


    //echo " Nome: ".$nome." Descricao curta: ".$descricao_curta." Descricao Longa: ".$descricao_longa." Preço: ".$preco." Situacao ".$situacao_id." Criador: ".$criador;

    $delete = mysqli_query($conexao, "DELETE FROM produtos where id='$id'" );

    if((mysqli_affected_rows($conexao)) != 0){

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0;URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto excluido com sucesso.");
                </script>
        <?php

        }else{

        ?>
                <META HTTP-EQUIV=REFRESH CONTENT = "0; URL= http://<?php echo $_SERVER['SERVER_NAME']?>/usuario.php?link=5">
                <script type="text/javascript">
                    alert("Produto não pode ser excluido.");
                </script>
        <?php

        }                                 

?>