<?php
$senha = "319Manex!"; // você escolhe a senha
$hash = password_hash($senha, PASSWORD_DEFAULT);
echo "Senha: $senha<br>";
echo "Hash gerada: $hash";
?>
