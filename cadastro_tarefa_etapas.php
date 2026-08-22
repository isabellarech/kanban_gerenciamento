<?php

require_once 'infra/conexao.php';

$edicao = false;
$tarefa = null;
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $tarefa = obterTarefa($id);
    if ($tarefa){
        $edicao = true;
    }
}

$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_POST['id_usuario'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $setor = $_POST['setor'] ?? '';
    $prioridade = $_POST['prioridade'] ?? '';

    if (empty($id_usuario) || empty($descricao) || empty($setor) || empty($prioridade)) {
        $mensagem = 'Todos os campos são obrigatórios.';
    } else {
        if ($edicao) {
            $id = $_POST['id'];
            if (atualizarTarefa($id, $id_usuario, $descricao, $setor, $prioridade)) {
                header('Location: index.php?mensagem=Tarefa atualizada com sucesso!&tipo=success');
                exit;
            } else {
                $mensagem = 'Erro ao atualizar a tarefa!';
            }
        } else {
            if (adicionarTarefa($id_usuario, $descricao, $setor, $prioridade)) {
                header('Location: cadastro.tarefa.php?mensagem=Tarefa cadastrada com sucesso!&tipo=success');
                exit;
            } else {
                $mensagem = 'Erro ao cadastrar a tarefa!';
            }
        }
    }
}

?>