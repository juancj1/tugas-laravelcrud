<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar extends Model
{
    use HasFactory;

    protected $table = 'daftars';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
    ];
}
