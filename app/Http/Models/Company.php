<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    /**
     * N x N 
     */
    public function entities()
    {
        return $this->belongsToMany(Entity::class, 'companies_entities', 'company_id', 'entity_id');
    }

    /**
     * Uma empresa pode ter vários usuários 
     */
    public function users()
    {
        return $this->hasMany(User::class);
    } 


    /**
     * Uma empresa pode ter várias transações 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
