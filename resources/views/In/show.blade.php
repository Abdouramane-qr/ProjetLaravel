@extends('main')
@section('title')
    Clients
@endsection


@section('contents')
    <div class="row">

        <div class="col-md-12">
            <div class="widget">
                <div class="widget-header">
                    <h2 class="text-center"><strong>Client</strong></h2>

                    {{-- <div class="additional-btn">
                        <a href="{{ route('get_add_entres') }}"><button
                                class="btn btn-success pull-right">Ajouter</button></a>
                    </div> --}}
                </div>
                <fieldset>
                    <form enctype="multipart/form-data" class="form-row" method="POST"
                        action="{{ route('commande.store') }}">
                        @csrf
                        <div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name</label>
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez telephone"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Telephone</label>
                                <input type="text" name="telephone" class="form-control" id="telephone"
                                    placeholder="Entrez telephone" required>
                            </div>

                            <div class="col-xs-3">
                                <select  name="status" aria-label="Disabled select example" id="status" class="form-control">
                                    
                                    <option value="Credit">Credit</option>
                                    <option value="paid">Paid</option>  
                                   
                                </select>
                            </div>


                           
                        
                               <center>
                                <div  class="row ">
                                    <div class="col-sm-6 ">
                                      <div class="card ">
                                        <div class="card-body">
                                          <h2 class="card-title"><b>vente Total</b></h2>
                                          <p class="card-text"><h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                          </svg></h2></p>
                                          <span class="btn btn-primary">2000 FCFA</span>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                          <div class="card-body">
                                            <h2 class="card-title"><b>Vente a crédit</b></h2>
                                            <p class="card-text"><h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                              </svg></h2> With supporting text below as a natural</i></p>
                                              <span class="btn btn-primary"><table class="table table-light">
                                                <tbody>
                                                  @foreach ( $credit as $credits)
                                                    <tr>
                                                     <td>{{ $credits->solde}}</td> 
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table></span>
                             
                                          </div>
                                        </div>
                                      </div>

                                    <div class="col-sm-6">
                                      <div class="card">
                                        
                                        <div class="card-body">
                                          <h2 class="card-title"><b>Vente payé</b></h2>
                                          <p class="card-text"><h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                          </svg></h2>With supporting text below as a natural</p>
                                          <span class="btn btn-primary"><table class="table table-light">
                                              <tbody>
                                                @foreach ( $depen as $depens)
                                                  <tr>
                                                   <td>{{ $depens->solde}}</td> 
                                                  </tr>
                                                  @endforeach
                                              </tbody>
                                          </table></span>
                                        </div>
                                      </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="card">
                                          <div class="card-body">
                                            <h2 class="card-title"><b>Vente a crédit</b></h2>
                                            <p class="card-text">With supporting text below as a natural</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div> --}}
                                  </div>

                                  

                               </center>
                           

                          



                            <div class="widget-content">
                                <br>
                                <div class="table-responsive">

                                    <div>
                                    </div>

                                    {{-- Debut table Articles --}}
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                                        width="100%">
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

                                <table class="table table-light">
                                    <table class="table table-light">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Status</th>
                                                <th scope="col">Accept</th>
                                                <th scope="col">Reject</th>
                                                <th scope="col">Order<br>Completed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($orders as $order)
                                                
                                            <td>{{ $order->status }}</td>
                                            <form action="{{ route('status.order', $order->id) }}" method="post">@csrf
                                                <td>
                                                    <input name="status" type="submit" value="accepted"
                                                        class="btn btn-primary btn-sm">
                                                </td>
                                                <td>
                                                    <input name="status" type="submit" value="rejected"
                                                        class="btn btn-danger btn-sm">
                                                </td>

                                                <td>
                                                    <input name="status" type="submit" value="completed"
                                                        class="btn btn-success btn-sm">
                                                </td>
                                            </form>
                                            @endforeach --}}
                                        </tbody>
                                    </table>
                                    <tbody>
                                        <tr>
                                            <td></td>

                                        </tr>
                                    </tbody>
                                </table>
                                <div class="table-responsive">
                                    {{ csrf_field() }}
                                    {{-- Debut table panier --}}
                                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Article</th>
                                                <th>Quantite</th>
                                                <th>Prix Unitaire</th>
                                                <th>solde</th>
                                                <th>Action</th>
                                                {{-- <th scope="col">Status</th> --}}

                                            </tr>
                                        </thead>


                                        <tbody id="panier">


                                        </tbody>
                                    </table>
                                    {{-- Fin table panier --}}

                                    <h3>
                                        <div style="float&#58;left">Vendeur</div>

                                        <div name="solde" id style="float&#58;right">TOTAL: <span
                                                id="grt">{{ $prixTotalCom }}</span>
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

            if ((quantite < 1) && (pu < 1)) {

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

        
    </script>

    
@endsection
