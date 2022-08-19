<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $table = 'bien';
    protected $primaryKey = 'idbien';
    use HasFactory;
}
