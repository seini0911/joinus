<div class="page-content">
    <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-primary"><i class='bx bx-bookmark-heart'></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-primary">ACTIVATION DES COMPTES PRESTATAIRES</h6>
        </div>
    </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <hr>
    <a href="{{route('admin.all_sproviders')}}" class="btn btn-info text-white">Liste des prestataire</a>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        <hr>
    @endif

    <form class="" wire:submit.prevent="activateSproviderAccount">
        @csrf
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Nom </h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="sprovider_name" class="form-control" id="" placeholder="nom du prestataire" wire:model="sprovider_name" disabled>
                    
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Téléphone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="sprovider_phone" class="form-control" id="" placeholder="numero de telephone" wire:model="sprovider_phone" disabled>
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Ville</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="sprovider_city" class="form-control" id="" placeholder="nom du service choisi" wire:model="sprovider_city" disabled>
                        
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Lieu de service</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="sprovider_service_location" class="form-control" id="" placeholder="nom du service choisi" wire:model="sprovider_service_location" disabled>
                        </div>
                    </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Activer</h6>
                    </div>
                    <div class="col-sm-9">
                        <select name="status" id="status" class="form-select mb-3"  wire:model="status">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                    <center>
                        <button class="btn btn-primary px-4 mb-4" type="submit">Activé le compte prestataire</button>
                    </center>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </form>
</div>