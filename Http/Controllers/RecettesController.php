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
        $depenses = Recette::all()->groupBy('motif_depense')->map(function ($row) {
            return $row->sum('montant');
        });

        // dd($depenses);
        // $depense = DB::table('recettes')->select('recettes.*')->groupBy('motif_depense')->sum('montant')->get();

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
        $recettes = $request->all();
        Recette::create($recettes);
        view()->share('input', $recettes);

        return view('recettes.index', compact('recettes'))->with('flash_message', 'Recette Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::find($id);

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
        $recette = Recette::find($id);
        $input = $request->all();
        $recette->update($input);
        view()->share('recette', $recette);

        return redirect('recette')->with('flash_message', 'Contact Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recette::destroy($id);

        return redirect('recette')->with('flash_message', 'Contact deleted!');
    }
}
