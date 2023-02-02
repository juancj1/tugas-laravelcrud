<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mentor extends Model
{
    use HasFactory;

    protected $table = 'mentor';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'alamat',
    ];
}
