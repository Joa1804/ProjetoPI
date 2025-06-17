<?php
$cards = [
    [
        'imageUrl' => "https://via.placeholder.com/286x180.png?text=Imagem+do+Card",
        'title' => "Título do Card via PHP",
        'text' => "Este conteúdo foi gerado dinamicamente usando variáveis PHP, tornando o componente mais flexível.",
        'buttonLink' => "#",
        'buttonText' => "Clique Aqui",
        'buttonClass' => "btn-primary"
    ],
    [
        'imageUrl' => "https://via.placeholder.com/300x180?text=Imagem+2",
        'title' => "Card 2",
        'text' => "Você pode duplicar os cards e mudar o conteúdo.",
        'buttonLink' => "sobre.php",
        'buttonText' => "Ver Mais",
        'buttonClass' => "btn-success"
    ],
    [
        'imageUrl' => "https://via.placeholder.com/300x180?text=Imagem+3",
        'title' => "Card 3",
        'text' => "Você pode ter quantos cards quiser, com diferentes botões.",
        'buttonLink' => "incricao.php", 
        'buttonText' => "Saiba Mais",
        'buttonClass' => "btn-warning"
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Dinâmicos com PHP e Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            padding: 20px 0;
        }
        .card {
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container card-container">
        <div class="row">
            <?php foreach ($cards as $card): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($card['imageUrl']) ?>" 
                             class="card-img-top" 
                             alt="<?= htmlspecialchars($card['title']) ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($card['title']) ?></h5>
                            <p class="card-text flex-grow-1"><?= htmlspecialchars($card['text']) ?></p>
                            <a href="<?= htmlspecialchars($card['buttonLink']) ?>" 
                               class="btn <?= htmlspecialchars($card['buttonClass']) ?> mt-auto align-self-start">
                                <?= htmlspecialchars($card['buttonText']) ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


