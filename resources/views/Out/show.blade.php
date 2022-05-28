@extends('main')
@section('title')
Fournisseurs


@section('contents')
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2 class="text-center"><strong>Fournisseurs</strong></h2>

                    {{-- <div class="additional-btn">
                        <a href="{{ route('get_add_sorties') }}"><button
                                class="btn btn-success pull-right">Ajouter</button></a>
                    </div>  --}}
                </div>
                <fieldset>
                    <form enctype="multipart/form-data"   class="form-row" method="POST" action="{{ route('fournis.store') }}">
                        @csrf
                        <div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Entrez nom" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Adresse</label>
                                <input type="text" name="adresse" class="form-control" id="adresse"
                                    placeholder="Entrez Adresse" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Entrez email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Telephone</label>
                                <input type="text" name="telephone" class="form-control" id="telephone"
                                    placeholder="Entrez Adresse" required>
                            </div>
                        </div>


                        
                <div class="widget-content">
                    <br>
                    <div class="table-responsive">

                        <div>
                        </div>

                        {{-- Debut table Articles --}}
                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Article</th>
                                    <th>Quantite</th>
                                    <th>Prix Unitaire</th>
                                    <th>solde</th>
                                    <th>Action</th>

                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($types as $type)
                                    <tr id="article{{ $type->id }}">
                                        <td>{{ $type->id }}</td>
                                        <td>{{ $type->name }}</td>
                                        <td>{{ $type->Current_stock }}</td>
                                        <td>{{ $type->price }}</td>
                                        <td>{!! $type->solde = $type->Current_stock * $type->price !!}</td>
                                        
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <span
                                                    onclick="select3({{ $type->id }}, '{{ $type->name }}', {{ $type->Current_stock }}, {{ $type->price }},  {{ $type->price }})"
                                                    class="btn btn-info"><i class="fa fa-cart"></i>Ajouter
                                                </span>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                        {{-- Fin table Articles --}}

                    </div>


                    <div class="table-responsive">
                        {{ csrf_field() }}
                        {{-- Debut table panier --}}
                        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Article</th>
                                    <th>Quantite</th>
                                    <th>Prix Unitaire</th>
                                    <th>solde</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody id="panier">



                            </tbody>
                        </table>
                        {{-- Fin table panier --}}

                        <h3>
                            <div style="float&#58;left">Vendeur</div>

                            <div name="solde" id style="float&#58;right">TOTAL: <span id="grt">{{ $prixTotalCom }}</span>
                                FCFA
                            </div>
                        </h3>
                        
                    </div>
                   
                </div>
                <blockquote>
                    <div>
                        {{-- Btn Enregistrer --}}
                        <li class="btn align-center">
                            <button id="action" class="btn btn-success" type="submit">Valider</button>
                            <a href="{{ route('generate-pdf') }}" class="btn btn-success"
                                type="button">Voir</a>
                        </li>
                    </div>
                    {{-- Fin Btn Engregistrer --}}
    
                </blockquote>
    
            </form>
        </fieldset>
            </div>
        </div>
        <!-- <td id="factur">${facture}</td> <input type="hidden" value="${type}" name="nom[]"> -->
        <!-- <td  id="qt">${qte} </td> -->

    </div>
@endsection
@section('scripts')
    <!-- Page Specific JS Libraries -->
    <script src="{{ URL::to('assets/libs/jquery-datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery-datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ URL::to('assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script src="{{ URL::to('assets/js/pages/datatables.js') }}"></script>
    <script>
        $('#active-entres-table').addClass('active');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        var panier = [];

        function select3(id, type, qte, pu, solde) {
            panier.push({
                id: id,
                type: type,
                pu: pu,
                solde: solde,
            });
            var tr = `<tr id="ligne${id}" style="cursor: pointer">
                @csrf
                                                        <td id="id"> ${id} </td><input type="hidden" value="${id}" name="id" required>

                                                         <td id="types"> ${type} </td><input type="hidden" value="${type}" name="article" required>


                                                         <td> <input type="number"  id="qte${id}" onchange="calcule(${id})"  palceholder="Entrez Quantité" value="1" name="quantite" ></td>

                                                         <td>${pu}<input  id="put${id}"   type="number" value="1" name="price"></td>

                                                         <td class="solde" id="solde${id}">${solde}</td><input type="hidden" value="${solde}" name="solde">
                                                          
                                                          <td ><div id="demoDialog" title="My Dialog Box" data-closable>
 
  <button   class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
</div></td>                         
                                    </tr>`;

            $('#panier').append(tr);
            $('#article' + id).hide();
        }

// var ttle = $('#grt').text(T);

        function calcule(id) {

            var quantite = $('#qte' + id + '').val();
            var pu = $('#put' + id + '').val();

            if ((quantite < 1) && ( pu < 1)) {

                (quantite = 1) && (pu = 1);

                $('#qte' + id + '').val(1);

                $('#put' + id + '').val(1);

            }

            $('#solde' + id).text(quantite * pu);

            total();
        }


        function total() {

            var T = 0;

            $('.solde').each(function() {

                var sld = parseInt($(this).text());
                T += sld;


                $('#grt').text(T);

            });
        }

        $(document).ready(function() {
            $("#demoDialog").dialog();
        });
    </script>
@endsection
