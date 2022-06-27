<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Nouveau service</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Nouveau service</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-8 col-md-offset-2 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Ajout d'un nouveau service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.all_services')}}" class="btn btn-info pull-right">Tous les services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if(Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="createNewService">
                                        @csrf
                                        <!-- name -->
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">
                                                Nom:
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="" wire:model="name" wire:keyup="generateSlug">
                                                @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- slug -->
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-3">
                                                slug :
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="slug" class="form-control" id="" wire:model="slug">
                                                @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- tagline -->
                                        <div class="form-group">
                                            <label for="tagline" class="control-label col-sm-3">
                                                Tagline:
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="tagline" class="form-control" id="" wire:model="tagline">
                                                @error('tagline')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- category -->
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-3">
                                                Catégorie de service :
                                            </label>
                                            <div class="col-sm-9">
                                                <select name="service_category_id" id="" class="form-control" wire:model="service_category_id">
                                                    <option value="">Choisir une categorie...</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('service_category_id')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- price -->
                                        <div class="form-group">
                                            <label for="price" class="control-label col-sm-3">
                                                Prix:
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="price" class="form-control" id="" wire:model="price">
                                                @error('price')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- discount  -->
                                        <div class="form-group">
                                            <label for="discount" class="control-label col-sm-3">
                                                Rabais :
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="discount" class="form-control" id="" wire:model="discount">
                                                @error('discount')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- discount_type  -->
                                        <div class="form-group">
                                            <label for="discount_type" class="control-label col-sm-3">
                                            Type de Rabais :
                                            </label>
                                            <div class="col-sm-9">
                                                <select name="discount_type" id="" class="form-control" wire:model="discount_type">
                                                    <option value="">Choisir le type de rabais...</option>
                                                    <option value="fixed">Fixe</option>
                                                    <option value="percent">En Pourcentage</option>
                                                </select>
                                            @error('discount_type')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- description -->
                                        <div class="form-group">
                                            <label for="description" class="control-label col-sm-3">
                                                Description :
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea  cols="30" name="description" class="form-control" rows="5" wire:model="description"></textarea>
                                                @error('description')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- inclusion -->
                                        <div class="form-group">
                                            <label for="inclusion" class="control-label col-sm-3">
                                                Inclus :
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea  cols="30" name="inclusion" class="form-control" rows="5" wire:model="inclusion"></textarea>
                                                @error('inclusion')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- exclusion -->
                                        <div class="form-group">
                                            <label for="exlusion" class="control-label col-sm-3">
                                                Exclus :
                                            </label>
                                            <div class="col-sm-9">
                                                <textarea  cols="30" name="exclusion" class="form-control" rows="5" wire:model="exclusion"></textarea>
                                                @error('exclusion')<p class="text-danger">{{$message}}</p>@enderror
                                            </div>
                                        </div>
                                        <!-- thumbnail -->
                                        <div class="form-group">
                                            <label for="thumbnail" class="control-label col-sm-3">
                                                Thumbnail:
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="thumbnail" class="form-control-file" id="" wire:model="thumbnail">
                                                @error('thumbnail')<p class="text-danger">{{$message}}</p>@enderror
                                                @if($thumbnail)
                                                <img src="{{ $thumbnail->temporaryUrl() }} " width="60" alt="" />
                                                @endif
                                            </div>
                                        </div>
                                        <!-- image -->
                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-3">
                                                Image :
                                            </label>
                                            <div class="col-sm-9">
                                                <input type="file" name="image" class="form-control-file" id="" wire:model="image">
                                                @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                                @if($image)
                                                <img src="{{ $image->temporaryUrl() }} " width="60" alt="" />
                                                @endif
                                            </div>
                                        </div>
                                        <button class="btn btn-success pull-right">Ajouter le service</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
