<?php

require 'controller/TarefasController.php';

?>

<h3>Tarefas</h3>
<hr>

<div class="row g-4 mt-4">
    <div class="col-4">
        <h3>Pendentes</h3>
        <div class="bg-primary text-white rounded-3 p-2">
            <?php
            if (isset($tarefas) && count($tarefas) > 0) {
                foreach ($tarefas as $tarefa) {
                    if ($tarefa['status'] == 'pendente') {
                        echo "<div class='card mb-3'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . htmlspecialchars($tarefa['titulo']) . "</h5>";
                        echo "<p class='card-text'>" . htmlspecialchars($tarefa['descricao']) . "</p>";
                        echo "<a href='controller/TarefasController.php?concluir=" . $tarefa['id'] . "' class='btn btn-sm btn-success'>Concluir</a>";
                        echo "<a href='controller/TarefasController.php?excluir=" . $tarefa['id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Confirma excluir?')\">Excluir</a>";
                        echo "</div></div>";
                    }
                }
            } else {
                echo "<p>Nenhuma tarefa encontrada.</p>";
            }
            ?>
        </div>
    </div>
    <div class="col-4">
        <h3>Concluídas</h3>
        <div class="bg-success text-white rounded-3 p-2">
            <?php
            if (isset($tarefas) && count($tarefas) > 0) {
                foreach ($tarefas as $tarefa) {
                    if ($tarefa['status'] == 'concluida') {
                        echo "<div class='card mb-3'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>" . htmlspecialchars($tarefa['titulo']) . "</h5>";
                        echo "<p class='card-text'>" . htmlspecialchars($tarefa['descricao']) . "</p>";
                        echo "<a href='controller/TarefasController.php?excluir=" . $tarefa['id'] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Confirma excluir?')\">Excluir</a>";
                        echo "</div></div>";
                    }
                }
            } else {
                echo "<p>Nenhuma tarefa encontrada.</p>";
            }
            ?>
        </div>
    </div>
    <div class="col-4">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto">
                <h5 class="text-center mb-3">Resumo das Tarefas</h5>
                <canvas id="graficoTarefas"></canvas>
            </div>
        </div>

        <script>
            const ctx = document.getElementById('graficoTarefas').getContext('2d');
            const graficoTarefas = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Pendentes', 'Concluídas'],
                    datasets: [{
                        label: 'Tarefas',
                        data: [<?= $graficoTarefas['pendentes'] ?>, <?= $graficoTarefas['concluidas'] ?>],
                        borderWidth: 1,
                        backgroundColor: ['#ffc107', '#28a745'],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#fff'
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(ctx) {
                                    return `${ctx.label}: ${ctx.parsed}`;
                                }
                            }
                        }
                    }
                }
            });
        </script>

    </div>
</div>