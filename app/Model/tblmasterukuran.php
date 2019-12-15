<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblmasterukuran extends Model
{
    protected $fillable = ['IdMBarang', 'Panjang', 'Lebar', 'Tinggi', 'Nilai', 'IdMUserCreate', 'IdMUserUpdate'];
}
