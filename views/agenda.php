<?php
require '../includes/auth.php';
require '../controller/AgendaController.php';
$titulo = "Agenda";
require '../includes/header.php';
?>

<section class="p-4">
  <h2 class="mb-3">Minha Agenda</h2>
  
  <form method="post" class="row g-3 mb-4">
    <div class="col-md-3">
      <input type="text" name="titulo" class="form-control" placeholder="Título" required>
    </div>
    <div class="col-md-3">
      <input type="text" name="descricao" class="form-control" placeholder="Descrição">
    </div>
    <div class="col-md-3">
      <input type="date" name="data_evento" class="form-control" required>
    </div>
    <div class="col-md-2">
      <input type="time" name="hora_evento" class="form-control">
    </div>
    <div class="col-md-1">
      <button type="submit" name="adicionar" class="btn btn-primary w-100">+</button>
    </div>
  </form>
  
  <table class="table table-dark table-hover table-bordered">
    <thead class="table-secondary text-dark">
      <tr>
        <th>Data</th>
        <th>Hora</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($eventos as $evento): ?>
        <tr>
          <td><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></td>
          <td><?= date('H:i', strtotime($evento['hora_evento'])) ?></td>
          <td><?= htmlspecialchars($evento['titulo']) ?></td>
          <td><?= htmlspecialchars($evento['descricao']) ?></td>
          <td>
            <a href="?excluir=<?= $evento['id'] ?>" class="btn btn-sm btn-danger"
              onclick="return confirm('Excluir este evento?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php require '../includes/footer.php'; ?>
