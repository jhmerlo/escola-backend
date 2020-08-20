<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progenitor extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['name','bank_account'];
}
