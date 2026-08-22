// Verificar se é uma edição ou criação de uma nova tarefa

$edicao = false;
$tarefa = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tarefa = obterTarefa($id);
    if ($tarefa) {
        $edicao = true;
    } else {
        echo "Tarefa não encontrada.";
        exit;
    }
}