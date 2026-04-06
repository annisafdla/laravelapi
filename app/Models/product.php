<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'tblproducts';

    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'harga'
    ];
}
