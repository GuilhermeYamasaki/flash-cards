<?php
require '../vendor/autoload.php';

use App\Controllers\CardController;

$controller = new CardController();
$id = intval($_POST['id']);
$controller->destroy($id);