<?php
session_destroy();
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Quiz Cooperativa</title>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo ao Jogo do Banco</h1>
        <form action="index.php" method="post">
            <label for="age">Digite sua idade:</label>
            <input type="number" name="age" placeholder="Digite sua idade" required>
            <br>
            <label for="cooperado">Você é cooperado?</label>
            <select name="cooperado" required>
                <option value="">Selecione</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
            <br>
            <button type="submit">Iniciar</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $age = intval($_POST['age']);
        $cooperado = $_POST['cooperado'];

        // Armazenar informações na sessão
        $_SESSION['age'] = $age;
        $_SESSION['cooperado'] = $cooperado;

        header('Location: quiz.php');
        exit();
    }
    ?>
</body>
</html>
