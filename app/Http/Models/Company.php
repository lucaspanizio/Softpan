<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Company extends Model
{
    use SoftDeletes;

    /**
     * Vários usuários por empresa
     */
    public function users(){
        return $this->belongsTo(User::class);
    } 

    /**
     * Vários clientes por empresa
     */
    public function clients(){
        return $this->belongsTo(Client::class);
    } 
    
    /**
     * Vários fornecedores por empresa
     */
    public function providers(){
        return $this->belongsTo(Provider::class);
    } 

}
