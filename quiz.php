<?php
session_start();

// Verifica se a sessão contém os dados necessários
if (!isset($_SESSION['age']) || !isset($_SESSION['cooperado'])) {
    header('Location: indexx.php');
    exit();
}

$age = $_SESSION['age'];
$cooperado = $_SESSION['cooperado'];

// Determina o grupo do usuário
if ($age < 12) {
    $group = 'children';
} elseif ($age >= 12 && $cooperado == 'sim') {
    $group = 'teen_and_cooperated';
} else {
    $group = 'adult_non_cooperated';
    if (!isset($_SESSION['formFilled'])) {
        header('Location: qr.php');
        exit();
    }
}

// Inicializa a dificuldade e tema anterior na sessão
if (!isset($_SESSION['difficulty'])) {
    $_SESSION['difficulty'] = ['hard', 'medium'][array_rand(['hard', 'medium'])]; // Inicia com 'hard' ou 'medium'
}

if (!isset($_SESSION['previousTheme'])) {
    $_SESSION['previousTheme'] = null;  // Nenhum tema anterior
}

// Banco de questões
$questions = [
    'children' => [
    'matematica' => [
        'easy' => [
            ['question' => 'Qual é a soma de 2 + 3?', 'options' => ['4', '5', '6'], 'answer' => '5'],
        ],
        'medium' => [
            ['question' => 'Qual é o número que vem depois do 6?', 'options' => ['5','7', '8'], 'answer' => '7'],
        ],
        'hard' => [
            ['question' => 'Quanto é 25 / 5?', 'options' => ['5', '10', '25', '30'], 'answer' => '5'],
        ]
    ],
    'meio_ambiente' => [
        'easy' => [
            ['question' => 'Qual é a cor da grama?', 'options' => ['Azul', 'Verde', 'Vermelho', 'Amarelo'], 'answer' => 'Verde'],
        ],
        'medium' => [
            ['question' => 'Qual gás as plantas absorvem?', 'options' => ['Oxigênio', 'Dióxido de Carbono', 'Nitrogênio', 'Hélio'], 'answer' => 'Dióxido de Carbono'],
        ],
        'hard' => [
            ['question' => 'O que é fotossíntese?', 'options' => ['Processo de respiração', 'Produção de energia a partir da luz', 'Descarte de água', 'Nutrientes do solo'], 'answer' => 'Produção de energia a partir da luz'],
        ]
    ],
    'financas' => [
        'easy' => [
            ['question' => 'O que significa economizar dinheiro?', 'options' => ['Gastar tudo', 'Guardar para usar depois', 'Dar para os amigos'], 'answer' => 'Guardar para usar depois'],
        ],
        'medium' => [
            ['question' => 'Se você tem 5 reais e compra um brinquedo que custa 3 reais, quanto você vai ter sobrado?', 'options' => ['2 reais', '3 reais', '1 real'], 'answer' => '2 reais'],
        ],
        'hard' => [
            ['question' => 'O que você deve fazer se quiser comprar algo caro?', 'options' => ['Comprar imediatamente', 'Economizar dinheiro primeiro', 'Pedir para os amigos comprarem'], 'answer' => 'Economizar dinheiro primeiro'],
        ]
    ]
],

    'teen_and_cooperated' => [
        'meio_ambiente' => [
            'easy' => [
                ['question' => 'Qual é o Impacto das emissões de carbono no aquecimento global?', 'options' => ['Aumento da temperatura média do planeta', 'Redução das chuvas', 'Aumento da biodiversidade'], 'answer' => 'Aumento da temperatura média do planeta'],
            ],
            'medium' => [
                ['question' => 'Como a poluição dos oceanos afeta a biodiversidade marinha?', 'options' => ['Melhora a qualidade da água', 'Diminui a quantidade de peixes', 'Aumenta a quantidade de corais'], 'answer' => 'Diminui a quantidade de peixes'],
            ],
            'hard' => [
                ['question' => 'O que são os serviços ecossistêmicos e qual a sua importância para a sociedade?', 'options' => ['Serviços gratuitos que a natureza fornece, como polinização e purificação da água', 'Taxas cobradas pelo uso de recursos naturais', 'Produtos industrializados derivados da natureza'], 'answer' => 'Serviços gratuitos que a natureza fornece, como polinização e purificação da água'],
            ]
        ],
        'financas' => [
            'easy' => [
                ['question' => 'Qual é a diferença entre ativos e passivos em uma demonstração financeira?', 'options' => ['Ativos são bens que trazem receita; passivos são dívidas', 'Ativos são despesas; passivos são receitas', 'Ativos são investimentos de curto prazo; passivos são de longo prazo'], 'answer' => 'Ativos são bens que trazem receita; passivos são dívidas'],
            ],
            'medium' => [
                ['question' => 'Como a inflação afeta o poder de compra da moeda?', 'options' => ['Aumenta o poder de compra', 'Diminui o poder de compra', 'Não afeta o poder de compra'], 'answer' => 'Diminui o poder de compra'],
            ],
            'hard' => [
                ['question' => 'O que é a taxa Selic e como ela influencia a economia?', 'options' => ['É a taxa de juros do mercado de ações', 'É a taxa básica de juros que influencia o crédito e os investimentos', 'É a taxa de câmbio entre moedas'], 'answer' => 'É a taxa básica de juros que influencia o crédito e os investimentos'],
            ]
        ],
        'investimento' => [
            'easy' => [
                ['question' => 'Qual é a importância da diversificação em uma carteira de investimentos?', 'options' => ['Reduz o risco de perdas', 'Aumenta a volatilidade', 'Facilita o investimento em um único ativo'], 'answer' => 'Reduz o risco de perdas'],
            ],
            'medium' => [
                ['question' => 'Como o risco e retorno estão relacionados em um investimento?', 'options' => ['Risco alto sempre garante retorno alto', 'Risco baixo sempre garante retorno baixo', 'Risco e retorno geralmente têm uma relação direta'], 'answer' => 'Risco e retorno geralmente têm uma relação direta'],
            ],
            'hard' => [
                ['question' => 'O que são fundos de investimento e quais são seus principais tipos?', 'options' => ['Veículos que reúnem dinheiro de vários investidores para aplicar em diferentes ativos', 'Apenas contas de poupança em bancos', 'Produtos que garantem retorno fixo'], 'answer' => 'Veículos que reúnem dinheiro de vários investidores para aplicar em diferentes ativos'],
            ]
        ],
        'cooperativismo' => [
            'easy' => [
                ['question' => 'Quais são os princípios fundamentais do cooperativismo?', 'options' => ['Autonomia, solidariedade e lucro', 'Adesão voluntária, controle democrático e participação econômica', 'Exclusividade, competição e maximização de lucros'], 'answer' => 'Adesão voluntária, controle democrático e participação econômica'],
            ],
            'medium' => [
                ['question' => 'Como as cooperativas diferem das empresas tradicionais em termos de estrutura e objetivos?', 'options' => ['As cooperativas visam lucro máximo, enquanto as empresas não', 'As cooperativas são de propriedade dos membros e buscam benefícios para todos', 'As cooperativas não têm funcionários'], 'answer' => 'As cooperativas são de propriedade dos membros e buscam benefícios para todos'],
            ],
            'hard' => [
                ['question' => 'Qual é o papel das cooperativas no desenvolvimento econômico local?', 'options' => ['Apenas maximizar lucros', 'Promover o consumo de produtos locais e o desenvolvimento sustentável', 'Eliminar a concorrência'], 'answer' => 'Promover o consumo de produtos locais e o desenvolvimento sustentável'],
            ]
        ],
        'produtos_servicos' => [
            'easy' => [
                ['question' => 'Quais são os principais produtos oferecidos pela cooperativa Sicoob Montecredi?', 'options' => ['Produtos eletrônicos e roupas', 'Produtos financeiros como empréstimos, conta corrente e cartões', 'Apenas alimentos'], 'answer' => 'Produtos financeiros como empréstimos, conta corrente e cartões'],
            ],
            'medium' => [
                ['question' => 'Como os serviços financeiros de uma cooperativa podem beneficiar seus membros?', 'options' => ['Oferecendo juros mais altos em empréstimos', 'Proporcionando taxas menores e maior participação nos lucros', 'Limitando o acesso ao crédito'], 'answer' => 'Proporcionando taxas menores e maior participação nos lucros'],
            ],
            'hard' => [
                ['question' => 'Quais iniciativas o Sicoob Montecredi adota para promover a sustentabilidade?', 'options' => ['Não tem iniciativas sustentáveis', 'Projetos de reciclagem e educação ambiental', 'Foco apenas em lucro financeiro'], 'answer' => 'Projetos de reciclagem e educação ambiental'],
            ]
        ],
        'curiosidades' => [
            'easy' => [
                ['question' => 'Como o Sicoob Montecredi contribui para a comunidade local?', 'options' => ['Aumentando taxas de serviços', 'Investindo em projetos sociais e culturais', 'Limitando a participação da comunidade'], 'answer' => 'Investindo em projetos sociais e culturais'],
            ],
            'medium' => [
                ['question' => 'Quais são os diferenciais do Sicoob Montecredi em relação a outras instituições financeiras?', 'options' => ['Foco apenas no lucro', 'Proximidade com os membros e reinvestimento na comunidade', 'Taxas altas em serviços'], 'answer' => 'Proximidade com os membros e reinvestimento na comunidade'],
            ],
            'hard' => [
                ['question' => 'Quais são as principais características dos produtos da cooperativa?', 'options' => ['Altos preços e pouca variedade', 'Serviços acessíveis e adaptados às necessidades dos membros', 'Foco apenas em lucro financeiro'], 'answer' => 'Serviços acessíveis e adaptados às necessidades dos membros'],
            ]
        ]
    ],
    'adult_non_cooperated' => [
    'meio_ambiente' => [
        'easy' => [
            ['question' => 'O que é reciclagem?', 'options' => ['Jogar lixo no chão', 'Reutilizar materiais para fazer novos produtos', 'Queimar o lixo'], 'answer' => 'Reutilizar materiais para fazer novos produtos'],
        ],
        'medium' => [
            ['question' => 'Qual é um exemplo de fonte de energia renovável?', 'options' => ['Petróleo', 'Carvão', 'Solar'], 'answer' => 'Solar'],
        ],
        'hard' => [
            ['question' => 'Por que as árvores são importantes para o meio ambiente?', 'options' => ['Produzem oxigênio', 'Apenas dão sombra', 'Servem apenas para madeira'], 'answer' => 'Produzem oxigênio'],
        ],
    ],
    'investimento' => [
        'easy' => [
            ['question' => 'O que significa investir?', 'options' => ['Gastar todo o dinheiro em um dia', 'Colocar dinheiro em algo esperando que ele cresça ao longo do tempo', 'Dar dinheiro para amigos'], 'answer' => 'Colocar dinheiro em algo esperando que ele cresça ao longo do tempo'],
        ],
        'medium' => [
            ['question' => 'Qual é um exemplo de investimento?', 'options' => ['Comprar um livro', 'Comprar ações de uma empresa', 'Comprar roupas'], 'answer' => 'Comprar ações de uma empresa'],
        ],
        'hard' => [
            ['question' => 'Porque é importante começar a investir cedo?', 'options' => ['Para gastar mais dinheiro', 'Para aproveitar o tempo para o dinheiro crescer', 'Para ter menos dinheiro no futuro'], 'answer' => 'Para aproveitar o tempo para o dinheiro crescer'],
        ],
    ],
    'financas' => [
        'easy' => [
            ['question' => 'O que é um orçamento?', 'options' => ['Uma lista de compras', 'Um plano para gastar e economizar dinheiro', 'Um tipo de conta bancária'], 'answer' => 'Um plano para gastar e economizar dinheiro'],
        ],
        'medium' => [
            ['question' => 'Qual é a função de um banco?', 'options' => ['Vender produtos', 'Guardar e gerenciar o dinheiro das pessoas', 'Produzir alimentos'], 'answer' => 'Guardar e gerenciar o dinheiro das pessoas'],
        ],
        'hard' => [
            ['question' => 'O que significa economizar?', 'options' => ['Gastar todo o dinheiro', 'Guardar dinheiro para usar depois', 'Apenas gastar com amigos'], 'answer' => 'Guardar dinheiro para usar depois'],
        ],
    ],
    'cooperativismo' => [
        'easy' => [
            ['question' => 'O que é uma cooperativa?', 'options' => ['Uma empresa onde todos são donos e trabalham juntos', 'Uma empresa que só vende produtos caros', 'Uma loja comum'], 'answer' => 'Uma empresa onde todos são donos e trabalham juntos'],
        ],
        'medium' => [
            ['question' => 'Qual é um princípio do cooperativismo?', 'options' => ['Lucro máximo para um dono', 'Controle democrático pelos membros', 'Concorrência desleal'], 'answer' => 'Controle democrático pelos membros'],
        ],
        'hard' => [
            ['question' => 'Como as cooperativas ajudam as pessoas?', 'options' => ['Vendendo produtos muito caros', 'Oferecendo serviços que atendem às necessidades dos membros', 'Não ajudam em nada'], 'answer' => 'Oferecendo serviços que atendem às necessidades dos membros'],
        ],
    ],
    'produtos_servicos' => [
        'easy' => [
            ['question' => 'Qual tipo de produto financeiro uma cooperativa pode oferecer?', 'options' => ['Somente produtos alimentícios', 'Contas de poupança e empréstimos', 'Apenas roupas'], 'answer' => 'Contas de poupança e empréstimos'],
        ],
        'medium' => [
            ['question' => 'O que é um cartão de crédito?', 'options' => ['Um cartão que dá descontos em lojas', 'Um cartão que permite comprar agora e pagar depois', 'Um cartão que não pode ser usado'], 'answer' => 'Um cartão que permite comprar agora e pagar depois'],
        ],
        'hard' => [
            ['question' => 'Qual é uma vantagem de ser membro de uma cooperativa?', 'options' => ['Taxas mais altas em serviços', 'Participação nos lucros', 'Não receber nada em troca'], 'answer' => 'Participação nos lucros'],
        ],
    ],
    'curiosidades' => [
        'easy' => [
            ['question' => 'O que o Sicoob Montecredi oferece aos seus membros?', 'options' => ['Apenas produtos alimentícios', 'Serviços financeiros e educação financeira', 'Apenas roupas'], 'answer' => 'Serviços financeiros e educação financeira'],
        ],
        'medium' => [
            ['question' => 'Qual é um dos objetivos do Sicoob Montecredi?', 'options' => ['Maximizar lucros apenas para os donos', 'Promover o bem-estar financeiro da comunidade', 'Vender produtos de luxo'], 'answer' => 'Promover o bem-estar financeiro da comunidade'],
        ],
        'hard' => [
            ['question' => 'Como o Sicoob Montecredi pode ajudar a comunidade?', 'options' => ['Fazendo doações apenas a grandes empresas', 'Investindo em projetos sociais e culturais', 'Ignorando as necessidades locais'], 'answer' => 'Investindo em projetos sociais e culturais'],
        ],
    ],
],

];

