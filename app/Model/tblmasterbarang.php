<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblmasterbarang extends Model
{
    protected $fillable = ['KdMBrg', 'NmMBrg', 'PKecil', 'LKecil', 'TKecil', 'PSedang', 'LSedang', 'TSedang', 'PBesar', 'LBesar', 'TBesar', 'IdMUserCreate', 'IdMUserUpdate'];
}
