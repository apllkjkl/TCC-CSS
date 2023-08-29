<?php
    include '../php/conectar_banco_de_dados.php';

    $codigo_sala = mysqli_real_escape_string($ConexaoSQL, $_POST['codigo_sala']);
    $descrição =  mysqli_real_escape_string($ConexaoSQL, $_POST['descricao_sala']);
    $capacidade = mysqli_real_escape_string($ConexaoSQL,$_POST['quantidade_sala']);

    $verificar_codigo = mysqli_query($ConexaoSQL, "SELECT * FROM salas WHERE codigo = '$codigo_sala'");

    if($verificar_codigo = mysqli_num_rows($verificar_codigo) >= 1) { //verifica se o codigo da sala já existe
        session_start();
        $_SESSION['error_codigo'] = 1;
        header("Location: ../html/home.php"); //caso já existir ocorrera um erro e sera disponibilizado o mesmo para o usuasrio

    } else if(isset($_POST['codigo_sala']) || isset($_POST['descricao_sala']) || isset($_POST['quantidade_sala'])) {

        $_SESSION['error_codigo'] = 2;
        header("Location: ../html/home.php");
    } else {
        $EnviandoDados = mysqli_query($ConexaoSQL, "INSERT INTO salas(codigo,descricao,capacidade) VALUES ('$codigo_sala','$descrição','$capacidade')");
        session_start();
        $_SESSION['error_codigo'] = 3;
        header("Location: ../html/home.php");
    }

?>