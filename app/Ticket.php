<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'name', 'lastname', 'rut', 'email', 'phone','ticket_number', 'local_val', 'consume', 'locals_id'
    ];

    public function local()
    {
        return $this->belongsTo('App\Local');
    }
}
