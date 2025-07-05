<?php
class Evento {
  private $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function criar($usuario_id, $titulo, $descricao, $data, $hora) {
    $sql = "INSERT INTO eventos (usuario_id, titulo, descricao, data_evento, hora_evento)
            VALUES (?, ?, ?, ?, ?)";
    return $this->pdo->prepare($sql)->execute([$usuario_id, $titulo, $descricao, $data, $hora]);
  }

  public function listar($usuario_id) {
    $sql = "SELECT * FROM eventos WHERE usuario_id = ? ORDER BY data_evento ASC, hora_evento ASC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll();
  }

  public function excluir($id, $usuario_id) {
    $sql = "DELETE FROM eventos WHERE id = ? AND usuario_id = ?";
    return $this->pdo->prepare($sql)->execute([$id, $usuario_id]);
  }
}
