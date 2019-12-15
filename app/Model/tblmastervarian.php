<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblmastervarian extends Model
{
    protected $fillable = ['IdMBrg', 'KdMVarian', 'NmMVarian', 'Ukuran', 'Panjang', 'Lebar', 'Tinggi', 'TinggiDudukan', 'Harga', 'IdMWarnaD', 'IdMDesign', 'IdMBahan', 'Foto', 'FotoTumb', 'IdMUserCreate', 'IdMUserUpdate'];
}
