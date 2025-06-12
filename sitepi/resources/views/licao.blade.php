<?php
session_start();

// Simular dados da lição baseado no ID
$licao_id = $_GET['id'] ?? 1;

// Dados das lições com exercícios
$licoes_data = [
    1 => [
        'titulo' => 'Hello World!',
        'tipo' => 'ingles',
        'exercicios' => [
            [
                'tipo' => 'completar',
                'pergunta' => 'Complete a frase:',
                'frase' => 'Hello, my name ___ John.',
                'opcoes' => ['is', 'are', 'am'],
                'resposta_correta' => 'is',
                'explicacao' => 'Usamos "is" com "my name" porque é terceira pessoa do singular.'
            ],
            [
                'tipo' => 'arrastar',
                'pergunta' => 'Organize as palavras para formar uma frase:',
                'palavras' => ['Hello', 'world', 'beautiful'],
                'resposta_correta' => ['Hello', 'beautiful', 'world'],
                'explicacao' => 'A ordem correta é: Hello beautiful world!'
            ],
            [
                'tipo' => 'multipla_escolha',
                'pergunta' => 'Como se diz "Olá" em inglês?',
                'opcoes' => ['Goodbye', 'Hello', 'Thank you', 'Please'],
                'resposta_correta' => 'Hello',
                'explicacao' => 'Hello é a forma mais comum de cumprimentar em inglês.'
            ],
            [
                'tipo' => 'escrever',
                'pergunta' => 'Escreva "Bom dia" em inglês:',
                'resposta_correta' => 'good morning',
                'explicacao' => 'Good morning é usado para cumprimentar pela manhã.'
            ]
        ]
    ],
    2 => [
        'titulo' => 'Minha Primeira Variável',
        'tipo' => 'python',
        'exercicios' => [
            [
                'tipo' => 'completar',
                'pergunta' => 'Complete o código para criar uma variável:',
                'frase' => 'nome ___ "João"',
                'opcoes' => ['=', '==', '!='],
                'resposta_correta' => '=',
                'explicacao' => 'Usamos = para atribuir um valor a uma variável.'
            ],
            [
                'tipo' => 'arrastar',
                'pergunta' => 'Organize o código Python:',
                'palavras' => ['print(', 'nome', ')'],
                'resposta_correta' => ['print(', 'nome', ')'],
                'explicacao' => 'print(nome) exibe o valor da variável nome.'
            ],
            [
                'tipo' => 'multipla_escolha',
                'pergunta' => 'Qual é a forma correta de criar uma variável em Python?',
                'opcoes' => ['var idade = 10', 'idade = 10', 'int idade = 10', 'idade := 10'],
                'resposta_correta' => 'idade = 10',
                'explicacao' => 'Em Python, criamos variáveis simplesmente atribuindo um valor.'
            ],
            [
                'tipo' => 'escrever',
                'pergunta' => 'Escreva o código para criar uma variável "cor" com valor "azul":',
                'resposta_correta' => 'cor = "azul"',
                'explicacao' => 'Strings em Python devem estar entre aspas.'
            ]
        ]
    ]
];

$licao = $licoes_data[$licao_id] ?? $licoes_data[1];
$exercicio_atual = $_GET['exercicio'] ?? 0;
$total_exercicios = count($licao['exercicios']);

// Processar resposta se enviada
$feedback = '';
$mostrar_feedback = false;
$resposta_correta = false;

