<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblinputadmin extends Model
{
    protected $fillable = ['IdMUser', 'IdMBrg', 'Field', 'Nilai'];
}
