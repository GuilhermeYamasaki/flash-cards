<?php

namespace App\Controllers;

use App\Models\Card;

class CardController {

    private Card $model;

    public function __construct() {
        $this->model = new Card();
    }

    public function update(object $request) {
        $this->model->update($request->id, $request->name);

        header("Location: /lista-cartas/editar.php?id={$request->id}");
    }

    public function destroy(int $id) {
        $this->model->delete($id);

        header("Location: /lista-cartas");
    }
}