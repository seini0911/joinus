<div class="page-content">
   
    <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2">
       <div class="d-flex align-items-center">
          <div class="font-35 text-primary"><i class='bx bx-bookmark-heart'></i>
          </div>
          <div class="ms-3">
             <h6 class="mb-0 text-primary">CATEGORIES</h6>
             <div>CREATION D'UNE NOUVELLE CATEGORIE</div>
          </div>
       </div>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <button class="btn btn-success"><a href="{{ route('admin.service_categories') }}" class="text-white">Toutes les catégories</a> </button>
    <hr>
  
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    
    <form class="" wire:submit.prevent="createNewCategory">
       @csrf
       <div class="col-lg-12">
          <div class="card">
              <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Nom de la categorie</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="name" class="form-control" value="" placeholder="Entrer le nom de la catégorie" wire:model="name" wire:keyup="generateSlug" />
                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                  <div class="row mb-3">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Slug</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" name="slug" class="form-control" value="" placeholder="slug" wire:model="slug"/>
                          @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                  </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Image</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" name="image"  class="form-control" wire:model="image"/>
                                @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                @if($image)
                                    <img src="{{ $image->temporaryUrl() }} " width="60" alt="" />
                                @endif
                        </div>
                    </div>
                  <div class="row">
                      <div class="col-sm-3"></div>
                      <div class="col-sm-9 text-secondary">
                          <button class="btn btn-primary px-4">Enregistrer</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
   </form>
 
 </div>