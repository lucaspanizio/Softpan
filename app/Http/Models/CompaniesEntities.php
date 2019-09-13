<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompaniesEnities extends Model
{
    use SoftDeletes;

    /**
     * N x N 
     */
    public function company()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * N x N 
     */
    public function entity()
    {
        return $this->belongsToMany(Entity::class);
    }

}
