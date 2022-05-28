<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'status',
];

    public function commande()
    {
        return $this->hasOne(Commande::class);
    }
}
