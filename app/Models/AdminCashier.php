<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminCashier extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'admin_cashiers';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'email', 'password'];

    public function cashiers()
    {
        return $this->hasMany(Cashier::class, 'admin_cashiers_id');
    }

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'admin_cashiers_id');
    }
}
