<div class="page-content">
    <!-- Section Prestataires de services -->
    <h6 class="mb-0 text-uppercase">Bannières du site</h6>
    <hr/>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <!--  -->
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total</p>
                        <h4 class="my-1 text-warning">{{$slidesNumber}}</h4>
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
                        <h4 class="my-1 text-success">{{$activeSlides}}</h4>
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
                        <h4 class="my-1 text-danger">{{ $inactiveSlides}}</h4>
                        <p class="mb-0 font-13"></p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bx-current-location' ></i>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- -->
    </div>
    <hr>
    <a href="{{route('admin.add_slide')}}" class="btn btn-primary">Ajouter une bannière</a>
    <!--end row-->
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Date d'enregistrement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i= 1; ?>
                    @foreach($slides as $slide)
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><img src="{{ asset('images/slider')}}/{{ $slide->image }}" class="" width="60" alt=""/> </td>
                        <td>{{ $slide->title }}</td>
                        <td>
                            @if($slide->status)
                                Actif
                            @else
                                Inactif
                            @endif
                        </td>
                        <td>{{ $slide->created_at }}</td>
                        <td>
                            <div class="d-flex flex-direction-row">
                                <div class="col">
                                    <a href="{{route('admin.edit_slide',['slide_id'=>$slide->id])}}" class="btn btn-outline-success"><i class='bx bx-edit'></i></a>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-outline-danger" onclick="confirm('Êtes vous sûr de vouloir supprimer cette banniere ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{$slide->id}})" style="margin-left: 10px;">
                                    <i class='bx bx-trash'></i></a>
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