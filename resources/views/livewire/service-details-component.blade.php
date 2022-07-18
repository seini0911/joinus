<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>{{$service->name}}</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>{{$service->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{asset('img-theme/shp.png')}}" class="img-responsive" alt="{{$service->name}}">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 single-blog">
                            <div class="post-item">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="post-header">
                                            <div class="post-format-icon post-format-standard"
                                                style="margin-top: -10px;">
                                                <i class="fa fa-image"></i>
                                            </div>
                                            <div class="post-info-wrap">
                                                <h2 class="post-title"><a href="#" title="Post Format: Standard"
                                                        rel="bookmark">{{$service->name}}: {{$service->category->name}}</a></h2>
                                                <div class="post-meta" style="height: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="single-carousel">
                                            <div class="img-hover">
                                                <img src="{{asset('images/services')}}/{{$service->image}}" class="img-responsive" alt="{{$service->name}}" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            <h3>{{ $service->name }}</h3>
                                            <p>{{ $service->description }}</p>
                                            <h4>Inclus</h4>
                                            <ul class="list-styles">
                                                @foreach(explode("|",$service->inclusion) as $inclusion)
                                                    <li><i class="fa fa-plus"></i>{{ $inclusion }}.</li>
                                                @endforeach
                                            </ul>
                                            <h4>Exclus</h4>
                                            <ul class="list-styles">
                                                @foreach(explode("|",$service->exclusion) as $exclusion)
                                                    <li><i class="fa fa-plus"></i>{{ $exclusion }}.</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="post-content">
                                            @if($geoipInfo != null)
                                            {{$geoipInfo['country']}}
                                            @endif
                                            <h3 class="text-primary mb-2">Les Prestataires à proximité qui offrent ce service :</h3>
                                            <br>
                                            @if($sproviders !=null)
                                            @foreach($sproviders as $sprovider)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        @if($sprovider['image'] != null)
                                                            <img src="{{ asset('images/sproviders')}}/{{$sprovider['image']}}" alt="Admin" class="rounded-circle p-1" width="130">
                                                        @else
                                                            <img src="{{ asset('images/sproviders/default.jpg')}}" alt="Admin" class="rounded-circle p-1 " width="130">
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4><b>{{$sprovider['user']->name}}</b></h4>
                                                        <b>
                                                            <i> {{$sprovider['city']}} </i> : 
                                                            <i> {{$sprovider['service_location']}} </i>
                                                        </b>
                                                        
                                                        <p class="grey-text">
                                                            Apropos du prestataire <br>
                                                            @if($sprovider['about'] == null)
                                                                Aucune description n'est disponible pour ce prestataire
                                                            @else
                                                                {{$sprovider['about']}}
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <a href="{{route('home.service_svp_profile',['user_id'=>$sprovider['user_id'] ])}}" class="btn btn-primary">Consulter son profile</a>
                                                    </div>
                                                </div>
                                               <hr>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <aside class="widget" style="margin-top: 18px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Infos de commande</div>
                                    <div class="panel-body">
                                        <table class="table">
                                            <tr>
                                                <td style="border-top: none;">Prix</td>
                                                <td style="border-top: none;"><span>&#36;</span> {{ $service->price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Quantity</td>
                                                <td>/</td>
                                            </tr>
                                            @php 
                                            $total = $service->price;
                                            @endphp
                                            @if($service->discount)
                                                @if($service->discount_type=='fixed')
                                                    <tr>
                                                        <td>Rabais</td>
                                                        <td>{{$service->discount}} FCFA</td>
                                                    </tr>
                                                    @php $total -= $service->discount; @endphp
                                                @elseif($service->discount_type=='percent')
                                                    <tr>
                                                        <td>Rabais</td>
                                                        <td>{{$service->discount}} %</td>
                                                        @php $total = $total - ($total*$service->discount/100); @endphp
                                                    </tr>
                                                @endif
                                            @endif
                                            <tr>
                                                <td>Total</td>
                                                <td><span>&#36;</span>{{$total}} </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <form>                                                
                                            <input type="submit" class="btn btn-primary" name="submit"
                                                value=" Commander ce service">
                                        </form>
                                    </div>
                                </div>
                            </aside>
                            <aside>
                                <h3>Related Service</h3>
                                @if($r_service)
                                
                                <div class="col-md-12 col-sm-6 col-xs-12 bg-dark color-white padding-top-mini"
                                    style="max-width: 360px">
                                    <a href="{{ route('home.service_details',['service_slug'=>$r_service->slug]) }}">
                                        <div class="img-hover">
                                            <img src="{{asset('images/services/thumbnails')}}/{{$r_service->thumbnail}}" alt="{{$r_service->name}}"
                                                class="img-responsive">
                                        </div>
                                        <div class="info-gallery">
                                            <h3>
                                                {{$r_service->name}}
                                            </h3>
                                            <hr class="separator">
                                            <p>
                                                {{$r_service->name}}
                                            </p>
                                            <div class="content-btn"><a href="{{ route('home.service_details',['service_slug'=>$r_service->slug]) }}"
                                                    class="btn btn-warning">View Details</a></div>
                                            <div class="price"><span>&#36;</span><b>From</b>{{$r_service->price}}</div>
                                        </div>
                                    </a>
                                </div>
                                @else
                                Aucun autre service n'est lie a ceci
                                @endif
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </section>
</div>
