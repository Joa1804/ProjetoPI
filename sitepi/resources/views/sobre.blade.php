<?php
$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - EducaTech</title>
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
        
        .subtitle {
            font-size: 1.8rem;
            font-family: 'Fredoka One', cursive;
            color: #6a11cb;
            margin-bottom: 20px;
            text-shadow: 0px 1px 3px rgba(0,0,0,0.1);
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
        
        /* Conteúdo principal */
        .about-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 40px;
            border: 4px solid #e0c3fc;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Decoração do card */
        .card-decoration {
            position: absolute;
            font-size: 15rem;
            opacity: 0.03;
            z-index: 0;
        }
        
        .deco-1 {
            top: -30px;
            right: -30px;
            transform: rotate(15deg);
            color: #6a11cb;
        }
        
        .deco-2 {
            bottom: -30px;
            left: -30px;
            transform: rotate(-15deg);
            color: #e83e8c;
        }
        
        /* Seções de conteúdo */
        .content-section {
            position: relative;
            z-index: 1;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out;
        }
        
        .section-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            color: #6a11cb;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #444;
            margin-bottom: 20px;
            padding-left: 35px;
            border-left: 4px solid #e0c3fc;
        }
        
        /* Missão, Visão, Valores */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .value-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid;
            transition: all 0.3s ease;
        }
        
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .value-card.mission {
            border-color: #4facfe;
        }
        
        .value-card.vision {
            border-color: #e83e8c;
        }
        
        .value-card.values {
            border-color: #43e97b;
        }
        
        .value-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.3rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .mission .value-title { color: #4facfe; }
        .vision .value-title { color: #e83e8c; }
        .values .value-title { color: #43e97b; }
        
        .value-text {
            font-size: 1rem;
            line-height: 1.5;
            color: #555;
        }
        
        /* Equipe */
        .team-section {
            margin: 40px 0;
            text-align: center;
        }
        
        .team-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.8rem;
            color: #6a11cb;
            margin-bottom: 20px;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .team-member {
            background-color: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .team-member:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .member-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }
        
        .member-name {
            font-family: 'Fredoka One', cursive;
            font-size: 1.2rem;
            color: #6a11cb;
            margin-bottom: 5px;
        }
        
        .member-role {
            font-size: 0.9rem;
            color: #e83e8c;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .member-bio {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.4;
        }
        
        /* Botões */
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
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
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-primary {
            background: linear-gradient(to right, #4facfe, #00f2fe);
        }
        
        /* Timeline */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            width: 6px;
            background: linear-gradient(to bottom, #e0c3fc, #8ec5fc);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
            border-radius: 10px;
        }
        
        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            animation: fadeIn 1s ease-out;
        }
        
        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }
        
        .left {
            left: 0;
            text-align: right;
        }
        
        .right {
            left: 50%;
        }
        
        .left::after {
            right: -12px;
        }
        
        .right::after {
            left: -12px;
        }
        
        .timeline-content {
            padding: 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .timeline-year {
            font-family: 'Fredoka One', cursive;
            font-size: 1.2rem;
            color: #6a11cb;
            margin-bottom: 5px;
        }
        
        .timeline-text {
            font-size: 0.95rem;
            line-height: 1.5;
            color: #555;
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
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .logo {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.5rem;
            }
            
            .timeline::before {
                left: 31px;
            }
            
            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }
            
            .timeline-item::after {
                left: 18px;
            }
            
            .left {
                text-align: left;
            }
            
            .right {
                left: 0;
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
            <h2 class="subtitle">Sobre Nós</h2>
            <div class="icon-row">
                <i class="fa fa-graduation-cap icon icon-purple"></i>
                <i class="fa fa-gamepad icon icon-pink"></i>
                <i class="fa fa-code icon icon-blue"></i>
            </div>
        </header>

        <!-- Card Principal -->
        <main class="about-card">
            <!-- Decorações do card -->
            <div class="card-decoration deco-1">
                <i class="fa fa-code"></i>
            </div>
            <div class="card-decoration deco-2">
                <i class="fa fa-gamepad"></i>
            </div>
            
            <!-- Seção de introdução -->
            <section class="content-section">
                <h3 class="section-title">
                    <i class="fa fa-rocket" style="color: #e83e8c;"></i>
                    Nossa História
                </h3>
                <p class="section-text">
                    O EducaTech nasceu para tornar o aprendizado de Inglês e Python divertido e acessível para crianças! 
                    Criado por educadores e programadores apaixonados, nosso objetivo é transformar a educação tecnológica
                    em uma jornada emocionante e cheia de descobertas.
                </p>
            </section>
            
            <!-- Seção de metodologia -->
            <section class="content-section">
                <h3 class="section-title">
                    <i class="fa fa-lightbulb" style="color: #ffc107;"></i>
                    Nossa Metodologia
                </h3>
                <p class="section-text">
                    Utilizamos desafios, jogos e conquistas para motivar o estudo, tornando cada lição uma aventura.
                    Nossa abordagem gamificada mantém as crianças engajadas enquanto aprendem conceitos importantes
                    de forma natural e divertida.
                </p>
            </section>
            
            <!-- Seção de objetivo -->
            <section class="content-section">
                <h3 class="section-title">
                    <i class="fa fa-bullseye" style="color: #43e97b;"></i>
                    Nosso Objetivo
                </h3>
                <p class="section-text">
                    Nosso objetivo é preparar as crianças para o futuro, desenvolvendo habilidades de linguagem e programação
                    de forma lúdica e envolvente. Acreditamos que aprender a programar e falar inglês desde cedo abre portas
                    para infinitas possibilidades no mundo digital.
                </p>
            </section>
            
            <!-- Missão, Visão e Valores -->
            <div class="values-grid">
                <div class="value-card mission">
                    <h4 class="value-title">
                        <i class="fa fa-flag"></i>
                        Missão
                    </h4>
                    <p class="value-text">
                        Transformar o aprendizado de tecnologia e idiomas em uma experiência divertida e acessível para todas as crianças.
                    </p>
                </div>
                
                <div class="value-card vision">
                    <h4 class="value-title">
                        <i class="fa fa-eye"></i>
                        Visão
                    </h4>
                    <p class="value-text">
                        Ser referência em educação tecnológica infantil, formando uma geração de crianças bilíngues e programadoras.
                    </p>
                </div>
                
                <div class="value-card values">
                    <h4 class="value-title">
                        <i class="fa fa-heart"></i>
                        Valores
                    </h4>
                    <p class="value-text">
                        Diversão, Criatividade, Inclusão, Inovação e Aprendizado Contínuo.
                    </p>
                </div>
            </div>
            
            <!-- Nossa jornada (timeline) -->
            <h3 class="section-title" style="margin-top: 40px; text-align: center;">
                <i class="fa fa-clock" style="color: #6a11cb;"></i>
                Nossa Jornada
            </h3>
            
            <div class="timeline">
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h4 class="timeline-year">2022</h4>
                        <p class="timeline-text">Nascimento da ideia do EducaTech durante um hackathon educacional.</p>
                    </div>
                </div>
                
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h4 class="timeline-year">2023</h4>
                        <p class="timeline-text">Desenvolvimento da plataforma e criação dos primeiros jogos educativos.</p>
                    </div>
                </div>
                
                <div class="timeline-item left">
                    <div class="timeline-content">
                        <h4 class="timeline-year">2024</h4>
                        <p class="timeline-text">Lançamento oficial do EducaTech e expansão para escolas parceiras.</p>
                    </div>
                </div>
                
                <div class="timeline-item right">
                    <div class="timeline-content">
                        <h4 class="timeline-year">Futuro</h4>
                        <p class="timeline-text">Expansão internacional e desenvolvimento de aplicativos móveis.</p>
                    </div>
                </div>
            </div>
            
            <!-- Nossa equipe -->
            <div class="team-section">
                <h3 class="team-title">
                    <i class="fa fa-users" style="color: #6a11cb;"></i>
                    Nossa Equipe
                </h3>
                
                <div class="team-grid">
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fa fa-chalkboard-teacher"></i>
                        </div>
                        <h4 class="member-name">Prof. Ana</h4>
                        <p class="member-role">Especialista em Educação</p>
                        <p class="member-bio">Pedagoga com 15 anos de experiência em educação infantil e tecnologia.</p>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fa fa-laptop-code"></i>
                        </div>
                        <h4 class="member-name">Carlos</h4>
                        <p class="member-role">Desenvolvedor Python</p>
                        <p class="member-bio">Programador apaixonado por ensinar código para crianças de forma divertida.</p>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fa fa-language"></i>
                        </div>
                        <h4 class="member-name">Júlia</h4>
                        <p class="member-role">Professora de Inglês</p>
                        <p class="member-bio">Especialista em ensino de idiomas para crianças através de jogos e música.</p>
                    </div>
                    
                    <div class="team-member">
                        <div class="member-avatar">
                            <i class="fa fa-palette"></i>
                        </div>
                        <h4 class="member-name">Miguel</h4>
                        <p class="member-role">Designer de Jogos</p>
                        <p class="member-bio">Criador de experiências interativas que tornam o aprendizado divertido.</p>
                    </div>
                </div>
            </div>
            
            <!-- Botão de voltar -->
            <div class="buttons-container">
                <a href="index.php" class="btn btn-primary">
                    <i class="fa fa-arrow-left"></i>
                    Voltar para o Início
                </a>
            </div>
        </main>
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
        
        // Animação de entrada para elementos da timeline
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.timeline-item').forEach(item => {
            item.style.opacity = 0;
            item.style.transform = 'translateY(20px)';
            observer.observe(item);
        });
    </script>
</body>
</html>