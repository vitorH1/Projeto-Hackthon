<?php
session_start();

// Verifica se o usuário é adulto não cooperado
if (!isset($_SESSION['age']) || !isset($_SESSION['cooperado']) || $_SESSION['age'] < 18 || $_SESSION['cooperado'] == 'sim') {
    header('Location: indexx.php');
    exit();
}

// URL do QR code
$qrCodeUrl = "https://example.com"; // Altere para a URL desejada

// Verifica se o formulário já foi preenchido
if (isset($_POST['formFilled'])) {
    $_SESSION['formFilled'] = true;
    header('Location: quiz.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #40E0D0; /* Cor turquesa */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Sombra mais pronunciada */
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h2 {
                margin-bottom: 20px;
                color: #000000;
                font-size: 1.2rem;
                font-weight: bold;
                text-align: center;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        }

        img {
            border: 2px solid #333;
            border-radius: 10px;
            margin: 20px 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button {
            
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 16px; /* Diminuindo o tamanho do botão */
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
            width: 30%; /* Botão ocupa toda a largura do contêiner */
        }

        button:hover {
            background-color: #218838;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body background="si.jpeg"  >
    <div class="container">
        <h2>QR Code para Adultos Não Cooperados</h2>
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo urlencode($qrCodeUrl); ?>&size=150x150" alt="QR Code">
        <br>
        <form action="qr.php" method="post">
            <input type="hidden" name="formFilled" value="1">
            <button type="submit">Avançar</button>
        </form>
    </div>
</body>
</html>
