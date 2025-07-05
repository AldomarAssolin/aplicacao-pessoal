<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center">Criar Conta</h2>
        <form action="register.php" method="post" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" name="cadastrar" class="btn btn-success w-100">Cadastrar</button>
            <p class="text-center mt-3">
                Já tem conta? <a href="login.php" class="text-info">Faça login</a>
            </p>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['cadastrar'])) {
    require 'config/db.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Verifica se o e-mail já está cadastrado
    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "<script>alert('E-mail já cadastrado!');</script>";
    } else {
        // Insere novo usuário
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $result = $stmt->execute([$nome, $email, $senha]);

        if ($result) {
            $_SESSION['usuario'] = $nome;
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('Erro ao cadastrar. Tente novamente.');</script>";
        }
    }
}
?>