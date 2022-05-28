@extends('main')

@section('contents')
    <h1>Affichage Depenses</h1>

    <table class="table table-bordered">
        <tr>
            <th>Nom:</th>
            <td>{{ $recettes->nom }}</td>
        </tr>
        <tr>
            <th>Montant:</th>
            <td>{{ $recettes->montant }}</td>
        </tr>
        <tr>
            <th>Motif depense:</th>
            <td>{{ $recettes->motif_depense }}</td>
        </tr>
       

    </table>
@endsection
