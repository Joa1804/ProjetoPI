<?php
$imageUrl = "https://via.placeholder.com/286x180.png?text=Imagem+do+Card";
$cardTitle = "Título do Card via PHP";
$cardText = "Este conteúdo foi gerado dinamicamente usando variáveis PHP, tornando o componente mais flexível.";
$buttonLink = "#";
$buttonText = "Clique Aqui";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Dinâmico com PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo htmlspecialchars($imageUrl); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($cardTitle); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($cardTitle); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($cardText); ?></p>
                <a href="<?php echo htmlspecialchars($buttonLink); ?>" class="btn btn-primary"><?php echo htmlspecialchars($buttonText); ?></a>
            </div>
        </div>
    </div>

      <!-- Card 2 -->
      <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x180?text=Imagem+2" class="card-img-top" alt="Imagem 2">
                <div class="card-body">
                    <h5 class="card-title">Card 2</h5>
                    <p class="card-text">Você pode duplicar os cards e mudar o conteúdo.</p>
                    <a href="pagina2.php" class="btn btn-success">Ver Mais</a>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x180?text=Imagem+3" class="card-img-top" alt="Imagem 3">
                <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">Você pode ter quantos cards quiser, com diferentes botões.</p>
                    <a href="pagina2.php" class="btn btn-warning">Saiba Mais</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


