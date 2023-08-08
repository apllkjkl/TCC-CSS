<?php 
session_start(); //inicia a sessão do usuario para que se possa pegar as informações contidas nela posteriormente
if($_SESSION['login'] != true) { //verifica se o usuario fez login anteriormente
    header("Location: ../html/login.php");
}
include "../php/conectar_banco_de_dados.php"
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/usuario.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <title>Meus Agendamentos</title>
</head>
<body>
    <header>
        <a class="voltar" href="home.php">Voltar</a>
        <h1 class='titulo'>Usuário</h1>
    </header>
    <main>

        <div class="checkbox">
            <label>Selecionar Todos</label>
            <input type="checkbox" id="checar_data" value="checado">
        </div>
        <div id="info">
            
        </div>
            
        <select id="selecionar_funcionarios">
            <option style="display:none;" selected>Selecionar Funcionario</option>
            <?php
                include '../php/conectar_banco_de_dados.php';
                $funcionarios = mysqli_query($ConexaoSQL, "SELECT * FROM funcionarios");
                $quantidade_funcionarios = mysqli_num_rows($funcionarios);
            
                for($a = 1; $a <= $quantidade_funcionarios; $a++) {
                    $nome_funcionarios_assoc = mysqli_fetch_assoc($funcionarios);
                    $nome_funcionarios = $nome_funcionarios_assoc['nome'];
                    echo
                    "<option value='$nome_funcionarios'>".$nome_funcionarios."</option>";
                }
            
            ?>
        </select>
            
    </main>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="../js/selecionar_professor.js"></script>
</body>
</html>