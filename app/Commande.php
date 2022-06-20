<?php

namespace App;

use app\model\Client;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'client_id',
       'nom',
       'status',
        'article',
      'quantite',
        'price',
       'adresse',
      'email',
      'telephone',
      'solde',
      'type_id',
      'created_at',
    ];

    private $Prixtotl;
    // private $total;
    public $ptixtt;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function type()
    {
        return $this->hasMany(Commande::class);
    }

    public function recette()
    {
        return $this->hasMany(Recette::class);
    }

    public function furnisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function furnisseurs()
    {
        return $this->hasMany(Fournisseur::class);
    }

    public function status()
    {
        return $this->hasOne(User::class);
    }

    public function ptotal()
    {
        $this->Prixtotl = $this->price * $this->quantite;

        return $this->Prixtotl;
    }

    public function totalcmd()
    {
        $commandes = Commande::all();

        $prixTotalCom = 0;

        foreach ($commandes as $commands) {
            $prixTotalCom += $commands->ptotal();
        }

        return $prixTotalCom;
    }
}
