@include('defaud')

<div class="container my-5">
        <h1 class="text-center">
            je souhaite afficher les details sur latache selectionnée

        </h1>
        <div class="card">
            <div class="card-header">
            {{$tacheTrouvee->nom_tache}}
            </div>
            <div class="card-body">
                    <h5 class="card-title">Priorité: {{$tacheTrouvee->priorite}}</h5>
                    <p class="card-text">{{$tacheTrouvee->description_tache}}</p>
                    <p class="card-text">Status:
                        @if($tacheTrouvee->is_termine==1)
                          Terminer
                        @else
                            En cours
                            <br> <a href="/tache/terminer/{{$tacheTrouvee->id}}" class="btn btn-primary">Terminer</a>
                        @endif
                    </p>
                    <!-- <a href="#" class="btn btn-primary">Terminer</a> -->
            </div>

        </div>

</div>