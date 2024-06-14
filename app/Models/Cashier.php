<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cashier extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'cashiers';

    protected $primaryKey = 'id';

    protected $fillable = ['admin_cashiers_id', 'name', 'email', 'password'];

    public function adminCashier()
    {
        return $this->belongsTo(AdminCashier::class, 'admin_cashiers_id');
    }
}
