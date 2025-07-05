<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../model/Evento.php';

$usuario = $_SESSION['usuario'] ?? null;
if (session_status() === $usuario) {
    session_start();
}

$stmt = $pdo->prepare("SELECT id FROM usuarios WHERE nome = ?");
$stmt->execute([$usuario]);
$usuario_id = $stmt->fetchColumn();

$eventoModel = new Evento($pdo);

// Ações
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
  $eventoModel->criar(
    $usuario_id,
    $_POST['titulo'],
    $_POST['descricao'],
    $_POST['data_evento'],
    $_POST['hora_evento']
  );
  header("Location: ../views/agenda.php");
  exit;
}

if (isset($_GET['excluir'])) {
  $eventoModel->excluir($_GET['excluir'], $usuario_id);
  header("Location: ../views/agenda.php");
  exit;
}

// Listagem
$eventos = $eventoModel->listar($usuario_id);
