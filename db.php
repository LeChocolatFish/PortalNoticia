<?php
$conn = new mysqli('localhost', 'root', '', 'site_noticias');
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}
?>
