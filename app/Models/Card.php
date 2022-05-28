<?php

namespace App\Models;

use App\Database\DB;
use RuntimeException;

class Card {
    private $table = 'front_cards';

    public function cadastrarCard ($nome, $telefone, $email) {
        $user = DB::handle("SELECT id FROM pessoa WHERE email = {$email}");
       
        if(!empty($user)) { //email ja existe no banco
            throw new RuntimeException('Usuário já existe');
        }

        DB::handle("INSERT INTO pessoa (nome, telefone, email) VALUES (:n, :t, :e)");
    }

    public function delete(int $id) {
        return DB::handle("DELETE FROM {$this->table} WHERE id = {$id}");
    }

    public function update($id, $name) {
        DB::handle("UPDATE {$this->table} SET name = '{$name}' WHERE id = '{$id}'");
    }
}
