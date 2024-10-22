<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Conteúdo protegido aqui
echo "<h1>Bem-vindo, " . $_SESSION['username'] . "</h1>";
?>

<a href="logout.php">Sair</a>
