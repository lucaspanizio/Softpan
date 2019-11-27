<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    
    /**
     * Uma empresa pode ter várias transações 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
