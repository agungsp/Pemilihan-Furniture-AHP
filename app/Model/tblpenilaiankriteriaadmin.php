<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblpenilaiankriteriaadmin extends Model
{
    protected $fillable = ['IdMUser', 'IdMBrg', 'PosisiMatrix', 'Nilai'];
}
