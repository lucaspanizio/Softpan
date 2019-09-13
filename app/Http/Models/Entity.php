<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use SoftDeletes;

    /**
     * N x N 
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_entities', 'entity_id', 'company_id');
    }

    /**
     * Uma entidade pode ter várias transações 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
