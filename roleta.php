<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Roleta de Prêmios</title>
</head>
<body>
    <div class="container">
        <h1>Parabéns! Você acertou a pergunta.</h1>
        <p>Agora, gire a roleta para ganhar seu prêmio!</p>
        <!-- Aqui você pode implementar a lógica da roleta -->
        <button onclick="location.href='fim.php'">Girar Roleta</button>
    </div>
</body>
</html>

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