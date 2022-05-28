<?php

use App\Database\DB;

$cards = DB::handle('SELECT * FROM front_cards');
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
    <h1>Criar deck</h1>
    <form action="/app/db/create-deck.php" method="POST">
        <input type="text" placeholder="Nome do deck" name="nameDeck" id="nameDeck" required>
        <button>Criar</button>
    </form>
    <h2>Seus decks</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cards as $card) { ?>
                <td><?= $card['id'] ?></td>
                <td><?= $card['name'] ?></td>
                <td>
                    <a href="/lista-cartas/editar.php?id=<?= $card['id'] ?>">Editar</a>
                    <form action="/lista-cartas/excluir.php" method="post">
                        <input type="hidden" name="id" value="<?= $card['id'] ?>">
                        <button>Excluir</button>
                    </form>
                </td>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>