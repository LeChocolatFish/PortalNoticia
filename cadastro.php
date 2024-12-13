<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $senha, $tipo);
    $stmt->execute();
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        Notícias Esportivas - Login
    </header>
    <div class="container">
        <h1>Cadastro</h1>
        <form method="POST">

            <select type="tipo" name="tipo" required="required">
            <option value="">Você é um(a)</option>
            <option value="1">Administrador(a)</option>
            <option value="2">Escritor(a)</option>
            </select>

            <input type="nome" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit" class="button">Entrar</button>
        </form>
        <a href="login.php" class="button">Login</a>
        <a href="index.php" class="button">Voltar ao início</a>
    </div>
    <footer class="footer">
        © 2024 - Notícias Esportivas
    </footer>
</body>
</html>


