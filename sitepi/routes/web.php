<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');
    // Exemplo de validação simples
    if ($username === 'crianca' && $password === '123456') {
        // Autenticação bem-sucedida
        return redirect('/')->with('message', 'Login realizado com sucesso!');
    } else {
        // Falha na autenticação
        return back()->with('message', 'Usuário ou senha incorretos. Tente novamente!')->with('messageType', 'error');
    }
});

Route::get('/licoes', function () {
    return view('licoes');
});

Route::get('/licoes/python', function () {
    return view('licoes_python');
});

Route::get('/licoes/ingles', function () {
    return view('licoes_ingles');
});

// Rota dinâmica para lições individuais
Route::get('/licao/{id}', function ($id) {
    $licoes = [
        1 => ['titulo' => 'Hello World!', 'tipo' => 'ingles', 'conteudo' => 'Aprenda a cumprimentar em inglês e dizer suas primeiras palavras!'],
        2 => ['titulo' => 'Minha Primeira Variável', 'tipo' => 'python', 'conteudo' => 'Descubra o que são variáveis em Python e como guardar informações!'],
        3 => ['titulo' => 'Colors & Numbers', 'tipo' => 'ingles', 'conteudo' => 'Explore o mundo das cores e números em inglês!'],
    ];
    if (!isset($licoes[$id])) {
        abort(404);
    }
    return view('licao', ['licao' => $licoes[$id], 'id' => $id]);
});

Route::post('/licao/{id}', function ($id) {
    $licoes = [
        1 => ['titulo' => 'Hello World!', 'tipo' => 'ingles', 'conteudo' => 'Aprenda a cumprimentar em inglês e dizer suas primeiras palavras!'],
        2 => ['titulo' => 'Minha Primeira Variável', 'tipo' => 'python', 'conteudo' => 'Descubra o que são variáveis em Python e como guardar informações!'],
        3 => ['titulo' => 'Colors & Numbers', 'tipo' => 'ingles', 'conteudo' => 'Explore o mundo das cores e números em inglês!'],
    ];
    if (!isset($licoes[$id])) {
        abort(404);
    }
    return view('licao', ['licao' => $licoes[$id], 'id' => $id]);
}); 