if ($_POST && isset($_POST['resposta'])) {
    $exercicio = $licao['exercicios'][$exercicio_atual];
    $resposta_usuario = $_POST['resposta'];
    
    if (is_array($exercicio['resposta_correta'])) {
        // Para exercícios de arrastar, comparar arrays como string
        $resposta_usuario_str = is_array($resposta_usuario) ? implode(' ', $resposta_usuario) : trim($resposta_usuario);
        $resposta_correta_str = implode(' ', $exercicio['resposta_correta']);
        $correto = strtolower($resposta_usuario_str) === strtolower($resposta_correta_str);
    } else {
        $correto = strtolower(trim($resposta_usuario)) === strtolower(trim($exercicio['resposta_correta']));
    }

    if ($correto) {
        $feedback = '🎉 Correto! ' . $exercicio['explicacao'];
        $resposta_correta = true;
    } else {
        $feedback = '❌ Incorreto. ' . $exercicio['explicacao'];
        $resposta_correta = false;
    }
    $mostrar_feedback = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $licao['titulo']; ?> - EducaTech</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
        }
        
        /* Header da lição */
        .lesson-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 20px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .lesson-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            color: #6a11cb;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .lesson-progress {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .progress-bar {
            width: 200px;
            height: 10px;
            background: #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(45deg, #43e97b, #38f9d7);
            border-radius: 10px;
            transition: width 0.3s ease;
            width: <?php echo (($exercicio_atual + 1) / $total_exercicios) * 100; ?>%;
        }
        
        .progress-text {
            font-weight: 700;
            color: #6a11cb;
        }
        
        .btn-exit {
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-exit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }
        
        /* Container principal */
        .lesson-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            min-height: calc(100vh - 80px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        /* Card do exercício */
        .exercise-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            position: relative;
            animation: slideIn 0.5s ease-out;
        }
        
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
        
        .exercise-type {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
        }
        
        .exercise-question {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            line-height: 1.4;
        }
        
        /* Estilos para diferentes tipos de exercício */
        
        /* Completar frase */
        .complete-sentence {
            font-size: 1.3rem;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .word-blank {
            display: inline-block;
            min-width: 100px;
            margin: 0 5px;
            position: relative;
        }
        
        .word-options {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        .word-option {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            padding: 12px 20px;
            border-radius: 15px;
            cursor: pointer;
            font-weight: 700;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
        }
        
        .word-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(79, 172, 254, 0.4);
        }
        
        .word-option.selected {
            background: linear-gradient(45deg, #43e97b, #38f9d7);
        }
        
        /* Arrastar palavras */
        .drag-area {
            min-height: 80px;
            border: 3px dashed #ddd;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }
        
        .drag-area.drag-over {
            border-color: #43e97b;
            background: #e8f5e8;
        }
        
        .draggable-word {
            background: linear-gradient(45deg, #f093fb, #f5576c);
            color: white;
            padding: 10px 15px;
            border-radius: 12px;
            cursor: grab;
            font-weight: 700;
            transition: all 0.3s ease;
            user-select: none;
        }
        
        .draggable-word:hover {
            transform: scale(1.05);
        }
        
        .draggable-word.dragging {
            opacity: 0.5;
            cursor: grabbing;
        }
        
        .word-bank {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        
        /* Múltipla escolha */
        .multiple-choice {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .choice-option {
            background: white;
            border: 3px solid #e0e0e0;
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
        }
        
        .choice-option:hover {
            border-color: #6a11cb;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.2);
        }
        
        .choice-option.selected {
            border-color: #43e97b;
            background: linear-gradient(45deg, #43e97b, #38f9d7);
            color: white;
        }
        
        /* Escrever */
        .write-input {
            width: 100%;
            max-width: 400px;
            padding: 15px 20px;
            border: 3px solid #e0e0e0;
            border-radius: 15px;
            font-size: 1.2rem;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s ease;
            outline: none;
        }
        
        .write-input:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.1);
        }
        
        /* Botões de ação */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        
        .btn-check {
            background: linear-gradient(45deg, #43e97b, #38f9d7);
            color: white;
        }
        
        .btn-check:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 233, 123, 0.4);
        }
        
        .btn-next {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }
        
        .btn-next:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }
        
        .btn-skip {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            color: white;
        }
        
        /* Feedback */
        .feedback {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            text-align: center;
            transform: translateY(100%);
            transition: transform 0.3s ease;
            z-index: 200;
        }
        
        .feedback.show {
            transform: translateY(0);
        }
        
        .feedback.correct {
            background: linear-gradient(45deg, #43e97b, #38f9d7);
        }
        
        .feedback.incorrect {
            background: linear-gradient(45deg, #ff6b6b, #ee5a52);
        }
        
        /* Responsividade */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 10px;
            }
            
            .progress-bar {
                width: 150px;
            }
            
            .exercise-card {
                padding: 25px;
                margin: 20px 10px;
            }
            
            .exercise-question {
                font-size: 1.2rem;
            }
            
            .multiple-choice {
                grid-template-columns: 1fr;
            }
            
            .word-options, .word-bank {
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header da lição -->
    <div class="lesson-header">
        <div class="header-content">
            <div class="lesson-title">
                <i class="fa <?php echo $licao['tipo'] === 'python' ? 'fa-code' : 'fa-globe'; ?>"></i>
                <?php echo $licao['titulo']; ?>
            </div>
            <div class="lesson-progress">
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
                <span class="progress-text"><?php echo $exercicio_atual + 1; ?>/<?php echo $total_exercicios; ?></span>
            </div>
            <a href="/licoes" class="btn-exit">
                <i class="fa fa-times"></i>
                Sair
            </a>
        </div>
    </div>

    <!-- Container principal -->
    <div class="lesson-container">
        <div class="exercise-card">
            <div class="exercise-type">
                <?php 
                $tipos = [
                    'completar' => 'Complete a frase',
                    'arrastar' => 'Arraste as palavras',
                    'multipla_escolha' => 'Múltipla escolha',
                    'escrever' => 'Escreva a resposta'
                ];
                echo $tipos[$licao['exercicios'][$exercicio_atual]['tipo']];
                ?>
            </div>

            <div class="exercise-question">
                <?php echo $licao['exercicios'][$exercicio_atual]['pergunta']; ?>
            </div>

            <form method="POST" action="/licao/<?php echo $licao_id; ?>?exercicio=<?php echo $exercicio_atual; ?>" id="exerciseForm">
                <?php if(function_exists('csrf_field')) echo csrf_field(); ?>
                <?php 
                $exercicio = $licao['exercicios'][$exercicio_atual];
                
                switch($exercicio['tipo']) {
                    case 'completar':
                        echo '<div class="complete-sentence">';
                        $partes = explode('___', $exercicio['frase']);
                        echo $partes[0];
                        echo '<span class="word-blank" id="selectedWord">___</span>';
                        if (isset($partes[1])) echo $partes[1];
                        echo '</div>';
                        
                        echo '<div class="word-options">';
                        foreach($exercicio['opcoes'] as $opcao) {
                            echo '<button type="button" class="word-option" onclick="selectWord(this, \''.$opcao.'\')">'.$opcao.'</button>';
                        }
                        echo '</div>';
                        echo '<input type="hidden" name="resposta" id="respostaInput">';
                        break;
                        
                    case 'arrastar':
                        echo '<div class="drag-area" id="dragArea">Arraste as palavras aqui</div>';
                        echo '<div class="word-bank">';
                        foreach($exercicio['palavras'] as $palavra) {
                            echo '<div class="draggable-word" draggable="true" ondragstart="drag(event)">'.$palavra.'</div>';
                        }
                        echo '</div>';
                        echo '<input type="hidden" name="resposta" id="dragResult">';
                        break;
                        
                    case 'multipla_escolha':
                        echo '<div class="multiple-choice">';
                        foreach($exercicio['opcoes'] as $opcao) {
                            echo '<div class="choice-option" onclick="selectChoice(this, \''.$opcao.'\')">'.$opcao.'</div>';
                        }
                        echo '</div>';
                        echo '<input type="hidden" name="resposta" id="choiceInput">';
                        break;
                        
                    case 'escrever':
                        echo '<input type="text" class="write-input" name="resposta" placeholder="Digite sua resposta aqui..." autocomplete="off">';
                        break;
                }
                ?>

                <div class="action-buttons">
                    <?php if (!$mostrar_feedback): ?>
                        <button type="submit" class="btn btn-check">
                            <i class="fa fa-check"></i>
                            Verificar
                        </button>
                    <?php else: ?>
                        <?php if ($exercicio_atual < $total_exercicios - 1): ?>
                            <a href="?id=<?php echo $licao_id; ?>&exercicio=<?php echo $exercicio_atual + 1; ?>" class="btn btn-next">
                                <i class="fa fa-arrow-right"></i>
                                Próximo
                            </a>
                        <?php else: ?>
                            <a href="/licoes" class="btn btn-next">
                                <i class="fa fa-trophy"></i>
                                Finalizar
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <a href="?id=<?php echo $licao_id; ?>&exercicio=<?php echo min($exercicio_atual + 1, $total_exercicios - 1); ?>" class="btn btn-skip">
                        <i class="fa fa-forward"></i>
                        Pular
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Feedback -->
    <?php if ($mostrar_feedback): ?>
    <div class="feedback <?php echo $resposta_correta ? 'correct' : 'incorrect'; ?> show">
        <?php echo $feedback; ?>
    </div>
    <?php endif; ?>

    <script>
        // Completar frase
        function selectWord(element, word) {
            document.querySelectorAll('.word-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
            document.getElementById('selectedWord').textContent = word;
            document.getElementById('respostaInput').value = word;
        }

        // Múltipla escolha
        function selectChoice(element, choice) {
            document.querySelectorAll('.choice-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
            document.getElementById('choiceInput').value = choice;
        }

        // Arrastar e soltar
        let draggedWords = [];

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.textContent);
            ev.target.classList.add('dragging');
        }

        function drop(ev) {
            ev.preventDefault();
            const data = ev.dataTransfer.getData("text");
            const dragArea = document.getElementById('dragArea');
            
            // Criar elemento na área de drop
            const wordElement = document.createElement('span');
            wordElement.textContent = data;
            wordElement.className = 'draggable-word';
            wordElement.style.margin = '5px';
            
            dragArea.appendChild(wordElement);
            draggedWords.push(data);
            
            // Remover da área original
            document.querySelectorAll('.draggable-word').forEach(word => {
                if (word.textContent === data && word.classList.contains('dragging')) {
                    word.remove();
                }
            });
            
            // Atualizar resultado
            document.getElementById('dragResult').value = draggedWords.join(' ');
            
            // Limpar texto padrão
            if (dragArea.textContent.includes('Arraste as palavras aqui')) {
                dragArea.innerHTML = '';
                dragArea.appendChild(wordElement);
            }
        }

        // Configurar área de drop
        document.addEventListener('DOMContentLoaded', function() {
            const dragArea = document.getElementById('dragArea');
            if (dragArea) {
                dragArea.addEventListener('dragover', allowDrop);
                dragArea.addEventListener('drop', drop);
                dragArea.addEventListener('dragenter', function() {
                    this.classList.add('drag-over');
                });
                dragArea.addEventListener('dragleave', function() {
                    this.classList.remove('drag-over');
                });
            }
        });

        // Auto-hide feedback após 3 segundos
        <?php if ($mostrar_feedback): ?>
        setTimeout(() => {
            document.querySelector('.feedback').classList.remove('show');
        }, 3000);
        <?php endif; ?>
    </script>
</body>
</html>