// Função para obter uma pergunta aleatória com base no grupo, tema anterior e dificuldade
function getRandomQuestion($group, $previousTheme, $difficulty) {
    global $questions;
    $themes = array_diff_key($questions[$group], [$previousTheme => true]);
    $theme = array_rand($themes);
    $question = $questions[$group][$theme][$difficulty][array_rand($questions[$group][$theme][$difficulty])];
    return ['question' => $question, 'theme' => $theme];
}

// Inicializa a tentativa, caso ainda não tenha sido feito
if (!isset($_SESSION['attempt'])) {
    $_SESSION['attempt'] = 0;
}

// Gera a primeira pergunta ao acessar a página pela primeira vez ou se a sessão foi reiniciada
if (!isset($_SESSION['currentQuestion'])) {
    $questionData = getRandomQuestion($group, $_SESSION['previousTheme'], $_SESSION['difficulty']);
    $_SESSION['currentQuestion'] = $questionData['question'];
    $_SESSION['previousTheme'] = $questionData['theme'];
}

// Variável para o título da página
$title = "Responda a Pergunta";

// Lógica para verificar a resposta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['answer'])) {
        $userAnswer = $_POST['answer'];
        if ($userAnswer == $_SESSION['currentQuestion']['answer']) {
            // Resposta correta - define uma variável para mostrar a tela de sucesso
            $_SESSION['show_success'] = true;
            $showSuccessScreen = true;
        } else { 
            // Resposta incorreta
            $_SESSION['attempt']++;
            if ($_SESSION['attempt'] < 2) {
                // Se o usuário errou, diminui a dificuldade para fácil
                $_SESSION['difficulty'] = 'easy';
                // Gera nova pergunta com dificuldade fácil
                $questionData = getRandomQuestion($group, $_SESSION['previousTheme'], $_SESSION['difficulty']);
                $_SESSION['currentQuestion'] = $questionData['question'];
                $_SESSION['previousTheme'] = $questionData['theme'];
                // Mensagem para tentar novamente
                $message = "Resposta incorreta. Deseja tentar novamente?";
                $retryButton = '<form action="quiz.php" method="post">
                                    <button type="submit" name="retry" value="1">Tentar Novamente</button>
                                </form>';
                $title = "Que pena, tente novamente";
            } else {
                // Mensagem de agradecimento
                $message = "Resposta incorreta novamente. Muito obrigado por participar!";
                $title = "Muito obrigado";
                session_destroy();
            }
        }
    }
}

