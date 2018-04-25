<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * Получить все транзакции пользователя.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
