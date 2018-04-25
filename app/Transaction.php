<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $appends = ['date'];
    protected $hidden = ['updated_at', 'created_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getDateAttribute()
    {
        return $this->updated_at->format('Y-m-d');
    }
}
