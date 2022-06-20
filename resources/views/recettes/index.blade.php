@extends('main')

{{-- @section('contents')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> --}}

{{-- @if (session()->has('message'))
                    <p class="btn btn-success btn-block btn-sm custom_message text-left">{{ session()->get('message') }}
                    </p>
                @endif

                <legend style="color: green; font-weight: bold;">LISTE DES DEPENSES
                    <a href="{{ route('recette.create') }}"
                        style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;">
                        AJOUT DEPENSES</a>
                </legend>

               

                                <form id="delete-{{ $recette->slug }}" method="post"
                                    action="{{ route('recette.delete', $recette->id) }}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                </td>
                            </tr>
                        @empty
                            <p> No product found!</p>
                        @endforelse
                    </tbody>
                </table>
            </div> --}}
{{-- <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ESSENCES</th>
                        <th>SONABEL</th>
                        <th>ONEA</th>
                        <th>DIVERS</th>



                    </tr>
                </thead>

                <tbody>
                    <tr> --}}
{{-- @foreach ($depenses as $depens)
                            <td> {{ $depens }}</td>
                        @endforeach --}}






{{-- </tr>

                </tbody>

            </table>
        </div>
    </div>
@endsection --}}














@section('contents')
    <div class="row">
        <div class="col-lg-11">
            <h3>LISTE DES DEPENSES</h3>
        </div>

        <legend style="color: green; font-weight: bold;">LISTE DES DEPENSES
            <a href="{{ route('recette.create') }}"
                style="float: right; display: block;color: white; background-color: green; padding: 1px 5px 1px 5px; text-decoration: none; border-radius: 5px; font-size: 17px;">
                AJOUT DEPENSES</a>
        </legend>
        {{-- <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('recette.create') }}">Ajouter</a>
        </div> --}}
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nom</th>
            <th>Montant</th>
            <th>Motif depense</th>
            <th>Action</th>


        </tr>

        @foreach ($recettes as $index => $recette)
            <tr>
                <td>{{ $index }}</td>
                <td class="text-center">{{ $recette->nom }}</td>
                <td class="text-center">{{ $recette->montant }}</td>
                <td class="text-center">{{ $recette->motif_depense }}</td>
                <td>



                    <form action="{{ route('recette.delete', $recette->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        {{-- <a class="btn btn-info" href="{{ route('recette.view',$recette->id) }}">Voir</a> --}}
                        <a class="btn btn-primary" href="{{ route('recette.edit', $recette->id) }}">Modifier</a>


                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <span id="dat" style="float&#58;right">
        <h3>Date:{{ date('d/m/Y') }}</h3>
    </span>


    <div>
        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">


            <tbody>
                @foreach ($depenses as $depense)
                    <tr>
                        <td>{{ $depense['motif_depense'] }}</td>
                        <td>{{ $depense['montant'] }}</td>

                    </tr>
                @endforeach

            </tbody>

        </table>


    </div>
    @if (is_array($sums) || is_object($sums))
        <tbody>
            @foreach ($sums as $sum)
                <tr>
                    <td>{{ $sum }}</td>
                </tr>
            @endforeach



        </tbody>
    @else
        <tr>
            <h2> Total:<i>
                    <td>{{ $sums }}&nbsp;FCFA</td>
                </i></h2>
        </tr>
    @endif

    <div>
        <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">


            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group['motif_depense'] }}</td>
                        <td>{{ $group['montant'] }}</td>

                    </tr>
                @endforeach

            </tbody>

        </table>

        @if (is_array($sums) || is_object($sums))
        <tbody>
            @foreach ($sums as $sum)
                <tr>
                    <td>{{ $sum }}</td>
                </tr>
            @endforeach



        </tbody>
    @else
        <tr>
            <h2> Total:<i>
                    <td>{{ $sums }}&nbsp;FCFA</td>
                </i></h2>
        </tr>
    @endif

    </div>



@endsection

<script src="">
    AJAX('GET/recettes', function(res) {

        var groups = [];
        res.forEach(function(menu) {
            var parent = menu.parent;

            var group_name = menu.parent;

            if (groups[group_name]) {

                groups[group_name].items.push(menu);

            } else {
                groups[group_name] = {

                    id: id;
                    montant: montant;
                    items[menu];
                };
            };
        });

        var arr = [];
        for (var key in groups) {
            arr.push({
                name: key;
                items: groups[key].items

            });
            groups[key].items.quicksort('name');
        }

    });
</script>
