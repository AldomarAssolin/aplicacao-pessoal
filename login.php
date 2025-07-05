<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <form action="login.php" method="post" class="w-50 mx-auto">
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <button type="submit" name="entrar" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['entrar'])) {
    require 'config/db.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email ou senha incorretos');</script>";
    }
}
?>