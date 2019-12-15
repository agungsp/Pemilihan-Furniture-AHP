<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tblmasteruser extends Model
{
    protected $fillable = ['Username', 'NmMUser', 'Password'];
}
