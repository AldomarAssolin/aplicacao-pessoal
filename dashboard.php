<?php
require 'includes/auth.php';
$titulo = "Dashboard";
require 'includes/header.php';
require 'controller/AgendaController.php';
require 'controller/TarefasController.php';


date_default_timezone_set("America/Sao_Paulo");
$hora = date("H");

if ($hora < 12) $saudacao = "Bom dia";
elseif ($hora < 18) $saudacao = "Boa tarde";
else $saudacao = "Boa noite";
?>

<h2 class="mb-3"><?= $saudacao ?>, <?= $_SESSION['usuario'] ?> 👋</h2>
<p>Seja bem-vindo ao seu sistema pessoal!</p>

<!-- Kanban das Tarefas -->
<div class="row g-4">
    <div class="col-md-12">
        <?php include 'components/tarefas_kanban.php'; ?>
    </div>
</div>

<!-- Visualizações de dados -->
<div class="row g-4 mt-4">
    <div class="col-md-6">
        <?php include 'components/component_agenda_all.php'; ?>
    </div>
    <div class="col-md-6">
        <?php include 'components/component_tarefas_all.php'; ?>
    </div>
</div>

<?php require 'includes/footer.php'; ?>