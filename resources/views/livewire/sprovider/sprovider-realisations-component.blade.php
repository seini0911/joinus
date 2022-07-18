<div class="page-content">
   <h4 class="text-success text-uppercase">Mes réalisations</h4>
   <hr />
   <!-- Le total des realisations -->
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
         <!--  -->
         <div class="col">
         <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <div>
                     <p class="mb-0 text-secondary">Total</p>
                     <h4 class="my-1 text-warning">{{$realisation_number}}</h4>
                     <p class="mb-0 font-13"></p>
                  </div>
                  <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bx-folder'></i>
                  </div>
               </div>
            </div>
         </div>
         </div>
   <!-- -->   
   </div>
   <hr />
   <a href="{{route('sprovider.add_realisation')}}" class="btn btn-success text-white">Ajouter une réalisation</a>
   <hr/>
   <!--Les realisations effectues-->
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Image</th>
                     <th>Nom de la tâche</th>
                     <th>Nom Service</th>
                     <th>Ville</th>
                     <th>Lieu de service</th>
                     <th>Date de création</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 1; ?>
                  @if($realisations != null)
                     @foreach($realisations as $realisation)
                        <tr>
                           <td><?= $i ?></td>
                           <td>
                              <img src="{{ asset('images/svprealisations')}}/{{$realisation->image}}" alt="picture" class="rounded-circle p-1 " width="130"> 
                           </td>
                           <td>{{$realisation->name}}</td>
                           <td>{{$realisation->service['name']}}</td>
                           <td>{{$realisation->city}}</td>
                           <td>{{$realisation->service_location}}</td>
                           <td>{{$realisation->created_at}}</td>
                           <td>
                              <div class="d-flex flex-direction-row">
                                 <div class="col">
                                    <button type="button" class="btn btn-outline-success"><i
                                          class='bx bx-edit'></i>
                                    </button>
                                 </div>
                                 <div class="col">
                                    <button type="button" class="btn btn-outline-danger"><i
                                          class='bx bx-trash'></i>
                                    </button>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        <?php $i++; ?>
                     @endforeach
                  @endif
                  </tbody>
            </table>
         </div>
      </div>
   </div>
</div>