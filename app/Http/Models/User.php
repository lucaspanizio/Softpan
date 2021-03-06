<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    // /**
    //  * Um usuário pode controlar várias empresas
    //  */
    // public function companies()
    // {
    //     return $this->belongsToMany(Company::class, 'companies_users','user_id','company_id');
    // } 

    /**
     * Um usuário pode ter várias transações 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
