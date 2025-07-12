<?php

require_once __DIR__ . '/../config/config.php';

?>

<aside class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100%;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4">Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?php echo $URL.'index.php' ?>" class="nav-link active" aria-current="page">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li>
            <a href="<?php echo $URL.'dashboard.php' ?>" class="nav-link text-dark">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="<?php echo $URL.'views/agenda.php' ?>" class="nav-link text-dark">
                <i class="bi bi-calendar"></i> Agenda
            </a>
        </li>
        <li>
            <a href="<?php echo $URL.'views/tarefas.php' ?>" class="nav-link text-dark">
                <i class="bi bi-list-check"></i> Tarefas
            </a>
        </li>
    </ul>
    <hr>
    <div class="mt-auto">
        <a href="/configuracoes.php" class="d-block mb-2 text-dark text-decoration-none">
            <i class="bi bi-gear"></i> Configurações
        </a>
        <a href="/logout.php" class="d-block text-danger text-decoration-none">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</aside>

<!-- Lembre-se de incluir o Bootstrap CSS e Bootstrap Icons no seu projeto -->