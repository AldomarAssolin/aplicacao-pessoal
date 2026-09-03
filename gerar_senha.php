<?php
$senha = "34567"; // você escolhe a senha
$hash = password_hash($senha, PASSWORD_DEFAULT);
echo "Senha: $senha<br>";
echo "Hash gerada: $hash";
?>
