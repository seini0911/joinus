<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Mon Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($sprovider != null)
                                    @if($sprovider->image)
                                        <img src="{{ asset('images/sproviders')}}/{{$sprovider->image}}" alt="Admin" class="rounded-circle p-1" width="130">
                                    @else
                                        <img src="{{ asset('images/sproviders/default.jpg')}}" alt="Admin" class="rounded-circle p-1 " width="130">
                                    @endif
                                
                                    <div class="mt-3">
                                    <h4>{{ Auth::user()->name}}</h4>
                                    <p class="text-muted font-size-sm">{{$sprovider->about}}</p>
                                    <p class="text-muted font-size-sm">{{Auth::user()->email}}</p>
                                    <p class="text-muted font-size-sm">{{Auth::user()->phone}}</p>
                                    @if($sprovider->service_id)
                                        <p class="text-muted font-size-sm">{{$sprovider->service->name}}</p>
                                    @endif
                                    <p class="text-muted font-size-sm">{{$sprovider->service_locations}}</p>
                                    <p class="text-muted font-size-sm">{{$sprovider->city}}</p>
                                    @if($sprovider->status === 0)
                                        <span class="text-danger">Compte Inactif</span>
                                    @else
                                        <span class="text-success">Compte actif</span>
                                    @endif
                                    <hr/>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom Complet</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="" placeholder="{{Auth::user()->name}}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="" placeholder="{{Auth::user()->email}}" disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Téléphone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" class="form-control" value="" placeholder="{{Auth::user()->phone}}" disabled/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Type de Compte</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="" placeholder="Prestataire" disabled/>
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
                                    <h6 class="mb-0">Mot de passe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="" placeholder="votre mot de passe" disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                   <a href="{{route('sprovider.edit_profile')}}" class="btn btn-success">Modifier mon profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>