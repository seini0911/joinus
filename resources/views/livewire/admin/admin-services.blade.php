<div class="page-content">
   <!-- Section services enregistrés -->
   <h6 class="mb-0 text-uppercase">services enregistrés</h6>
   <hr/>
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <!--  -->
     <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-warning">
        <div class="card-body">
           <div class="d-flex align-items-center">
              <div>
                 <p class="mb-0 text-secondary">Total</p>
                 <h4 class="my-1 text-warning">{{ $servicesNumber }}</h4>
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
                 <p class="mb-0 text-secondary">Publier</p>
                 <h4 class="my-1 text-success">{{$featuredServices}}</h4>
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
                 <h4 class="my-1 text-danger">{{$unfeaturedServices}}</h4>
                 <p class="mb-0 font-13"></p>
              </div>
              <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bx-current-location' ></i>
              </div>
           </div>
        </div>
     </div>
    </div>
   </div>
  <!--end row-->
   <hr/>
   <div class="row">
      <div class="col-12">
         <button class="btn btn-primary"><a href="{{ route('admin.add_service')}}" class="text-white"> Ajouter un service</a></button>
      </div>
   </div>
      @if(Session::has('message'))
         <div class="alert alert-success">
            {{ Session::get('message')}}
         </div>
       @endif
   <hr/>
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Nom</th>
                     <th>Catégorie</th>
                     <th>Publier</th>
                     <th>Date de création</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1; ?>
                  @foreach($services as $service)
                     <tr>
                        <td> <?= $i; ?></td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->category['name'] }}</td>
                        <td>
                           @if($service->status)
                              oui
                           @else
                              non
                           @endif
                        </td>
                        <td>{{ $service->created_at }}</td>
                        <td>
                           <div class="d-flex flex-direction-row">
                              <div class="col">
                                    <a href="{{route('admin.edit_service',['service_slug'=>$service->slug])}}" class="btn btn-success">
                                       <i class='bx bx-edit'></i>
                                    </a>
                              </div>
                              <div class="col">
                                    <a href="" onclick="confirm('Êtes vous sûr de vouloir supprimer ce service ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{$service->id}})" class="btn btn-danger">
                                     <i class='bx bx-trash'></i>
                                    </a>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <?php $i ++; ?>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>