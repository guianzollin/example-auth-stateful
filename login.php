<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar campos
    if (!empty($username) && !empty($password)) {
        // Verificar se o usuário existe
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            echo "Login realizado com sucesso!";
            // Aqui você pode iniciar a sessão do usuário
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
        } else {
            echo "Nome de usuário ou senha incorretos.";
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}
?>

<h1>Login</h1>

<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Nome de usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>

Não possui conta? <a href="register.php">Registrar uma conta</a>
