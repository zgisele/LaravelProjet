@include('defaud')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>BONJOUR</h1>



    <div class="container">
        <div class="row">
            <!-- <div class="col col-12 col-md-3 m-1"> -->
            @for ($i=1; $i < 8; $i++)
                 <div class="col-12 col-md-4 my-1">
                    <div class="card mx-5" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Nom de la tache{{$i}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Priorité:haute</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Supprimer</a>
                            <a href="#" class="card-link">details</a>
                        </div>
                    </div>
                 </div>
            @endfor
            <!-- </div> -->
        </div>

    </div>
    
</body>
</html>