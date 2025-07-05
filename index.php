<?php
date_default_timezone_set("America/Sao_Paulo");
$hora = date("H");

if ($hora < 12) $saudacao = "Bom dia";
elseif ($hora < 18) $saudacao = "Boa tarde";
else $saudacao = "Boa noite";
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Manex | Desenvolvedor & Técnico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1f1f2e;
            color: #f0f0f5;
        }

        .highlight {
            color: #58a6ff;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <main class="container text-center my-auto py-5">
        <h1 class="mb-3"><?= $saudacao ?>, sou o <span class="highlight">Aldomar "Manex" Assolin</span> 👋</h1>
        <p class="lead mb-4">
            <strong>Desenvolvedor em formação</strong> com experiência de 15 anos como soldador, técnico em soldagem e hoje graduando em Análise e Desenvolvimento de Sistemas.
        </p>
        <p>
            Busco evoluir como <span class="highlight">Analista e Desenvolvedor de Sistemas</span> com foco em <strong>Java com Spring Boot</strong>, bancos de dados, e construção de APIs profissionais. Também atuo com liderança de produção e gosto de criar soluções eficientes para problemas reais.
        </p>
        <p class="mt-3">
            💻 Backend (PHP, Java, Python) &nbsp;|&nbsp; 🎨 Frontend (HTML, CSS, JS, React) <br>
            ⚙️ Banco de Dados &nbsp;|&nbsp; 🛠️ Projetos Pessoais &nbsp;|&nbsp; 🚀 Liderança Técnica
        </p>

        <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap">
            <a href="https://www.linkedin.com/in/aldomarassolin" class="btn btn-outline-info">LinkedIn</a>
            <!-- <a href="dashboard.php" class="btn btn-outline-light">Dashboard</a> -->
            <a href="https://github.com/AldomarAssolin" class="btn btn-secondary" target="_blank">GitHub</a>
            <a href="mailto:assolinaldomar@gmail.com" class="btn btn-dark">Contato</a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="dashboard.php" class="btn btn-success">Dashboard</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary">Entrar</a>
            <?php endif; ?>

        </div>
    </main>

    <footer class="bg-secondary text-center text-light py-3 mt-auto">
        <small>&copy; <?= date("Y") ?> Manex • Currículo Online</small>
    </footer>
</body>

</html>