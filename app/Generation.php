<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    public function type()
    {
      return $this->belongsTo('App\type');
    }

    public function commande()
    {
      return $this->belongsTo(Commande::class);
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
