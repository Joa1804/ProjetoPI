<?php
// Dados dinâmicos que podem vir de um banco de dados ou outra fonte
$pageData = [
    'title' => 'Página de Detalhes',
    'subtitle' => 'Informações completas sobre o item selecionado',
    'content' => 'Esta página foi acessada a partir de um dos cards da página principal. Aqui você pode exibir conteúdo detalhado sobre o item selecionado.',
    'relatedItems' => [
        ['title' => 'Item Relacionado 1', 'link' => 'item1.php'],
        ['title' => 'Item Relacionado 2', 'link' => 'item2.php'],
        ['title' => 'Item Relacionado 3', 'link' => 'item3.php']
    ],
    'breadcrumb' => [
        ['text' => 'Página Principal', 'url' => 'index.php'],
        ['text' => 'Página Atual', 'url' => '']
    ]
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageData['title']) ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .breadcrumb {
            padding: 0.75rem 1rem;
            background-color: #f8f9fa;
            border-radius: 0.25rem;
        }
        .related-links {
            border-left: 3px solid #0d6efd;
            padding-left: 1rem;
        }
        .content-card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($pageData['breadcrumb'] as $item): ?>
                    <li class="breadcrumb-item<?= empty($item['url']) ? ' active' : '' ?>">
                        <?php if (!empty($item['url'])): ?>
                            <a href="<?= htmlspecialchars($item['url']) ?>"><?= htmlspecialchars($item['text']) ?></a>
                        <?php else: ?>
                            <?= htmlspecialchars($item['text']) ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>

        <!-- Conteúdo Principal -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card content-card mb-4">
                    <div class="card-body">
                        <h1 class="card-title"><?= htmlspecialchars($pageData['title']) ?></h1>
                        <h2 class="h4 text-muted mb-4"><?= htmlspecialchars($pageData['subtitle']) ?></h2>
                        
                        <div class="alert alert-info">
                            <h4 class="alert-heading"><i class="bi bi-info-circle-fill"></i> Informação</h4>
                            <p><?= htmlspecialchars($pageData['content']) ?></p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="index.php" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Voltar para a Página Principal
                                </a>
                                <small class="text-muted">Acessado em <?= date('d/m/Y H:i') ?></small>
                            </div>
                        </div>
                        
                        <!-- Conteúdo adicional -->
                        <div class="mt-4">
                            <h3>Detalhes Adicionais</h3>
                            <p>Esta seção pode conter mais informações sobre o conteúdo selecionado. Você pode organizar o conteúdo em abas, accordions ou outras estruturas do Bootstrap.</p>
                            
                            <div class="accordion mt-3" id="detailsAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                            Mais Informações
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#detailsAccordion">
                                        <div class="accordion-body">
                                            <p>Exemplo de conteúdo expansível. Pode ser usado para informações complementares que não precisam estar visíveis imediatamente.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-link-45deg"></i> Itens Relacionados</h5>
                    </div>
                    <div class="card-body related-links">
                        <ul class="list-unstyled">
                            <?php foreach ($pageData['relatedItems'] as $item): ?>
                                <li class="mb-2">
                                    <a href="<?= htmlspecialchars($item['link']) ?>" class="text-decoration-none">
                                        <i class="bi bi-arrow-right-circle text-primary"></i> <?= htmlspecialchars($item['title']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="bi bi-question-circle"></i> Ajuda</h5>
                    </div>
                    <div class="card-body">
                        <p>Precisa de ajuda? Entre em contato conosco.</p>
                        <a href="contato.php" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-envelope"></i> Página de Contato
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light py-4 mt-5">
        <div class="container">
            <div class="text-center text-muted">
                <p class="mb-0">© <?= date('Y') ?> Todos os direitos reservados</p>
                <p class="mb-0">Página carregada em <?= number_format(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"], 3) ?> segundos</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle com Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
