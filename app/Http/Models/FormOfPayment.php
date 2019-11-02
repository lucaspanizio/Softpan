<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormOfPayment extends Model
{
    use SoftDeletes;

    /**
     * Uma forma de pagamento pode estar em várias transações 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}