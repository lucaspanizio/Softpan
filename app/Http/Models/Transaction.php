<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'pay_off_date', 'due_date',
    ];

    /**
     * Uma transação pode ser de apenas uma empresa
     */
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }

    /**
     * Uma transação pode ser de apenas um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    /**
     * Uma transação pertence a uma entidade
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class,'entity_id','id');
    }

    /**
     * Uma transação pode ter apenas uma forma de pagamento
     */
    public function payment()
    {
        return $this->belongsTo(FormOfPayment::class,'payment_id','id');
    }
}
