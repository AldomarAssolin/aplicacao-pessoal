<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Tarefas.php';

$usuario = $_SESSION['usuario'] ?? null;
if (session_status() === $usuario) {
    session_start();
}

// Buscar ID do usuário
$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE nome = ?");
$stmt->execute([$usuario]);
$usuario_id = $stmt->fetchColumn();

$tarefaModel = new Tarefa($pdo);

// Processa ações
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
  $tarefaModel->criar($usuario_id, $_POST['titulo'], $_POST['descricao']);
  header("Location: ../views/tarefas.php");
  exit;
}

if (isset($_GET['concluir'])) {
  $tarefaModel->concluir($_GET['concluir'], $usuario_id);
  header("Location: ../views/tarefas.php");
  exit;
}

if (isset($_GET['excluir'])) {
  $tarefaModel->excluir($_GET['excluir'], $usuario_id);
  header("Location: ../views/tarefas.php");
  exit;
}

// Lista tarefas (será usada na view)
$tarefas = $tarefaModel->listarPorUsuario($usuario_id);

// Gráfico de tarefas pendentes e concluídas
$totais = $pdo->prepare("
  SELECT 
    SUM(CASE WHEN status = 'pendente' THEN 1 ELSE 0 END) AS pendentes,
    SUM(CASE WHEN status = 'concluida' THEN 1 ELSE 0 END) AS concluidas
  FROM tarefas
  WHERE usuario_id = ?
");
$totais->execute([$usuario_id]);
$graficoTarefas = $totais->fetch(PDO::FETCH_ASSOC);

