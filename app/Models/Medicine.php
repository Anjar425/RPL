<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $primaryKey = 'id';

    protected $fillable = [
        'admin_cashiers_id',
        'name',
        'desc',
        'expire',
        'purchase_price',
        'selling_price',
        'image',
        'stock'
    ];

    public function adminCashier()
    {
        return $this->belongsTo(AdminCashier::class, 'admin_cashiers_id');
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
