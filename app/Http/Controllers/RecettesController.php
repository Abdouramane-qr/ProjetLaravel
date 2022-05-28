<?php

namespace App\Http\Controllers;

use App\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecettesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recette::all();
        // $depense = Recette::where('motif_depense', 'montant')->get();
        // $depenses = Recette::all()->groupBy('motif_depense')->map(function ($row) {
        //     return $row->sum('montant');
        // });

        //dd($depenses);
        $depenses = Recette::select('motif_depense',
        DB::raw('SUM(montant) as montant')
        )
        ->groupBy('motif_depense')
        ->get();
        // dd($depenses);

        return view('recettes.index', compact('recettes', 'depenses'))->with(['recettes' => $recettes, 'depenses' => $depenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$recettes = $request->all();
        // Recette::create($recettes);
        $request->validate([
            'nom' => 'required',
            'montant' => 'required',
            'motif_depense' => 'required',
        ]);

        $recettes = new Recette();
        $recettes->nom = $request->nom;
        $recettes->montant = $request->montant;
        $recettes->motif_depense = $request->motif_depense;
        $recettes->save();
        view()->share('input', $recettes);

        return redirect('/recettes')->with('success', 'DEPENSES AJOUTE AVEC SUCCES');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::findOrFail($id);

        return view('recettes.show ')->with('recettes', $recette);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::findOrfail($id);

        return view('recettes.edit')->with('recette', $recette);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'montant' => 'required',
            'motif_depense' => 'required',
        ]);

        $recettes = Recette::find($id);
        $recettes->nom = $request->nom;
        $recettes->montant = $request->montant;
        $recettes->motif_depense = $request->motif_depense;
        view()->share('recettes', $recettes);
        $recettes->update();
        //  dd($recettes);

        return redirect('/recettes')->with('success', 'DEPENSES MODIFIE AVEC SUCCES');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recette::destroy($id);

        return redirect('/recettes')->with('success', 'DEPENSES SUPPRIME AVEC SUCCES');
    }
}
