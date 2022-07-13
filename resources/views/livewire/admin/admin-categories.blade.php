<div class="page-content">
   <!-- Section catégories de services -->
   <h6 class="mb-0 text-uppercase">Catégories de services</h6>
   <hr/>
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
      <!--  -->
      <div class="col">
      <div class="card radius-10 border-start border-0 border-3 border-warning">
         <div class="card-body">
            <div class="d-flex align-items-center">
               <div>
                  <p class="mb-0 text-secondary">Total</p>
                  <h4 class="my-1 text-warning">{{ $scategoriesnumber }}</h4>
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
                  <h4 class="my-1 text-success">{{ $featuredSCategories }}</h4>
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
                  <h4 class="my-1 text-danger">{{ $unfeaturedSCategories }}</h4>
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
         <button class="btn btn-primary"><a href="{{ route('admin.add_service_category')}}" class="text-white">Ajouter une catégorie</a></button>
      </div>
   </div>
   <hr/>
   <div class="card">
      <div class="card-body">
         <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Nom</th>
                     <th>Image</th>
                     <th>Slug</th>
                     <th>Actif</th>
                     <th>Date de création</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i = 0; ?>
                  @foreach($scategories as $scategory)
                  <?php $i++; ?>
                  <tr>
                     <td> <?= $i; ?></td>
                     <td>{{ $scategory->name }}</td>
                     <td><img src="{{ asset('images/categories')}}/{{ $scategory->image }}" class="" width="60" alt=""/></td>
                     <td>{{ $scategory->slug }}</td>
                     <td>
                        @if($scategory->featured)
                              Oui
                        @else 
                           Non
                        @endif
                     </td>
                     <td>{{ $scategory->created_at }}</td>
                     <td>
                        <div class="d-flex flex-direction-row">
                        
                           <div class="col">
                              
                                 <a href="{{route('admin.edit_service_category',['category_id'=>$scategory->id]) }}" class="btn btn-success"> 
                                    <i class='bx bx-edit'></i>
                                 </a>
                           
                           </div>
                           <div class="col">
                              
                                 <a href="#" onclick="confirm('Êtes-vous sûre de vouloir supprimer cette catégorie de service ?') ||event.stopImmidiatePropagation()" wire:click.prevent="deleteserviceCategory({{$scategory->id}})" class="btn btn-danger">
                                    <i class='bx bx-trash'></i>
                                 </a>
                            
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