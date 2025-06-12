<?php
// Definir o ano atual para o footer
$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducaTech - Aprenda Inglês e Python Brincando!</title>
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
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Cabeçalho */
        .header {
            text-align: center;
            margin-bottom: 30px;
            animation: float 3s ease-in-out infinite;
        }
        
        .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 3.5rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 10px;
            text-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        }
        
        .icon-row {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .icon {
            font-size: 2rem;
        }
        
        .icon-purple {
            color: #6a11cb;
            animation: wiggle 1s ease-in-out infinite;
        }
        
        .icon-pink {
            color: #e83e8c;
            animation: bounce-slow 2s ease-in-out infinite;
        }
        
        .icon-blue {
            color: #2575fc;
            animation: wiggle 1s ease-in-out infinite;
        }
        
        /* Card principal */
        .main-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 40px;
            border: 4px solid #e0c3fc;
            transition: all 0.3s ease;
        }
        
        .main-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .description {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 30px;
            line-height: 1.6;
            font-weight: 600;
        }
        
        .highlight {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 10px;
            border-radius: 20px;
            font-weight: 700;
            margin: 0 5px;
        }
        
        .highlight-green {
            background-color: #d4edda;
            color: #28a745;
        }
        
        .highlight-yellow {
            background-color: #fff3cd;
            color: #ffc107;
        }
        
        .highlight-pink {
            background-color: #f8d7da;
            color: #e83e8c;
        }
        
        /* Cards de recursos */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .feature-card {
            padding: 25px;
            border-radius: 15px;
            color: white;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        .card-green {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }
        
        .card-blue {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .card-purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .card-text {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        /* Botões */
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);
            background-size: 300% 300%;
            animation: gradient-shift 3s ease infinite;
        }
        
        .btn-secondary {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        
        .btn-tertiary {
            background: linear-gradient(to right, #f6d365, #fda085);
        }
        
        /* Imagem */
        .image-container {
            position: relative;
            width: fit-content;
            margin: 0 auto;
        }
        
        .main-image {
            width: 200px;
            border-radius: 15px;
            border: 4px solid white;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: float 3s ease-in-out infinite;
        }
        
        .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 40px;
            height: 40px;
            background-color: #ffc107;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            animation: bounce-slow 2s ease-in-out infinite;
        }
        
        /* Estatísticas */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 40px;
        }
        
        .stat-card {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-purple { color: #6a11cb; }
        .stat-green { color: #28a745; }
        .stat-blue { color: #2575fc; }
        .stat-pink { color: #e83e8c; }
        
        .stat-text {
            font-size: 0.85rem;
            color: #666;
        }
        
        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-bottom: 20px;
        }
        
        .footer-content {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.6);
            padding: 10px 20px;
            border-radius: 50px;
        }
        
        .footer-text {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
        }
        
        .heart-icon {
            color: #e83e8c;
        }
        
        /* Elementos decorativos */
        .star {
            position: absolute;
            color: #ffd700;
            font-size: 1rem;
            z-index: -1;
            animation: twinkle 2s ease-in-out infinite alternate;
        }
        
        /* Animações */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(3deg); }
            75% { transform: rotate(-3deg); }
        }
        
        @keyframes twinkle {
            from { opacity: 0.3; }
            to { opacity: 1; }
        }
        
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .logo {
                font-size: 2.5rem;
            }
            
            .description {
                font-size: 1.2rem;
            }
            
            .buttons-container {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            .main-image {
                width: 150px;
            }
        }
    </style>
</head>
<body>
    <!-- Elementos decorativos -->
    <i class="fa fa-star star" style="top: 10%; left: 10%;"></i>
    <i class="fa fa-star star" style="top: 20%; right: 15%; animation-delay: 1s;"></i>
    <i class="fa fa-star star" style="bottom: 30%; left: 20%; animation-delay: 2s;"></i>
    <i class="fa fa-star star" style="top: 60%; right: 10%; animation-delay: 0.5s;"></i>
    <i class="fa fa-star star" style="bottom: 20%; right: 30%; animation-delay: 1.5s;"></i>

    <div class="container">
        <!-- Cabeçalho -->
        <header class="header">
            <h1 class="logo">EducaTech</h1>
            <div class="icon-row">
                <i class="fa fa-graduation-cap icon icon-purple"></i>
                <i class="fa fa-gamepad icon icon-pink"></i>
                <i class="fa fa-code icon icon-blue"></i>
            </div>
        </header>

        <!-- Card Principal -->
        <main class="main-card">
            <!-- Descrição -->
            <p class="description">
                Ensinar 
                <span class="highlight highlight-green">
                    <i class="fa fa-globe"></i> Inglês
                </span> 
                e 
                <span class="highlight highlight-yellow">
                    <i class="fa fa-code"></i> Python
                </span> 
                de forma 
                <span class="highlight highlight-pink">
                    <i class="fa fa-gamepad"></i> gamificada
                </span> 
                para crianças!
            </p>

            <!-- Cards de Recursos -->
            <div class="cards-grid">
                <div class="feature-card card-green">
                    <i class="fa fa-play-circle card-icon"></i>
                    <h3 class="card-title">Jogos Interativos</h3>
                    <p class="card-text">Aprenda brincando com jogos divertidos!</p>
                </div>
                
                <div class="feature-card card-blue">
                    <i class="fa fa-trophy card-icon"></i>
                    <h3 class="card-title">Sistema de Pontos</h3>
                    <p class="card-text">Ganhe pontos e conquiste medalhas!</p>
                </div>
                
                <div class="feature-card card-purple">
                    <i class="fa fa-users card-icon"></i>
                    <h3 class="card-title">Aprenda com Amigos</h3>
                    <p class="card-text">Desafie seus amigos e aprendam juntos!</p>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="buttons-container">
                <a href="/licoes" class="btn btn-primary">
                    <i class="fa fa-rocket"></i>
                    Começar a Aventura!
                </a>
                
                <a href="/login" class="btn btn-secondary">
                    <i class="fa fa-sign-in"></i>
                    Entrar
                </a>
                
                <a href="/sobre" class="btn btn-tertiary">
                    <i class="fa fa-info-circle"></i>
                    Saiba Mais
                </a>
            </div>

            <!-- Imagem Ilustrativa -->
            <div class="image-container">
                <img src="https://cdn.pixabay.com/photo/2017/01/31/13/14/children-2025107_1280.png" 
                     alt="Crianças aprendendo" 
                     class="main-image">
                <div class="badge">
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </main>

        <!-- Seção de Estatísticas -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number stat-purple">1000+</div>
                <div class="stat-text">Crianças Felizes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number stat-green">50+</div>
                <div class="stat-text">Lições Divertidas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number stat-blue">25+</div>
                <div class="stat-text">Jogos Interativos</div>
            </div>
            <div class="stat-card">
                <div class="stat-number stat-pink">100%</div>
                <div class="stat-text">Diversão Garantida</div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p class="footer-text">
                <i class="fa fa-heart heart-icon"></i>
                &copy; <?php echo $currentYear; ?> EducaTech - Feito com amor para as crianças!
                <i class="fa fa-heart heart-icon"></i>
            </p>
        </div>
    </footer>

    <!-- Script para interatividade adicional -->
    <script>
        // Adiciona efeito de clique nos botões
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Cria estrelas aleatórias
        function createStar() {
            const star = document.createElement('i');
            star.className = 'fa fa-star star';
            star.style.position = 'fixed';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.fontSize = (Math.random() * 10 + 10) + 'px';
            star.style.animationDelay = Math.random() * 2 + 's';
            star.style.zIndex = '-1';
            
            document.body.appendChild(star);
            
            // Remove a estrela após 5 segundos
            setTimeout(() => {
                star.remove();
            }, 5000);
        }

        // Cria uma nova estrela a cada 3 segundos
        setInterval(createStar, 3000);
    </script>
</body>
</html>