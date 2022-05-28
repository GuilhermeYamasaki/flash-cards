<?php
require '../vendor/autoload.php';

use App\Controllers\CardController;

$controller = new CardController();
$controller->update((object) $_POST);