<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekdizme extends Model
{
    use HasFactory;

    protected $table = 'ekdizmes';
    protected $fillable = [
        'id',
        'ek',
        'not',
        'kaynak',
        'ekleyen',
        'onaylayan',
        'created_at',
        'updated_at',
    ];

}
