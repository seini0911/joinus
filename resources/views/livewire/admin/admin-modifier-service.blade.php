<div class="page-content">
   
    <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
       <div class="d-flex align-items-center">
          <div class="font-35 text-success"><i class='bx bx-bookmark-heart'></i>
          </div>
          <div class="ms-3">
             <h6 class="mb-0 text-success">MODIFICATION D'UN SERVICE</h6>
             <div>Modifier le service en remplissant le formulaire avec des nouvelles information</div>
          </div>
       </div>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <hr>
    <div class="col-md-6">
        <a href="{{ route('admin.all_services')}}" class="btn btn-primary">Tous les services</a>
    </div>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <hr>
    <form class="" wire:submit.prevent="updateService">
       @csrf
       <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                  <div class="row mb-3">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Nom du service</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="name" value="" placeholder="nom du service" wire:model="name" wire:keyup="generateSlug" />
                          @error('name')<p class="text-danger">{{$message}}</p>@enderror                
                    </div>
                  </div>
                  <div class="row mb-3">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Slug</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" name="slug" class="form-control" value="" placeholder="slug" wire:model="slug" />
                          @error('slug')<p class="text-danger">{{$message}}</p>@enderror         
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Tag</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="tagline" class="form-control" value="" placeholder="tagline" wire:model="tagline" />
                        @error('tagline')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
 
                  <div class="row mb-3">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Categorie</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         <select class="form-select mb-3" aria-label="Default select example" wire:model="service_category_id">
                            <option selected>Choisir une categorie</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('service_category_id')<p class="text-danger">{{$message}}</p>@enderror              
                    </div>
                 </div>
                 
                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Description</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <textarea  cols="30" name="description" class="form-control" rows="5" wire:model="description"></textarea>
                        @error('description')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Inclus</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <textarea  cols="30" name="inclusion" class="form-control" rows="5" wire:model="inclusion"></textarea>
                        @error('inclusion')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                
                 
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Exclus</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <textarea  cols="30" name="exclusion" class="form-control" rows="5" wire:model="exclusion"></textarea>
                        @error('exclusion')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>

                 <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Prix</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <input type="text" name="price" class="form-control" id="" wire:model="price">
                        @error('price')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Rabais</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <input type="text" name="discount" class="form-control" id="" wire:model="discount">
                        @error('discount')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Type de rabais</h6>
                    </div>
                   
                    <div class="col-sm-9">
                        <select name="discount_type" id="" class="form-select" wire:model="discount_type">
                            <option value="">Choisir le type de rabais...</option>
                            <option value="fixed">Fixe</option>
                            <option value="percent">En Pourcentage</option>
                        </select>
                    @error('discount_type')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Publier</h6>
                    </div>
                    <div class="col-sm-9">
                        <select name="featured" id="" class="form-control" wire:model="featured">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Thumbnail</h6>
                    </div>
                    <div class="col-sm-9">
                        <input type="file" name="thumbnail" class="form-control-file" id="" wire:model="newthumbnail">
                        @error('newthumbnail')<p class="text-danger">{{$message}}</p>@enderror
                        @if($newthumbnail)
                            <img src="{{ $newthumbnail->temporaryUrl() }} " width="60" alt="" />
                        @else
                            <img src="{{ asset('images/services/thumbnails')}}/{{ $thumbnail}} " width="60" alt="" />
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                   <div class="col-sm-3">
                       <h6 class="mb-0">Image</h6>
                   </div>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control-file" id="" wire:model="newimage">
                        @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                        @if($newimage)
                            <img src="{{ $newimage->temporaryUrl() }} " width="60" alt="" />
                        @else
                            <img src="{{ asset('images/services')}}/{{ $image }} " width="60" alt="" />
                        
                        @endif
                    </div>
               </div>
 
                
                  <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9 text-secondary">
                        <button class="btn btn-success">Modifier le service</button>    
                    </div>
                  </div>
              </div>
          </div>
      </div>
   </form>
 
 </div>