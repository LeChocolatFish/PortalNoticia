<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor_id = $_SESSION['id'];
    $imagem = null;

    if ($_FILES['imagem']['name']) {
        $imagem = 'uploads/' . time() . '_' . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem);
    }

    $stmt = $conn->prepare("INSERT INTO noticias (titulo, conteudo, autor_id, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $titulo, $conteudo, $autor_id, $imagem);
    $stmt->execute();
    echo "Notícia enviada para aprovação.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escrever Notícia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    SportsStream - Nova Notícia
    </header>
    <div class="container">
        <h1>Publicar uma Nova Notícia</h1>
        <form method="POST" enctype="multipart/form-data" class="form">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título da notícia" required>
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo:</label>
                <textarea id="conteudo" name="conteudo" placeholder="Escreva o conteúdo da notícia" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
            </div>
            <button type="submit" class="button">Publicar</button>
        </form>
        <a href="index.php" class="button">Voltar ao Início</a>
    </div>
    <footer class="footer">
        © 2024 - Notícias Esportivas
    </footer>
</body>
</html>

