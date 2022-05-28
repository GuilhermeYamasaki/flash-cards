<?php

use App\Database\DB;

$id = $_GET['id'];

$cards = DB::handle("SELECT * FROM front_cards WHERE id = {$id} LIMIT 1");

if (!count($cards)) {
    return header('Location: /list-cartas');
}

$card = (object) $cards[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deck list</title>
</head>
<body>
    <form action="/lista-cartas/atualizar.php" method="post">
        <input type="hidden" name="id" value="<?= $card->id ?>">
        <label for="name">Carta</label>
        <input type="text" name="name" id="name" value="<?= $card->name ?>">
        <button>Atualizar</button>
    </form>
</body>
</html>