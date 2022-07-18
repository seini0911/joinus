
<div class="page-content">
    <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2">
        <div class="d-flex align-items-center">
            <div class="font-35 text-primary"><i class='bx bx-bookmark-heart'></i>
            </div>
        <div class="ms-3">
            <h6 class="mb-0 text-primary">REALISATIONS</h6>
            <div>AJOUTER UNE DE VOS REALISATION</div>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <button class="btn btn-primary"><a href="{{ route('sprovider.realisations') }}" class="text-white">Liste des réalisations</a> </button>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <form class="" wire:submit.prevent="addRealisation">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            Ajouter une image de la réalisation
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($image)
                                    <img src="{{ $image->temporaryUrl()}}" alt="picture" class="rounded-circle p-1 " width="130">
                                @else 
                                    <img src="{{ asset('images/svprealisations/default.png')}}" alt="picture" class="rounded-circle p-1 " width="130">
                                @endif
                                <input type="file" name="image" class="form-control-file" wire:model="image"/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <input type="text" name="name" class="form-control"  placeholder="Entrer le nom de la realisation" wire:model="name"  />
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Description de la tâche</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <textarea name="about" id="" cols="30" rows="10" class="form-control" wire:model="about"></textarea>
                                    @error('about')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Ville</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <input type="text" name="city" class="form-control"  placeholder="Ville ou la tâche a été effectuée" wire:model="city"  />
                                    @error('city')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Tâche inclus dans le service :</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <select class="form-select mb-3" name="service_id" aria-label="Default select example" wire:model="service_id">
                                        <option selected>Choisir votre service</option>
                                        @if($services !=null)
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Lieu où la tâche a été réalisée :</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <input type="text" name="service_location" class="form-control"  placeholder="lieu de service" wire:model="service_location"  />
                                    @error('service_location')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <center>
                            <button class="btn btn-success" type="submit" name="saveRealisation">Enregistrer cette réalisation</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>