$currentQuestion = $_SESSION['currentQuestion'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <title><?php echo $title; ?></title>
    
    <?php if (isset($showSuccessScreen)): ?>
    <style>
        /* Estilos para a tela de sucesso */
        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .success-container {
            text-align: center;
            color: white;   
            padding: 2rem;
            position: relative;
            z-index: 1001;
        }

        .success-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            animation: popIn 0.5s ease-out;
        }

        .success-message {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.5s forwards;
        }

        .redirect-button {
            background: #4CAF50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 50px;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            opacity: 0;
            animation: fadeIn 0.5s ease-out 1s forwards;
        }

        .redirect-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f0f;
            animation: confetti 5s ease-in-out infinite;
        }

        .trophy {
            font-size: 5rem;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes popIn {
            0% { transform: scale(0); }
            90% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes confetti {
            0% { transform: translateY(-100vh) rotate(0deg); }
            100% { transform: translateY(100vh) rotate(360deg); }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }
    </style>
    <?php endif; ?>
</head>
<body background="si.jpeg">
    <?php if (isset($showSuccessScreen)): ?>
        <div class="success-overlay">
            <div class="success-container">
                <div class="trophy">🏆</div>
                <h1 class="success-title">Parabéns!</h1>
                <p class="success-message">Você acertou a pergunta! Continue assim!</p>
                <button class="redirect-button" onclick="window.location.href='index.html'">Avançar para a Roleta</button>
            </div>
        </div>

        <script>
            // Criar confetes
            function createConfetti() {
                const colors = ['#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff'];
                for (let i = 0; i < 50; i++) {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animationDelay = Math.random() * 5 + 's';
                    document.body.appendChild(confetti);
                }
            }

            // Iniciar confetes quando a página carregar
            window.onload = createConfetti;

            // Redirecionar automaticamente após 5 segundos
            setTimeout(() => {
                window.location.href = 'index.html';
            }, 5000);
        </script>
    <?php else: ?>
        <div class="container">
            <h1><?php echo $title; ?></h1>
            <?php if (isset($message)): ?>
                <p><?php echo $message; ?></p>
                <?php if (isset($retryButton)) echo $retryButton; ?>
            <?php else: ?>
                <p><?php echo $currentQuestion['question']; ?></p>
                <form action="quiz.php" method="post">
                    <?php foreach ($currentQuestion['options'] as $option): ?>
                        <button type="submit" name="answer" value="<?php echo $option; ?>"><?php echo $option; ?></button>
                    <?php endforeach; ?>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</body>
</html>