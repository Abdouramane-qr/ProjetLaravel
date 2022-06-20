@extends('main')
@section('title')
Generation
@endsection

@section('contents')
    <div class="row">
<div>HISTORIQUE SORTIES</div>
      <div class="col-md-12">
        <div class="widget">
          <div class="widget-header">
            <h2 class="text-center"><strong>Generations</strong></h2>

          </div>
          <div class="widget-content">
          <br>
            <div class="table-responsive">
              <form class='form-horizontal' role='form'>
              <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
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


                      <tbody>
                        @foreach($commandes as $command)
                          <tr>

                              <td>{{ $command->nom }}</td>
                              <td>{{ $command->article }}</td>
                              <td>{{ $command->created_at }}</td>
                              <td>{{ $command->quantite}}</td>
                              <td>{{ $command->price }}</td >
                              
                             
                              {{-- <td>{{ $command->adresse}}</td>
                              <td>{{ $command->email }}</td> --}}

                          </tr>
                        @endforeach

                      </tbody>
                  </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
@section('scripts')
  <!-- Page Specific JS Libraries -->
  <script src="{{ URL::to('assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::to('assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
  <script src="{{ URL::to('assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
  <script src="{{ URL::to('assets/js/pages/datatables.js') }}"></script>
  <script>
       $('#active-generation').addClass('active');
</script>
@endsection
