<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    /**
     * Uma transação pode ser de apenas uma empresa
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Uma transação pode ser de apenas um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Uma transação pertence a uma entidade
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
