<?php
session_start();

// Destruir todas as variáveis de sessão
session_unset();

// Destruir a sessão
session_destroy();

// Redirecionar o usuário para a página de login
header('Location: login.php');
exit();
?>
