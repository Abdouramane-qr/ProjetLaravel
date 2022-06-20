<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Fournisseur;
use App\type;
use Illuminate\Http\Request;
use  PDF;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF(Request $request)
    {
        $commandes = Commande::latest('created_at')->first()->get();
        // $commandes = Commande::where('id', 'article', 'quantite ', 'price', 'solde ')->get();
        $types = type::all();

        $prixTotalCom = 0;
        $name = '';
        $telephone = '';
        foreach ($commandes as $commands) {
            // $prixTotalCom += $commands;
            $name = $commands->nom;
            $telephone = $commands->telephone;
        }

        view()->share('commandes', $commandes);
        view()->share('prixTotalCom', $prixTotalCom);
        view()->share('types', $types);
        view()->share('name', $name);
        view()->share('telephone', $telephone);

        $pdf = PDF::loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            'name' => $name,
            'telephone' => $telephone,
        ]);

        return $pdf->download('commande.pdf');
    }

    public function download($id)
    {
        $commandes = Commande::latest('id')->first();
        $types = type::all();
        // $command = Commande::where(['nom', 'adresse']);
        // $command = Commande::find($id);
        // $commandes = Commande::where('id', $id)
        // ->orderBy('id', 'DESC')
        // ->first();

        $prixTotalCom = 0;
        foreach ($commandes as $commands) {
            // $prixTotalCom += $commands;
            $name = $commands->nom;
            $telephone = $commands->telephone;
        }

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            // 'command' => $command,
            'name' => $name,
             'telephone' => $telephone,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fournisseur::create([
            'name' => $request->name,
            'article' => $request->article,
            'quantite' => $request->quantite,
            'price' => $request->price,
            // 'adresse' => $request->adresse,
            // 'email' => $request->email,
            'telephone' => $request->telephone,        ]
        );

        return back()->with('success', 'Your order was successfull');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
    }
}
