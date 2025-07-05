<?php
class Tarefa {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function criar($usuario_id, $titulo, $descricao) {
    $sql = "INSERT INTO tarefas (usuario_id, titulo, descricao) VALUES (?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);
    return $stmt->execute([$usuario_id, $titulo, $descricao]);
  }

  public function listarPorUsuario($usuario_id) {
    $sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY data_criacao DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll();
  }

  public function concluir($id, $usuario_id) {
    $sql = "UPDATE tarefas SET status='concluida' WHERE id=? AND usuario_id=?";
    return $this->pdo->prepare($sql)->execute([$id, $usuario_id]);
  }

  public function excluir($id, $usuario_id) {
    $sql = "DELETE FROM tarefas WHERE id=? AND usuario_id=?";
    return $this->pdo->prepare($sql)->execute([$id, $usuario_id]);
  }
}
