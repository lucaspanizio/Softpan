<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receivable extends Model
{
    use SoftDeletes;

    /**
     * Vários recebíveis por empresa
     */
    public function companys(){
        return $this->belongsTo(Company::class);
    }       
    
}
