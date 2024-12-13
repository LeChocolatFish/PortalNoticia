<?php
require 'db.php';

$result = $conn->query("SELECT * FROM noticias WHERE aprovado = 1");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias Esportivas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        SportsStream
    </header>
    <div class="container">
        <a href="login.php" class="button">Login</a>
        <div class="news-container">
            <?php while ($noticia = $result->fetch_assoc()) { ?>
                <div class="news-item">
                    <h2><?php echo $noticia['titulo']; ?></h2>
                    <?php if ($noticia['imagem']) { ?>
                        <img src="<?php echo $noticia['imagem']; ?>" alt="Imagem da notícia">
                    <?php } ?>
                    <p><?php echo $noticia['conteudo']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
    <footer class="footer">
        © 2024 - SportsStream
    </footer>
</body>
</html>
