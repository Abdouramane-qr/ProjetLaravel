<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Generation;

class DashboardController extends Controller
{
    public function home()
    {
        $entres = Generation::where('mode', 1)->take(10)->get();
        $sorties = Generation::where('mode', 2)->take(10)->get();
        $commandes = Commande::all();
        view()->share('commandes', $commandes);

        return view('dashboard.home')->with('entres', $entres)->with('sorties', $sorties);
    }
}
