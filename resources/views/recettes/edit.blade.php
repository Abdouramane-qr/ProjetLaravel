@extends('main')
{{-- @push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush --}}
@section('contents')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> --}}

    {{-- @if (session()->has('message'))
            <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}</p>
          @endif --}}

    {{-- <legend style="color: green; font-weight: bold;">MODIFICATION DEPENSE 
           <a href="{{ route('recette.view') }}" style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;"> DEPENSE LIST</a>
          </legend> --}}
    {{-- <form action="{{ route('recette.update', $recettes->id) }}" method="post">
        
        <div class="form-group"> --}}
    {{-- <label for="">Name</label>
              <input type="text" class="form-control" name="nom" value="{{ $recettes->nom}}">
              <font style="color:red"> {{ $errors->has('nom') ?  $errors->first('nom') : '' }} </font>
            </div> --}}

    {{-- <div class="form-group">
              <label for="">Montant</label>
              <input type="numeric" class="form-control" name="montant" value="{{ $recettes->id }}">
              <font style="color:red"> {{ $errors->has('montant') ?  $errors->first('montant') : '' }} </font>
            </div> --}}


    {{-- <div class="form-group">
                <label for="">Motif Depense</label>
                <input type="text" class="form-control" name="motif_depense" value="{{ $recettes->id }}">
                <font style="color:red"> {{ $errors->has('motif_depense') ?  $errors->first('motif_depense') : '' }} </font>
              </div> --}}

    {{-- <div class="form-group" style="margin-top: 24px;">
                <input type="submit" class="btn btn-success" value="Update">
            </div>

    </form>
    </div>
    </div>
    </div>
@endsection --}}








    <h1>Modifier Depenses</h1>

    <legend style="color: green; font-weight: bold;">MODIFICATION DEPENSE
        <a href="{{ route('recette.view') }}"
            style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;">
            DEPENSE LIST</a>
    </legend>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>['reservation' => $data->id])
    @endif
    <form method="post" action="{{ route('recette.update', [$recette->id]) }}">
        {{ csrf_field() }}
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrer Nom" name="nom"
                value="{{ $recette->nom }}">
            <font style="color:red"> {{ $errors->has('nom') ? $errors->first('nom') : '' }} </font>

        </div>

        <div class="form-group mb-3">
            <label for="company">Montant ($):</label>
            <input type="numeric" class="form-control" name="montant" value="{{ $recette->montant }}">
        </div>

        <div class="form-group mb-3">
            <label for="fortune">Motif Depense:</label>
            <input type="text" class="form-control" name="motif_depense" value="{{ $recette->motif_depense }}">
        </div>

        <input type="submit" class="btn btn-success" value="Update">
        {{-- <button type="submit" class="btn btn-primary">Enregistrer</button> --}}
    </form>
@endsection
