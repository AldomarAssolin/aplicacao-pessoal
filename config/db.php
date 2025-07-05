<?php

include_once __DIR__ . '/../vendor/autoload.php';
use Dotenv\Dotenv;

// Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// Configuração do banco de dados
$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erro na conexão: " . $e->getMessage());
}