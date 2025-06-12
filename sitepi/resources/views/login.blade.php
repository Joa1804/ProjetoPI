<?php
// Iniciar sessão
session_start();

// Variáveis para mensagens
$message = '';
$messageType = '';

// Processar login quando o formulário for enviado
if ($_POST) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validação simples (aqui você conectaria com o banco de dados)
    if (!empty($username) && !empty($password)) {
        // Exemplo de validação simples - substitua pela sua lógica de banco de dados
        if ($username === 'crianca' && $password === '123456') {
            $_SESSION['user_logged_in'] = true;
            $_SESSION['username'] = $username;
            $message = 'Login realizado com sucesso! Redirecionando...';
            $messageType = 'success';
            // Redirecionar após 2 segundos
            header("refresh:2;url=index.php");
        } else {
            $message = 'Usuário ou senha incorretos. Tente novamente!';
            $messageType = 'error';
        }
    } else {
        $message = 'Por favor, preencha todos os campos!';
        $messageType = 'error';
    }
}

$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EducaTech</title>
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
            padding: 20px;
            position: relative;
            overflow-x: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Elementos decorativos */
        .star {
            position: absolute;
            color: #ffd700;
            font-size: 1rem;
            z-index: -1;
            animation: twinkle 2s ease-in-out infinite alternate;
        }
        
        .floating-icon {
            position: absolute;
            font-size: 2rem;
            opacity: 0.3;
            animation: float 4s ease-in-out infinite;
        }
        
        /* Container principal */
        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            position: relative;
            animation: slideIn 0.8s ease-out;
        }
        
        /* Cabeçalho */
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 2.5rem;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 10px;
            animation: bounce-slow 3s ease-in-out infinite;
        }
        
        .subtitle {
            font-size: 1.2rem;
            color: #666;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .welcome-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .welcome-icon {
            font-size: 1.5rem;
            padding: 8px;
            border-radius: 50%;
            color: white;
            animation: wiggle 2s ease-in-out infinite;
        }
        
        .icon-purple { background: linear-gradient(45deg, #667eea, #764ba2); }
        .icon-pink { background: linear-gradient(45deg, #f093fb, #f5576c); }
        .icon-blue { background: linear-gradient(45deg, #4facfe, #00f2fe); }
        
        /* Formulário */
        .login-form {
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            display: block;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
            font-size: 1rem;
        }
        
        .form-input {
            width: 100%;
            padding: 15px 20px;
            padding-left: 50px;
            border: 3px solid #e0c3fc;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            background-color: #f8f9ff;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .form-input:focus {
            border-color: #6a11cb;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
            transform: translateY(-2px);
        }
        
        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #6a11cb;
            font-size: 1.1rem;
            margin-top: 12px;
        }
        
        /* Botões */
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 700;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(45deg, #764ba2, #667eea);
        }
        
        .btn-secondary {
            background: linear-gradient(45deg, #f093fb, #f5576c);
            color: white;
            box-shadow: 0 4px 15px rgba(240, 147, 251, 0.4);
        }
        
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(240, 147, 251, 0.6);
        }
        
        .btn-back {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.4);
            font-size: 1rem;
            padding: 12px;
        }
        
        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.6);
        }
        
        /* Mensagens */
        .message {
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
            animation: slideDown 0.5s ease-out;
        }
        
        .message-success {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        
        .message-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        
        /* Links */
        .links {
            text-align: center;
            margin-top: 20px;
        }
        
        .link {
            color: #6a11cb;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .link:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        /* Seção de ajuda */
        .help-section {
            background: linear-gradient(45deg, #fff3cd, #ffeaa7);
            border-radius: 15px;
            padding: 20px;
            margin-top: 25px;
            text-align: center;
            border: 2px solid #ffd93d;
        }
        
        .help-title {
            font-weight: 700;
            color: #856404;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .help-text {
            color: #856404;
            font-size: 0.9rem;
            line-height: 1.4;
        }
        
        /* Footer */
        .footer {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }
        
        .footer-content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #666;
            font-weight: 600;
        }
        
        /* Animações */
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        @keyframes wiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }
        
        @keyframes twinkle {
            from { opacity: 0.3; }
            to { opacity: 1; }
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 25px;
                margin: 20px;
            }
            
            .logo {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1rem;
            }
            
            .form-input {
                padding: 12px 15px;
                padding-left: 45px;
            }
        }
    </style>
</head>
<body>
    <!-- Elementos decorativos -->
    <i class="fa fa-star star" style="top: 15%; left: 10%;"></i>
    <i class="fa fa-heart star" style="top: 25%; right: 15%; color: #ff6b9d; animation-delay: 1s;"></i>
    <i class="fa fa-star star" style="bottom: 30%; left: 20%; animation-delay: 2s;"></i>
    <i class="fa fa-rocket star" style="top: 70%; right: 10%; color: #4ecdc4; animation-delay: 0.5s;"></i>
    <i class="fa fa-star star" style="bottom: 15%; right: 25%; animation-delay: 1.5s;"></i>
    
    <!-- Ícones flutuantes -->
    <i class="fa fa-gamepad floating-icon" style="top: 20%; left: 5%; color: #ff6b9d; animation-delay: 0s;"></i>
    <i class="fa fa-code floating-icon" style="bottom: 25%; right: 8%; color: #4ecdc4; animation-delay: 2s;"></i>
    <i class="fa fa-graduation-cap floating-icon" style="top: 60%; left: 8%; color: #ffd93d; animation-delay: 1s;"></i>

    <div class="login-container">
        <!-- Cabeçalho -->
        <div class="header">
            <h1 class="logo">EducaTech</h1>
            <p class="subtitle">Bem-vindo de volta!</p>
            <div class="welcome-icons">
                <div class="welcome-icon icon-purple">
                    <i class="fa fa-user"></i>
                </div>
                <div class="welcome-icon icon-pink">
                    <i class="fa fa-heart"></i>
                </div>
                <div class="welcome-icon icon-blue">
                    <i class="fa fa-star"></i>
                </div>
            </div>
        </div>

        <!-- Mensagem de feedback -->
        @if(session('message'))
            <div class="message {{ session('messageType') === 'error' ? 'message-error' : 'message-success' }}">
                <i class="fa {{ session('messageType') === 'error' ? 'fa-exclamation-triangle' : 'fa-check-circle' }}"></i>
                {{ session('message') }}
            </div>
        @endif

        <!-- Formulário de Login -->
        <form class="login-form" method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="username" class="form-label">
                    <i class="fa fa-user"></i> Nome de Usuário
                </label>
                <div style="position: relative;">
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        class="form-input" 
                        placeholder="Digite seu nome de usuário"
                        value="{{ old('username') }}"
                        required
                    >
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fa fa-lock"></i> Senha
                </label>
                <div style="position: relative;">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input" 
                        placeholder="Digite sua senha"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-sign-in"></i>
                Entrar na Aventura!
            </button>
        </form>

        <!-- Botões adicionais -->
        <button type="button" class="btn btn-secondary" onclick="showRegisterInfo()">
            <i class="fa fa-user-plus"></i>
            Criar Nova Conta
        </button>

        <a href="index.php" class="btn btn-back">
            <i class="fa fa-arrow-left"></i>
            Voltar ao Início
        </a>

        <!-- Links úteis -->
        <div class="links">
            <a href="#" class="link" onclick="showForgotPassword()">
                <i class="fa fa-question-circle"></i>
                Esqueceu a senha?
            </a>
        </div>

        <!-- Seção de ajuda -->
        <div class="help-section">
            <div class="help-title">
                <i class="fa fa-lightbulb"></i>
                Dica para Pais e Professores
            </div>
            <div class="help-text">
                <strong>Usuário de teste:</strong> crianca<br>
                <strong>Senha de teste:</strong> 123456<br>
                <small>Use essas credenciais para testar o sistema!</small>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <i class="fa fa-heart" style="color: #e83e8c;"></i>
            &copy; <?php echo $currentYear; ?> EducaTech
            <i class="fa fa-heart" style="color: #e83e8c;"></i>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Adicionar efeitos visuais aos botões
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Função para mostrar informações de registro
        function showRegisterInfo() {
            alert('🎉 Em breve teremos a página de cadastro!\n\nPor enquanto, use as credenciais de teste:\n👤 Usuário: crianca\n🔒 Senha: 123456');
        }

        // Função para esqueceu a senha
        function showForgotPassword() {
            alert('🤔 Esqueceu a senha?\n\nPeça ajuda para um adulto ou use:\n👤 Usuário: crianca\n🔒 Senha: 123456');
        }

        // Criar estrelas dinâmicas
        function createStar() {
            const icons = ['fa-star', 'fa-heart', 'fa-sparkles'];
            const colors = ['#ffd700', '#ff6b9d', '#4ecdc4', '#ffd93d'];
            
            const star = document.createElement('i');
            star.className = `fa ${icons[Math.floor(Math.random() * icons.length)]} star`;
            star.style.position = 'fixed';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.color = colors[Math.floor(Math.random() * colors.length)];
            star.style.fontSize = (Math.random() * 8 + 8) + 'px';
            star.style.animationDelay = Math.random() * 2 + 's';
            star.style.zIndex = '-1';
            
            document.body.appendChild(star);
            
            setTimeout(() => {
                star.remove();
            }, 4000);
        }

        // Criar estrelas a cada 2 segundos
        setInterval(createStar, 2000);

        // Adicionar efeito de foco nos inputs
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });

        // Auto-hide success message
        <?php if ($messageType === 'success'): ?>
        setTimeout(() => {
            const message = document.querySelector('.message-success');
            if (message) {
                message.style.opacity = '0';
                message.style.transform = 'translateY(-20px)';
            }
        }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>