<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    /**
     * Vários pagáveis por fornecedor
     */
    public function payables(){
        return $this->belongsTo(Payable::class);
    }
}
