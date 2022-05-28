<?php

namespace App\Http\Controllers;

// use App\Client;
use App\Commande;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class CommandeController extends Controller
{
    public function generatePDF(Request $request)
    {
        $commandes = Commande::latest('created_at')->first()->get();
        // $commandes = Commande::where('id', 'article', 'quantite ', 'price', 'solde ')->get();
        $types = type::all();

        $prixTotalCom = 0;
        $name = '';
        $adresse = '';
        foreach ($commandes as $commands) {
            $prixTotalCom += $commands->TTLE();
            $name = $commands->nom;
            $adresse = $commands->adresse;
        }
        view()->share('commandes', $commandes);
        view()->share('prixTotalCom', $prixTotalCom);
        view()->share('types', $types);
        view()->share('name', $name);
        view()->share('adresse', $adresse);

        $pdf = PDF::loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            'name' => $name,
            'adresse' => $adresse,
        ]);

        return $pdf->download('commande.pdf');
    }

    public function download($id)
    {
        $commandes = Commande::latest('id')->first();
        $types = type::all();

        $prixTotalCom = 0;
        foreach ($commandes as $commands) {
            $prixTotalCom += $commands->TTLE();
            $name = $commands->nom;
            $adresse = $commands->adresse;
        }

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            // 'command' => $command,
            'name' => $name,
            'adresse' => $adresse,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }

    public function store(Request $request)
    {
        $Current_stock = 0;
        // $comm = Commande::find('id');
        // $types= type::find($comm->type_id);

        // if ($request->quantite==0 || $types->quantite<$comm->quantite) {
        //     Session::flash('info', 'l\'artcle est fini');

        //     return redirect()->back();
        // }

        $comm = new Commande();
        $comm->nom = $request->nom;
        $comm->article = $request->article;
        $comm->price = $request->price;
        $comm->quantite = $request->quantite;
        $comm->solde = $request->quantite * $request->price;

        // $comm = Commande::find('id');
        $types = type::find($request->id);
        // //dd($types);
        // if ($comm->quantite >= 0 || $types->quantite < $comm->quantite) {
        //     Session::flash('info', 'l\'artcle est fini');

        //     return redirect()->back();
        // }

        $Current_stock = $types->Current_stock - $comm->quantite;
        $types->Current_stock = $Current_stock;
        $types->save();
        $comm->save();

        // $comm->save(['Current_stock']);

        // Commande::create([
        //     'nom' => $request->nom,
        //     'article' => $request->article,
        //     'quantite' => $request->quantite,
        //     'price' => $request->price,
        //     // 'adresse' => $request->adresse,
        //     // 'email' => $request->email,
        //     // 'solde' => $request->solde,
        //    // 'telephone' => $request->telephone,
        //     'solde' => $request->quantite * $request->price,
        // ]);

        // dd($request->all());
        // $artciAct = $request->quantite - $request->Current_stock;
        // $requeste = type::find($request->id);
        // $requeste->quantite = $artciAct;
        // $Current_stock= $request->quantite - $request->qte;
        // 'quantite' => $request->Current_stock;
        // $requeste->save();
        // dd($request);

        return back()->with('success', 'La commande à été enregistré avec succès');
    }

    public function index()
    {
        $prixTotalCom = 0;
        $types = type::all();
        view()->share('types', $types);
        view()->share('prixTotalCom', $prixTotalCom);

        return view('In.show');
    }

    public function changeStatus(Request $request, $id)
    {
        $orders = Commande::find($id);
        Commande::where('id', $id)->update(['status' => $request->status]);
        view()->share('orders', $orders);

        return view('In.show', compact('$orders'));
    }

    public function generatePDFAvoir(Request $request)
    {
        $commandes = Commande::latest('created_at')->first()->get();
        // $commandes = Commande::where('id', 'article', 'quantite ', 'price', 'solde ')->get();
        $types = type::all();

        $prixTotalCom = 0;
        $name = '';
        $adresse = '';
        foreach ($commandes as $commands) {
            $prixTotalCom += $commands->TTLE();
            $name = $commands->nom;
            $adresse = $commands->adresse;
        }
        view()->share('commandes', $commandes);
        view()->share('prixTotalCom', $prixTotalCom);
        view()->share('types', $types);
        view()->share('name', $name);
        view()->share('adresse', $adresse);

        $pdf = PDF::loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            'name' => $name,
            'adresse' => $adresse,
        ]);

        return $pdf->download('commande.pdf');
    }

    public function downloaded($id)
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
            $prixTotalCom += $commands->TTLE();
            $name = $commands->nom;
            $adresse = $commands->adresse;
        }

        $pdf = app('dompdf.wrapper');

        $pdf->loadView('generate-pdf', [
            'prixTotalCom' => $prixTotalCom,
            'commandes' => $commandes,
            'types' => $types,
            // 'command' => $command,
            'name' => $name,
            'adresse' => $adresse,
        ])->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }
}
