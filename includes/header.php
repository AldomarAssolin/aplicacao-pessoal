<?php
require_once __DIR__ . '/../config/config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $titulo ?? 'Minha Aplicação' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="d-flex flex-column min-vh-100 bg-dark text-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="<?= $URL ?>dashboard.php">ManexApp</a>
            <div>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <span class="me-3">Olá, <?= $_SESSION['usuario'] ?></span>
                    <a href="index.php" class="btn btn-outline-light btn-sm">Inicio</a>
                    <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-light btn-sm">Entrar</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <main class="container py-4">