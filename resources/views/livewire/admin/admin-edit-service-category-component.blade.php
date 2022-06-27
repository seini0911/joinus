<div class="page-content">
  
        <div class="alert border-0 border-start border-5 border-primary alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
               <div class="font-35 text-primary"><i class='bx bx-bookmark-heart'></i>
               </div>
               <div class="ms-3">
                  <h6 class="mb-0 text-primary">MODIFICATION D'UNE CATEGORIE</h6>
               </div>
               <hr>
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <form class="" wire:submit.prevent="updateServiceCategory">
            @csrf
            <div class="col-lg-12">
               <div class="card">
                   <div class="card-body">
                       <div class="row mb-3">
                           <div class="col-sm-3">
                               <h6 class="mb-0">Nom de la categorie</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                                <input type="text" name="name" class="form-control" id="" wire:model="name" wire:keyup="generateSlug">
                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                             </div>
                       </div>
                       <div class="row mb-3">
                           <div class="col-sm-3">
                               <h6 class="mb-0">Slug</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                                <input type="text" name="slug" class="form-control" id="" wire:model="slug">
                                @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                            </div>
                       </div>
                       <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Image</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="file" name="image" class="form-control-file" id="" wire:model="newimage">
                                @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                                @if($newimage)
                                    <img src="{{ $newimage->temporaryUrl() }} " width="60" alt="" />
                                @else
                                    <img src="{{ asset('images/categories')}}/{{ $image }} " width="60" alt="" />
                                @endif
                            </div>
                       </div>
                       <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Publier</h6>
                            </div>
                            <div class="col-sm-9">
                                <select name="featured" id="" class="form-select mb-3" wire:model="featured">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <button class="btn btn-primary px-4" type="submit">Mettre à jour</button>
                        </div>
                    </div>
                    <br>
                   </div>
               </div>
           </div>
        </form>
</div>