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
                <h1>Services  de: {{$category_name}}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>{{$category_name}}</li>
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
                                        <div class="col-md-6">{{$category_name}}services</div>
                                        <div class="col-md-6">
                                            <a href="#" class="btn btn-info pull-right">Ajouter</a>
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
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Statut</th>
                                            <th>Catégorie</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                            <tr>
                                                <td>{{ $service->id }}</td>
                                                <td><img src="{{ asset('images/services/thumbnails')}}/{{ $service->thumbnail }}" class="" width="60" alt=""/> </td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->price }}</td>
                                                <td>
                                                    @if($service->status)
                                                        Actif
                                                    @else
                                                        Inactif
                                                    @endif
                                                </td>
                                                <td>{{ $service->category->name }}</td>
                                                <td>{{ $service->created_at }}</td>
                                                <td>
                                                    <a href="#"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                    <a href="#" style="margin-left: 10px;"><i class="fa fa-trash fa-2x text-danger"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
