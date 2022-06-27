<div>
    <style>
        nav svg {
            height: 20px;
        }    
        nav .hidden{
            display: block !important;
        }
    </style>
    
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Toutes les bannieres</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Toutes les bannieres</li>
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
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">Toutes les bannieres</div>
                                        <div class="col-md-6">
                                            <a href="{{route('admin.add_slide')}}" class="btn btn-info pull-right">Ajouter une nouvelle banniere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message')}}
                                    </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Titre</th>
                                            <th>Statut</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($slides as $slide)
                                            <tr>
                                                <td>{{ $slide->id }}</td>
                                                <td><img src="{{ asset('images/slider')}}/{{ $slide->image }}" class="" width="60" alt=""/> </td>
                                                <td>{{ $slide->title }}</td>
                                                <td>
                                                    @if($slide->status)
                                                        Actif
                                                    @else
                                                        Inactif
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($slide->featured)
                                                        Oui
                                                    @else
                                                        Non
                                                    @endif 
                                                </td>
                                                <td>{{ $slide->created_at }}</td>
                                                <td>
                                                    <a href="{{route('admin.edit_slide',['slide_id'=>$slide->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                    <a href="#" onclick="confirm('Êtes vous sûr de vouloir supprimer cette banniere ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{$slide->id}})" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $slides->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
