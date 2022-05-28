@extends('main')

@section('title')
  Dashboard
@endsection
@section('styles')
<link rel="stylesheet" href="assets/css/main.css" charset="utf-8">
@endsection
@section('contents')
<h3>Historique</h3>

<div class="row">

    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header transparent">
          <h2 class="text-center"><strong>Sorties</strong></h2>
          <div class="additional-btn">
            <a href="{{ route('show.entres') }}" class="infos-dashboard">Plus d'options ...</a>
          </div>
        </div>
        <div class="widget-content">
          <div class="table-responsive">
            <table data-sortable class="table table-hover table-striped">
              <thead>
                    <thead>
                          <tr>
                             <th>Nom Client</th>
                              <th>Article</th>
                              <th>Date</th>
                              <th>Quantite</th>
                              <th>Prix Unitaire</th>
                              {{-- <th>Adresse</th>
                              <th>Email</th> --}}
                          </tr>
                      </thead>
              </thead>

               <tbody>
                        @foreach($commandes as $command)
                          <tr>

                              <td>{{ $command->nom }}</td>
                              <td>{{ $command->article }}</td>
                              <td>{{ $command->created_at }}</td>
                                    <td>{{ $command->quantite}}</td>
                              <td>{{ $command->price }}</td>
                        
                              {{-- <td>{{ $command->adresse}}</td>
                              <td>{{ $command->email }}</td> --}}

                          </tr>
                        @endforeach

                      </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    <div class="col-md-12">
      <div class="widget">
        <div class="widget-header transparent">
          <h2 class="text-center"><strong>Entres</strong></h2>
          <div class="additional-btn">
            <a href="{{ route('show.sorties') }}" class="infos-dashboard">Plus d'options ...</a>
          </div>
        </div>
        <div class="widget-content">
          <div class="table-responsive">
            <table data-sortable class="table table-hover table-striped">
              <thead>
                    <thead>
                          <tr>
                             <th>Types</th>
                              <th>Date</th>
                              <th>N°=Facture</th>
                              <th>Quantite</th>
                              <th>Prix Unitaire</th>
                              <th>Adresse</th>
                              <th>Email</th>
                          </tr>
                      </thead>
              </thead>

               <tbody>
                        @foreach($sorties as $sortie)
                          <tr>

                              <td>{{ $sortie->type->name }}</td>
                              <td>{{ $sortie->date }}</td>
                              <td>{{ $sortie->nfacture }}</td>
                              <td>{{ $sortie->quantite}}</td>
                              <td>{{ $sortie->prix_uni}}</td>
                              <td>{{ $sortie->fourni }}</td>

                          </tr>
                        @endforeach

                      </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    

</div>
@endsection
@section('scripts')

<script>
       $('#active-home').addClass('active');
</script>
@endsection