<?php
session_start(); //inicia a sessão do usuario para que se possa pegar as informações contidas nela posteriormente
include "../php/conectar_banco_de_dados.php";

    $linha_sql = $_POST['linha_sql']; //Recebe o valor dos inputs e armazena-os
    $status = $_POST['status'];

    mysqli_query($ConexaoSQL, "UPDATE manutencao SET status_denuncia = '$status' WHERE id_manutencao = '$linha_sql'"); //Faz a requisição de update no banco de dados

?>