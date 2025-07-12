<section class="h-100">
    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom">
        <h3>Agenda</h3>
        <a href="views/agenda.php" class="btn btn-sm btn-success">Adicionar</a>
    </div>
    <ul class="list-group list-group-flush h-100">
        <?php foreach ($eventos as $evento): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="row w-100">
                    <div class="col-md-3 d-flex align-items-center">
                        <strong><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></strong>
                    </div>
                    <div class="col-md-7">
                        <span class="badge bg-primary rounded-pill"><?= date('H:i', strtotime($evento['hora_evento'])) ?></span>
                          <?= htmlspecialchars($evento['titulo']) ?>
                        <br>
                        <small><?= htmlspecialchars($evento['descricao']) ?></small>
                    </div>
                    <div class="col-md-2 d-flex align-items-center justify-content-end">
                        <a href="controller/AgendaController.php?excluir=<?= $evento['id'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('Excluir este evento?')">Excluir</a>
                    </div>
                </div><!--row-->
            </li>
        <?php endforeach; ?>
    </ul>
</section>