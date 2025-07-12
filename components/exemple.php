<div class="p-4">
            <h2 class="mb-3"><?= $saudacao ?>, <?= $_SESSION['usuario'] ?> 👋</h2>
            <p>Seja bem-vindo ao seu sistema pessoal!</p>
            <div class="row g-4 p-3">
                <div class="col-md-12">
                    <?php include 'components/tarefas_kanban.php'; ?>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-6">
                    <?php include 'components/component_agenda_all.php'; ?>
                </div>
                <div class="col-md-6">
                    <?php include 'components/component_tarefas_all.php'; ?>
                </div>
            </div>
        </div>