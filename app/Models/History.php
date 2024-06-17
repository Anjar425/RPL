<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;


    // Define the table name if it differs from the default naming convention
    protected $table = 'histories';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'medicine_id',
        'date',
        'type',
        'amount',
        'price'
    ];

    // Define the relationship with the Medicine model
    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
