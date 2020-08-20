<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['name', 'cnpj', 'bank_account'];
}
