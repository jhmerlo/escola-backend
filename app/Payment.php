<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function source()
    {
        return Progenitor::findOrFail($this->source_account_id);
    }

    public function target(){
        return School::findOrFail($this->target_account_id);
    }

}
