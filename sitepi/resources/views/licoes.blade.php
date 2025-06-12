<?php
session_start();
$currentYear = date('Y');

// Dados das lições (simulando um sistema de progresso)
$licoes = [
    1 => ['titulo' => 'Hello World!', 'tipo' => 'ingles', 'desbloqueada' => true, 'completa' => true, 'estrelas' => 3],
    2 => ['titulo' => 'Minha Primeira Variável', 'tipo' => 'python', 'desbloqueada' => true, 'completa' => true, 'estrelas' => 2],
    3 => ['titulo' => 'Colors & Numbers', 'tipo' => 'ingles', 'desbloqueada' => true, 'completa' => true, 'estrelas' => 3],
    4 => ['titulo' => 'Print e Input', 'tipo' => 'python', 'desbloqueada' => true, 'completa' => false, 'estrelas' => 0],
    5 => ['titulo' => 'Family & Friends', 'tipo' => 'ingles', 'desbloqueada' => true, 'completa' => false, 'estrelas' => 0],
    6 => ['titulo' => 'Condicionais IF', 'tipo' => 'python', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    7 => ['titulo' => 'Animals & Nature', 'tipo' => 'ingles', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    8 => ['titulo' => 'Loops FOR', 'tipo' => 'python', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    9 => ['titulo' => 'Food & Drinks', 'tipo' => 'ingles', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    10 => ['titulo' => 'Listas e Arrays', 'tipo' => 'python', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    11 => ['titulo' => 'Sports & Games', 'tipo' => 'ingles', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    12 => ['titulo' => 'Funções', 'tipo' => 'python', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    13 => ['titulo' => 'Weather & Seasons', 'tipo' => 'ingles', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    14 => ['titulo' => 'Classes e Objetos', 'tipo' => 'python', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
    15 => ['titulo' => 'Travel & Adventure', 'tipo' => 'ingles', 'desbloqueada' => false, 'completa' => false, 'estrelas' => 0],
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Lições - EducaTech</title>
    <!-- Fontes do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Header fixo */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-bottom: 3px solid #e0c3fc;
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 1.8rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .progress-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .progress-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 700;
            color: #6a11cb;
        }
        
        .btn-back {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 172, 254, 0.4);
        }
        
        /* Container do mapa */
        .map-container {
            padding-top: 100px;
            padding-bottom: 50px;
            min-height: 100vh;
            position: relative;
        }
        
        /* Caminho do mapa */
        .map-path {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* SVG do caminho */
        .path-svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        }
        
        .path-line {
            stroke: #fff;
            stroke-width: 8;
            fill: none;
            stroke-dasharray: 20, 10;
            stroke-linecap: round;
            opacity: 0.8;
            animation: dash 3s linear infinite;
        }
        
        @keyframes dash {
            to {
                stroke-dashoffset: -30;
            }
        }
        
        /* Lições no mapa */
        .lesson-node {
            position: absolute;
            z-index: 10;
            cursor: pointer;
            transition: all 0.3s ease;
            animation: float 3s ease-in-out infinite;
        }
        
        .lesson-node:hover {
            transform: scale(1.1) translateY(-5px);
        }
        
        /* Círculo da lição */
        .lesson-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            font-weight: 700;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border: 4px solid white;
            position: relative;
            overflow: hidden;
        }
        
        /* Estados das lições */
        .lesson-completa {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .lesson-disponivel {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            animation: pulse 2s ease-in-out infinite;
        }
        
        .lesson-bloqueada {
            background: linear-gradient(135deg, #95a5a6 0%, #7f8c8d 100%);
            cursor: not-allowed;
        }
        
        /* Tipos de lição */
        .lesson-ingles {
            border-color: #e74c3c;
        }
        
        .lesson-python {
            border-color: #f39c12;
        }
        
        /* Título da lição */
        .lesson-title {
            position: absolute;
            top: 90px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 8px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 700;
            color: #333;
            white-space: nowrap;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid;
        }
        
        .lesson-ingles .lesson-title {
            border-color: #e74c3c;
            color: #e74c3c;
        }
        
        .lesson-python .lesson-title {
            border-color: #f39c12;
            color: #f39c12;
        }
        
        /* Estrelas */
        .lesson-stars {
            position: absolute;
            top: -15px;
            right: -15px;
            display: flex;
            gap: 2px;
        }
        
        .star {
            color: #ffd700;
            font-size: 0.8rem;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }
        
        .star.empty {
            color: rgba(255, 255, 255, 0.3);
        }
        
        /* Posicionamento das lições (estilo zigue-zague) */
        .lesson-1 { top: 50px; left: 50%; transform: translateX(-50%); }
        .lesson-2 { top: 200px; left: 20%; }
        .lesson-3 { top: 350px; right: 20%; }
        .lesson-4 { top: 500px; left: 30%; }
        .lesson-5 { top: 650px; right: 25%; }
        .lesson-6 { top: 800px; left: 15%; }
        .lesson-7 { top: 950px; right: 30%; }
        .lesson-8 { top: 1100px; left: 25%; }
        .lesson-9 { top: 1250px; right: 15%; }
        .lesson-10 { top: 1400px; left: 35%; }
        .lesson-11 { top: 1550px; right: 35%; }
        .lesson-12 { top: 1700px; left: 20%; }
        .lesson-13 { top: 1850px; right: 20%; }
        .lesson-14 { top: 2000px; left: 30%; }
        .lesson-15 { top: 2150px; left: 50%; transform: translateX(-50%); }
        
        /* Altura do container do mapa */
        .map-path {
            height: 2300px;
        }
        
        /* Modal da lição */
        .lesson-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            position: relative;
            animation: modalSlideIn 0.3s ease-out;
        }
        
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.8);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .modal-close {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
        }
        
        .modal-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        
        .modal-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #6a11cb;
        }
        
        .modal-description {
            font-size: 1rem;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }
        
        .modal-btn {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 5px;
        }
        
        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .modal-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        /* Elementos decorativos */
        .floating-element {
            position: absolute;
            font-size: 2rem;
            opacity: 0.1;
            animation: float 4s ease-in-out infinite;
            pointer-events: none;
        }
        
        /* Animações */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 10px;
            }
            
            .progress-info {
                gap: 10px;
            }
            
            .map-path {
                padding: 10px;
            }
            
            .lesson-circle {
                width: 60px;
                height: 60px;
                font-size: 1.2rem;
            }
            
            .lesson-title {
                font-size: 0.7rem;
                top: 70px;
            }
            
            /* Reposicionar lições para mobile */
            .lesson-1, .lesson-15 { left: 50%; }
            .lesson-2, .lesson-4, .lesson-6, .lesson-8, .lesson-10, .lesson-12, .lesson-14 { left: 20%; }
            .lesson-3, .lesson-5, .lesson-7, .lesson-9, .lesson-11, .lesson-13 { right: 20%; left: auto; }
        }
    </style>
</head>
<body>
    <!-- Header fixo -->
    <header class="header">
        <div class="header-content">
            <h1 class="logo">EducaTech - Mapa de Aventuras</h1>
            <div class="progress-info">
                <div class="progress-item">
                    <i class="fa fa-trophy"></i>
                    <span>Nível 3</span>
                </div>
                <div class="progress-item">
                    <i class="fa fa-star"></i>
                    <span>8/45</span>
                </div>
                <div class="progress-item">
                    <i class="fa fa-fire"></i>
                    <span>5 dias</span>
                </div>
            </div>
            <a href="index.php" class="btn-back">
                <i class="fa fa-home"></i>
                Início
            </a>
        </div>
    </header>

    <!-- Container do mapa -->
    <div class="map-container">
        <!-- Elementos decorativos flutuantes -->
        <div class="floating-element" style="top: 10%; left: 5%; color: #ff6b9d;">
            <i class="fa fa-heart"></i>
        </div>
        <div class="floating-element" style="top: 30%; right: 8%; color: #4ecdc4;">
            <i class="fa fa-star"></i>
        </div>
        <div class="floating-element" style="top: 50%; left: 3%; color: #ffd93d;">
            <i class="fa fa-rocket"></i>
        </div>
        <div class="floating-element" style="top: 70%; right: 5%; color: #ff6b9d;">
            <i class="fa fa-gamepad"></i>
        </div>
        <div class="floating-element" style="top: 90%; left: 8%; color: #4ecdc4;">
            <i class="fa fa-trophy"></i>
        </div>

        <div class="map-path">
            <!-- SVG do caminho -->
            <svg class="path-svg" viewBox="0 0 800 2300">
                <path class="path-line" d="M400,50 Q200,200 160,350 Q120,500 240,650 Q360,800 120,950 Q-80,1100 200,1250 Q480,1400 280,1550 Q80,1700 160,1850 Q240,2000 400,2150" />
            </svg>

            <!-- Lições no mapa -->
            <?php foreach ($licoes as $id => $licao): ?>
                <div class="lesson-node lesson-<?php echo $id; ?> 
                    <?php echo $licao['completa'] ? 'lesson-completa' : ($licao['desbloqueada'] ? 'lesson-disponivel' : 'lesson-bloqueada'); ?>
                    lesson-<?php echo $licao['tipo']; ?>"
                    onclick="openLessonModal(<?php echo $id; ?>)"
                    style="animation-delay: <?php echo ($id * 0.1); ?>s;">
                    
                    <div class="lesson-circle">
                        <?php if ($licao['completa']): ?>
                            <i class="fa fa-check"></i>
                        <?php elseif ($licao['desbloqueada']): ?>
                            <span><?php echo $id; ?></span>
                        <?php else: ?>
                            <i class="fa fa-lock"></i>
                        <?php endif; ?>
                    </div>
                    
                    <div class="lesson-title">
                        <?php echo htmlspecialchars($licao['titulo']); ?>
                    </div>
                    
                    <?php if ($licao['completa']): ?>
                        <div class="lesson-stars">
                            <?php for ($i = 1; $i <= 3; $i++): ?>
                                <i class="fa fa-star star <?php echo $i <= $licao['estrelas'] ? '' : 'empty'; ?>"></i>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal da lição -->
    <div class="lesson-modal" id="lessonModal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeLessonModal()">&times;</span>
            <div class="modal-icon" id="modalIcon"></div>
            <h3 class="modal-title" id="modalTitle"></h3>
            <p class="modal-description" id="modalDescription"></p>
            <div id="modalButtons"></div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Dados das lições (JavaScript)
        const licoesData = <?php echo json_encode($licoes); ?>;
        
        // Descrições das lições
        const descricoes = {
            1: "Aprenda a cumprimentar em inglês e dizer suas primeiras palavras! Uma aventura emocionante te espera.",
            2: "Descubra o que são variáveis em Python e como guardar informações no computador!",
            3: "Explore o mundo das cores e números em inglês através de jogos divertidos!",
            4: "Aprenda a fazer o computador falar com você usando print() e input()!",
            5: "Conheça palavras sobre família e amigos em inglês de forma divertida!",
            6: "Ensine o computador a tomar decisões usando condicionais IF!",
            7: "Descubra nomes de animais e natureza em inglês!",
            8: "Aprenda a repetir ações usando loops FOR em Python!",
            9: "Explore vocabulário sobre comidas e bebidas em inglês!",
            10: "Organize informações usando listas e arrays em Python!",
            11: "Aprenda sobre esportes e jogos em inglês!",
            12: "Crie suas próprias funções em Python!",
            13: "Descubra como falar sobre clima e estações em inglês!",
            14: "Entre no mundo da programação orientada a objetos!",
            15: "Aventure-se com vocabulário de viagem em inglês!"
        };
        
        function openLessonModal(lessonId) {
            const licao = licoesData[lessonId];
            const modal = document.getElementById('lessonModal');
            const modalIcon = document.getElementById('modalIcon');
            const modalTitle = document.getElementById('modalTitle');
            const modalDescription = document.getElementById('modalDescription');
            const modalButtons = document.getElementById('modalButtons');
            
            // Configurar ícone
            if (licao.tipo === 'ingles') {
                modalIcon.innerHTML = '<i class="fa fa-globe" style="color: #e74c3c;"></i>';
            } else {
                modalIcon.innerHTML = '<i class="fa fa-code" style="color: #f39c12;"></i>';
            }
            
            // Configurar título
            modalTitle.textContent = licao.titulo;
            
            // Configurar descrição
            modalDescription.textContent = descricoes[lessonId];
            
            // Configurar botões
            let buttonsHTML = '';
            
            if (licao.completa) {
                buttonsHTML = `
                    <a href="/licao/${lessonId}" class="modal-btn">
                        <i class="fa fa-redo"></i> Jogar Novamente
                    </a>
                    <button class="modal-btn" onclick="closeLessonModal()">
                        <i class="fa fa-times"></i> Fechar
                    </button>
                `;
            } else if (licao.desbloqueada) {
                buttonsHTML = `
                    <a href="/licao/${lessonId}" class="modal-btn">
                        <i class="fa fa-play"></i> Começar Lição
                    </a>
                    <button class="modal-btn" onclick="closeLessonModal()">
                        <i class="fa fa-times"></i> Fechar
                    </button>
                `;
            } else {
                buttonsHTML = `
                    <button class="modal-btn" disabled>
                        <i class="fa fa-lock"></i> Lição Bloqueada
                    </button>
                    <button class="modal-btn" onclick="closeLessonModal()">
                        <i class="fa fa-times"></i> Fechar
                    </button>
                `;
            }
            
            modalButtons.innerHTML = buttonsHTML;
            
            // Mostrar modal
            modal.style.display = 'flex';
        }
        
        function closeLessonModal() {
            document.getElementById('lessonModal').style.display = 'none';
        }
        
        function startLesson(lessonId) {
            alert(`🎮 Iniciando lição ${lessonId}!\n\n🚧 Em breve teremos as lições interativas implementadas!\n\nPor enquanto, você pode explorar o mapa e ver seu progresso.`);
            closeLessonModal();
        }
        
        // Fechar modal clicando fora
        document.getElementById('lessonModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLessonModal();
            }
        });
        
        // Efeitos visuais adicionais
        document.addEventListener('DOMContentLoaded', function() {
            // Adicionar efeito de brilho nas lições disponíveis
            const availableLessons = document.querySelectorAll('.lesson-disponivel');
            availableLessons.forEach(lesson => {
                setInterval(() => {
                    lesson.style.boxShadow = '0 0 20px rgba(102, 126, 234, 0.8)';
                    setTimeout(() => {
                        lesson.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.2)';
                    }, 1000);
                }, 3000);
            });
        });
        
        // Scroll suave para lições
        function scrollToLesson(lessonId) {
            const lesson = document.querySelector(`.lesson-${lessonId}`);
            if (lesson) {
                lesson.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
    </script>
</body>
</html>