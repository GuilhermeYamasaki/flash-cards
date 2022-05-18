<?php
session_start();

require "app/db/connect.php";

$nameDeck = $_POST["nameDeck"];

require_once "connect.php";

$table = "CREATE TABLE IF NOT EXISTS $nameDeck (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
)";

$conexao = novaConexao();
$resultado = $conexao -> query($table);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

exit;