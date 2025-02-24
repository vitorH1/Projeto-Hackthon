<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo Roleta Montecredi</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="sicoobinho">
    <img src="sicoobinhodois-removebg-preview.png" alt="Mascote Sicoobinho" class="mascote">
    <div class="balao">Vamos jogar?</div>
    </div>
    <header>
        <div class="container">
            <img src="logo.png" alt="Logo do Jogo" class="logo">
            <h1>Bem-vindo ao Jogo Roleta Montecredi</h1>
        </div>
    </header>

    <main>
        <div class="containerform">

            <form id="identificacao-form" action="indexx.php" method="post" >
          
                <h2>Informe seus dados:</h2>
                
                <label for="idade">Idade:</label>
                <input type="number" id="age" name="age" required min="1">

                <label for="status">Cooperado:</label>
                <select id="status" name="cooperado" required>
                    <option value="">Selecione</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
                <center>
                 <button type="submit">Iniciar Jogo</button>   
                </center>
                
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
        <img src="cardss-removebg-preview.png" alt="cards" class="cards">

    </main>

    <footer>
        <div class="containerbaixo">
            <p>&copy; 2024 Hackathon. Todos os direitos reservados.</p>
        </div>
    </footer>

</body>
</html>
