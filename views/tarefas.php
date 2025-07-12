<?php
require '../includes/auth.php';
require '../controller/TarefasController.php';
$titulo = "Tarefas";
require '../includes/header.php';
?>
<section class="p-4">
  
  <h2 class="mb-3">Minhas Tarefas</h2>
  
  <form method="post" class="row g-3 mb-4">
    <div class="col-md-5">
      <input type="text" name="titulo" class="form-control" placeholder="Título da tarefa" required>
    </div>
    <div class="col-md-5">
      <input type="text" name="descricao" class="form-control" placeholder="Descrição (opcional)">
    </div>
    <div class="col-md-2">
      <button type="submit" name="adicionar" class="btn btn-primary w-100">Adicionar</button>
    </div>
  </form>
  
  <table class="table table-dark table-hover table-bordered">
    <thead class="table-secondary text-dark">
      <tr>
        <th>#</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tarefas as $t): ?>
        <tr>
          <td><?= $t['id'] ?></td>
          <td><?= $t['titulo'] ?></td>
          <td><?= $t['descricao'] ?></td>
          <td>
            <?php if ($t['status'] == 'pendente'): ?>
              <span class="badge bg-warning text-dark">Pendente</span>
            <?php else: ?>
              <span class="badge bg-success">Concluída</span>
            <?php endif; ?>
          </td>
          <td>
            <?php if ($t['status'] == 'pendente'): ?>
              <a href="?concluir=<?= $t['id'] ?>" class="btn btn-sm btn-success">Concluir</a>
            <?php endif; ?>
            <a href="?excluir=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirma excluir?')">Excluir</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>

<?php require '../includes/footer.php'; ?>
