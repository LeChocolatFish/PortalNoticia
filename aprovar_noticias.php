<?php
require 'db.php';
session_start();

if ($_SESSION['tipo'] != 'admin') {
    header("Location: login.php");
}

if (isset($_GET['aprovar'])) {
    $id = $_GET['aprovar'];
    $conn->query("UPDATE noticias SET aprovado = 1 WHERE id = $id");
}

$noticias = $conn->query("SELECT * FROM noticias WHERE aprovado = 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprovar Notícias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    SportsStream - Aprovar Notícias
    </header>
    <div class="container">
        <h1>Aprovar Notícias Pendentes</h1>
        <div class="news-container">
            <?php while ($noticia = $noticias->fetch_assoc()) { ?>
                <div class="news-item">
                    <h2><?php echo $noticia['titulo']; ?></h2>
                    <?php if ($noticia['imagem']) { ?>
                        <img src="<?php echo $noticia['imagem']; ?>" alt="Imagem da notícia">
                    <?php } ?>
                    <p><?php echo $noticia['conteudo']; ?></p>
                    <a href="?aprovar=<?php echo $noticia['id']; ?>" class="button">Aprovar</a>
                </div>
            <?php } ?>
        </div>
        
        <a href="index.php" class="button">Voltar ao Início</a>
    </div>
    <footer class="footer">
        © 2024 - Notícias Esportivas
    </footer>
</body>
</html>

