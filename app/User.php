<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['name', 'type', 'email'];
}
