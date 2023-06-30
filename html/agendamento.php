<?php
    session_start();
    if($_SESSION['login'] != true) { //verifica se o usuario fez login anteriormente
        header("Location: ../html/login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" href="../css/agendamento.css">
    <title>Agendamento</title>
</head>
<body>
    <header>
        <?php
            echo "<h1 class='titulo'> Sala ".$_SESSION['descricao_sala']." - ".$_SESSION['codigo_sala']."</h1>";
        ?>
        <a class="voltar" href="home.php">Voltar</a>
    </header>
    <main>
        <form action="../php/agendar_sala.php" method="post">
            <?php
                $email = $_SESSION['email_funcionario'];
                echo "<input type='email' disabled placeholder='email' value='$email'>";
            ?>
            <aside>
                <ul class='div_horario'>
                    <label class="data_txt" for="data_inicio">Data de inicio: </label>
                    <input type="date" name="data_inicio" class='date'>
                </ul>
                <ul class='div_horario'>
                    <label class="data_txt" for="data_termino">Data de termino: </label>
                    <input type="date" name="data_termino" class='date'>
                </ul>
            </aside>
            <section>
                <ul>
                    <label for="horarios[]">07:00</label>
                    <input type="checkbox" name="horarios[]" value="7:00">
                </ul>
                <ul>
                    <label for="horarios[]">07:50</label>
                    <input type="checkbox" name="horarios[]" value="7:50">
                </ul>
                <ul>
                    <label for="horarios[]">08:40</label>
                    <input type="checkbox" name="horarios[]" value="8:40">
                </ul>

                <ul>
                    <label for="horarios[]">09:50</label>
                    <input type="checkbox" name="horarios[]" value="9:50">
                </ul>

                <ul>
                    <label for="horarios[]">10:40</label>
                    <input type="checkbox" name="horarios[]" value="10:40">
                </ul>

                <ul>
                    <label for="horarios[]">11:30</label>
                    <input type="checkbox" name="horarios[]" value="11:30">
                </ul>
            </section>
            <input type="submit" name="submit" value="Agendar">
        </form>
        <?php
            if(@$_SESSION['error_agendar_sala'] == 1) {
            echo "<div class='erro' id='erro'>
                    <span> Ocorreu um erro durante a criação da sala, tente novamente</span>
                    <div class='fechar' id='fechar_erro'>X</div>
                </div>";
                $_SESSION['error_agendar_sala'] = 0;
            } else if(@$_SESSION['error_agendar_sala'] == 2){
                echo "<div class='certo' id='certo'>
                <span> O agendamento da sala foi bem sucedido!</span>
                <div class='fechar' id='fechar_certo'>X</div>
            </div>";
            $_SESSION['error_agendar_sala'] = 0;
            } else {
                echo "";
            }
        ?>
        <script src="../js/fechar_janela.js"></script>
    </main>
</body>
</html>