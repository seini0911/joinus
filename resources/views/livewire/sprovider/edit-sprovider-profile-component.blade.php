<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Mon Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier mon profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                @if(Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message')}}</p>
                @endif
                <form wire:submit.prevent="updateProfile">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                            <div class="mt-3">
                                                <label for="newimage" class="text-danger">Choisir une photo de profile</label>
                                                     <input type="file" name="newimage" class="form-control-file" wire:model="newimage"/>
                                                @if($newimage)
                                                    <img src="{{ $newimage->temporaryUrl()}}" alt="Admin" class="rounded-circle p-1 " width="130">
                                                @elseif($image)
                                                    <img src="{{ asset('images/sproviders')}}/{{$image}}" alt="Admin" class="rounded-circle p-1 " width="130">
                                                @else
                                                    <img src="{{ asset('images/sproviders/default.jpg')}}" alt="Admin" class="rounded-circle p-1 " width="130">
                                                @endif
                                            </div>
                                            <hr/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body px-3">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nom Complet</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control" value="" placeholder="Votre nom qui sera montrer aux clients" wire:model="name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">A Propos de moi</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="about" id="about" class="form-control" cols="30" rows="10" wire:model="about">
                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" class="form-control" value="" placeholder="seiniabaya@gmail.com" wire:model="email"/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Téléphone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="tel" name="phone" class="form-control" value="" placeholder="(239) 816-9029" wire:model="phone" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Ville</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="city" class="form-control" value="" placeholder="nom de la ville" wire:model="city" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Type de Compte</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="account_type" class="form-control" value="" placeholder="Prestataire" disabled/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Premium</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" value="" placeholder="Non" disabled/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                        <h6 class="mb-0">Catégorie</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="category_name" class="form-control" value="" placeholder="Nom de la categorie du service" disabled/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Service offert</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select class="form-select mb-3" name="service_id" aria-label="Default select example" wire:model="service_id">
                                            <option selected>Choisir votre service</option>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Lieu de travail</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="service_locations" class="form-control" value="" placeholder="nom du lieu de travail" wire:model="service_locations" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mot de passe</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" name="password" class="form-control" value="" placeholder="Mot de passe" wire:model="password"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                          <button class="btn btn-success" type="submit">Mettre mon profile à jour</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>