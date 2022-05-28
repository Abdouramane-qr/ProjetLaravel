<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'adresse',
        'email',
        'telephone',
        'article',
      'quantite',
        'price',
];
}
