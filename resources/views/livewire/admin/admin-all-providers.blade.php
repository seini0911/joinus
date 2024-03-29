<div class="page-content">
    <!-- Section Prestataires de services -->
    <h6 class="mb-0 text-uppercase">Prestataires de services</h6>
    <hr/>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <!--  -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total</p>
                        <h4 class="my-1 text-warning">{{ $sProvidersNumber }}</h4>
                        <p class="mb-0 font-13"></p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bx-folder'></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Actifs</p>
                        <h4 class="my-1 text-success">{{$activesvpnumber}}</h4>
                        <p class="mb-0 font-13"></p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bx-book-open'></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Inactifs</p>
                        <h4 class="my-1 text-danger">{{$inactivesvpnumber}}</h4>
                        <p class="mb-0 font-13"></p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bx-current-location' ></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Premium</p>
                        <h4 class="my-1 text-info">0</h4>
                        <p class="mb-0 font-13"></p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
            </div>
        </div> 
    </div>
    <!--end row-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Service</th>
                        <th>Actif</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; ?>
                    @foreach($sproviders as $sprovider)
                    <?php $i++; ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            @if($sprovider->image != null)
                                <img src="{{ asset('images/sproviders')}}/{{$sprovider->image}}" alt="Admin" class="rounded-circle p-1" width="130">
                            @else
                                <img src="{{ asset('images/sproviders/default.png')}}" alt="Admin" class="rounded-circle p-1" width="130">
                            @endif
                        </td>
                        <td>{{$sprovider->user['name']}}</td>
                        <td>{{$sprovider->user['phone']}}</td>
                        <td>{{$sprovider->user['email']}}</td>
                        <td>{{$sprovider->service['name']}}</td>
                        <td>
                            @if($sprovider->status)
                                Oui
                            @else
                                Non
                            @endif
                        </td>
                        <td>{{$sprovider->user['created_at']}}</td>
                        <td>
                            <div class="d-flex flex-direction-row">
                                <div class="col">
                                    <a href="{{route('admin.activate_sprovider_account',['sprovider_id'=>$sprovider->user['id']]) }}" class="btn btn-success"> 
                                        <i class='bx bx-edit'></i>
                                    </a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-outline-danger"><i
                                        class='bx bx-trash'></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>