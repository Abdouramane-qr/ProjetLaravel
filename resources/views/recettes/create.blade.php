@extends('main')


               





@section('contents')
<legend style="color: green; font-weight: bold;">ENREGISTREMENT DES DEPENSES
  <a href="{{ route('recette.view') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> DEPENSES LIST</a>
 </legend>

    <h1>Ajouter une depenses</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
      <form action="{{ route('recette.create') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez un nom" name="nom">
        </div>

        <div class="form-group mb-3">
            <label for="company">Montant  ($):</label>
            <input type="number" class="form-control" name="montant" placeholder="montant" >
        </div>


        <div class="form-group mb-3">
            <label for="fortune">Motif Depenses ($):</label>
            <input type="text" class="form-control" id="motif_depense" placeholder="motif_depense" name="motif_depense">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Enregister</button>
    </form>
@endsection
