 <div class="d-flex justify-content-between align-items-center mb-3">
     <h3>Tarefas</h3>
     <a href="views/tarefas.php" class="btn btn-sm btn-success">Adicionar</a>
 </div>
 <ul class="list-group list-group-flush">
     <?php foreach ($tarefas as $t): ?>
         <li class="list-group-item d-flex justify-content-between align-items-center">
             <div class="card" style="width: 100%;">
                 <div class="card-body">
                     <h5 class="card-title">
                         <?= htmlspecialchars($t['titulo']) ?>
                         <span class="badge <?= $t['status'] == 'pendente' ? 'bg-warning text-dark' : 'bg-success' ?>">
                             <?= ucfirst($t['status']) ?>
                         </span>
                     </h5>
                     <p class="card-subtitle mb-2 text-body-secondary"><?= htmlspecialchars($t['descricao']) ?></p>
                     <a href="controller/TarefasController.php?concluir= <?= $t['id'] ?>" class="btn btn-sm btn-success">Concluir</a>
                     <a href="controller/TarefasController.php?excluir=<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirma excluir?')">Excluir</a>
                 </div>
             </div>
         </li>
     <?php endforeach; ?>
 </ul>