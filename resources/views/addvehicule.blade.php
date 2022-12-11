
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container mt-5">
    <p class="text-start "><a href="{{'dashboard'}}" class="btn  fs-1 text-success">dashboard</a>/nouvelle Voiture</p>

    <p class="text-start fs-4">Ajouter une nouvelle Voiture</p>
</div>
<main class="">
    <section class="section ">
        <center>
            <div class="container">
                <div class="card o-hidden border-0 shadow-lg my-1" style="width:600px;">
                    <div class="container" style="width:90%;height:300px">
                        <br>
                        <div class="row">
                            <div class="container" style="width:400px;height:300px">
                                <br>
                                <div class="mb-1">
                                    <form action="{{route('postvehicule')}}" method="post">
                                        @csrf
                                        <div class="mb-1">
                                            <label for="matricule" class="form-label"  >matricule</label>
                                            <input id="matricule" class="form-control mt-1 w-full" type="text" name="matricule" required autofocus />
                                        </div>
                                        <div class="mb-1">
                                            <label for="prix" class="form-label"  >prix</label>
                                            <input id="prix" class="form-control mt-1 w-full" type="text" name="prix" required autofocus />
                                        </div>
                                        <div class="mb-1">
                                            <label for="marque_id" class="form-label">marque</label>
                                            <select name="marque_id" id="marque_id" class="form-control">
                                            @foreach ($marques as $marque)
                                                <option value="{{$marque->id}}">
                                                    {{$marque->libelle}}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-1">sauvegarder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </center>
    </section>
</main>
