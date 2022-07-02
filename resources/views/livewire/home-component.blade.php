<div>
    <section class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                @foreach($slides as $slide)
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="{{asset('images/slider')}}/{{$slide->image}}" alt="{{$slide->title}}" class="img-responsive" data-bgposition="center center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                @endforeach
            
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
        <div class="filter-title">
            <div class="title-header">
                <h2 style="color:rgba(14, 17, 71, 0.37);"><b>BIENVENUE</b></h2>
                <p class="lead">Vous êtes à la recherche d'un service en particulier ? </p>
            </div>
            <div class="filter-header">
                <form id="sform" action="{{route('searchService')}}" method="post">
                   @csrf
                    <input type="text" id="q" name="q" required="required" placeholder="Quel service recherchez-vous ?"
                        class="input-large typeahead" autocomplete="off">
                    <input type="submit" name="submit" value="Search">
                </form>
            </div>
        </div>
    </section>
    <section class="content-central">
        <div class="content_info content_resalt">
            <div class="container" style="margin-top: 40px;">
                <div class="row">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="sponsors" class="tooltip-hover">
                            @foreach($scategories as $scategory)
                                <li data-toggle="tooltip" title="" data-original-title="{{ $scategory->name }}"> 
                                    <a href="{{route('home.services_by_category',['category_slug'=>$scategory->slug])}}">
                                        <img src="{{asset('images/categories')}}/{{$scategory->image}}"alt="{{$scategory->name}}">
                                    </a>
                                </li>
                            @endforeach   
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="semiboxshadow text-center">
            <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="">
        </div>
        <div class="content_info">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <h2>Besoin d'aide <span> JoinUs </span> et choisi un service</h2>
                            <i class="fa fa-plane"></i>
                            <hr class="tall">
                        </div>
                    </div>
                    <div class="portfolioContainer" style="margin-top: -50px;">
                        @foreach($fservices as $fservice)
                        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids"
                            style="padding-right: 5px;padding-left: 5px;">
                            <a class="g-list" href="{{route('home.service_details',['service_slug'=>$fservice->slug])}}">
                                <div class="img-hover">
                                    <img src="{{asset('images/services/thumbnails')}}/{{$fservice->thumbnail}}" alt="{{$fservice->name}}"
                                        class="img-responsive">
                                </div>
                                <div class="info-gallery">
                                    <h3>{{$fservice->name}}</h3>
                                    <hr class="separator">
                                    <p>{{$fservice->tagline}}</p>
                                    <div class="content-btn"><a href="{{route('home.service_details',['service_slug'=>$fservice->slug])}}"
                                            class="btn btn-primary">Choisir un prestataire</a></div>
                                    <!-- <div class="price"><span>&#36;</span><b>From</b>{{$fservice->price}}</div>-->
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="content_info">
            <div class="bg-dark color-white border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="services-lines-info">
                                <h2>CATEGORIES DE SERVICES POPULAIRES</h2>
                                <p class="lead">
                                    Retrouvez parmi ces catégories des professionnels de confiance prêt à vous aider quelqu'en soit le service souhaité
                                    <span class="line"></span>
                                </p>
                                <p>Vous êtes fatigué de parler de vos prestations auprès des amis qui n'ont pas besoin 
                                    de vos compétences à l'immédiat ?, inscrivez-vous en tant que prestataire et on se charge du reste
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <ul class="services-lines">
                                @foreach($fcategories as $fcategory)
                                    <li>
                                        <a href="{{route('home.services_by_category',['category_slug'=>$fcategory->slug])}}">
                                            <div class="item-service-line">
                                                <i class="fa"><img class="icon-img"
                                                        src="{{asset('images/categories')}}/{{$fcategory->image}}"></i>
                                                <h5>{{$fcategory->name}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="titles">
                        <h2><span>Nos Partenaires</span> de Services</h2>
                        <i class="fa fa-plane"></i>
                        <hr class="tall">
                    </div>
                </div>
            </div>
            <div id="boxes-carousel">
                @foreach($aservices as $service)
                    <div>
                        <a class="g-list" href="{{route('home.service_details',['service_slug'=>$aservice->slug])}}">
                            <div class="img-hover">
                                <img src="{{asset('images/services/thumbnails')}}/{{$aservice->thumbnail}}" alt="" class="img-responsive">
                            </div>

                            <div class="info-gallery">
                                <h3>{{$aservice->name}}</h3>
                                <hr class="separator">
                                <p>{{$aservice->tagline}}</p>
                                <div class="content-btn"><a href="service-details/ac-wet-servicing.html"
                                        class="btn btn-primary">Book Now</a></div>
                                <div class="price"><span>&#36;</span><b>From</b>{{$aservice->price}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach 
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 me-auto text-center text-md-start mb-5 mb-md-0">
                <h2>Starts Publishing Your Apps</h2>
              </div>
              <div class="col-md-5 text-center text-md-end">
                <p><a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a> <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a></p>
              </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')

    <script type="text/javascript">
        var path = "{{route('autocomplete')}}";
        $('input.typeahead').typeahead({
            source : function(query,process){
                return $.get(path,{query:query},function(data){
                    return process(data);
                });
            }
        });
    </script>
@endpush
