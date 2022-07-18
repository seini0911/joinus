<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_01_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Profile du Prestataire</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Contacter un prestataire</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="container">
            <div class="row" style="margin-top: -30px;">
                <div class="titles">
                    <h2><span>Profile</span> </h2>
                    <i class="fa fa-plane"></i>
                    <hr class="tall">
                </div>
            </div>
        </div>
        <div class="content_info" style="margin-top: -70px; padding-left:60px; margin-right:50px; padding-right:80px">
            <div class="row">
                <div class="col-md-2">
                    <div class="container " style="margin-top: 70px;">
                        @if($sprovider['image'] != null)
                            <img src="{{ asset('images/sproviders')}}/{{$sprovider['image']}}" alt="Admin" class="rounded-circle p-1" width="130">                           
                        @else
                            <img src="{{ asset('images/sproviders/default.jpg')}}" alt="Admin" class="rounded-circle p-1 " width="130">                            
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <b class="text-primary"><i>Information personnel du prestataire</i></b>
                    <hr>
                    @if($user != null)
                        <b>
                            Nom : {{$user['name']}}
                        <hr>
                        <span>Email : {{$user['email']}}</span>
                        <hr>
                        <span>Téléphone : <i class="text-danger">Information hidden for privacy and security issues</i>  </span>
                        <hr>
                        </b>
                    @endif
                </div>
                <div class="col-md-3">
                    <b class="text-success"><i>Apropos du prestataire</i></b>
                    <hr>
                    Description :
                        @if($sprovider['about'] != null)
                            {{$sprovider['about']}}
                            <hr>
                        @else
                            Aucune description fournit par le prestataire,
                            Contactez-nous pour avoir plus d'information sur ce prestataire
                        @endif
                        
                        <b>Lieu de travail :</b>
                        <span>
                            @if($sprovider['service_location'] != null)
                                <b class="text-info"> {{$sprovider['service_location']}}</b>
                            @else
                                Aucune information fournit par le prestataire pour cette section,
                                Contactez-nous pour avoir plus d'information sur ce prestataire
                            @endif
                        </span><br>
                        <b>Ville : </b>
                        @if($sprovider['city'] != null)
                            <b class="text-danger"> {{$sprovider['city']}}</b>
                        @else
                            Aucune ville n'as été renseignée
                        @endif

                </div>
                <div class="col-md-3">
                    <b class="text-danger"><i>Les réalisations </i></b>
                    <hr>
                       <div class="row">
                            @if($svp_realisation != null)
                            @foreach($svp_realisation as $realisation)
                                    <div class="col-md-3">
                                        @if($realisation->image != null)
                                            <img src="{{ asset('images/svprealisations')}}/{{$realisation->image}}" alt="Admin" class="rounded-circle p-1" width="130">                           
                                        @else
                                            <img src="{{ asset('images/svprealisations/default.png')}}" alt="Admin" class="rounded-circle p-1" width="130">                           
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                Aucune realisation fournit par le prestataire,
                                Contactez-nous pour avoir plus d'information sur ce prestataire
                            @endif
                       </div>
                    <hr>
                    
                    <b>Service : </b>
                    @if($svp_service['name'] != null)
                        <b class="text-success"> {{$svp_service['name']}}</b>
                    @endif
                    <b>Notation: </b>
                    <?php for($i = 0; $i<=4; $i++): ?>
                        <i class="fa fa-star" style="color: rgb(131, 131, 2)"></i>
                    <?php endfor; ?>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="container" style="margin-bottom:20px">
                    @if(Auth::user() == null)
                        <b><a href="{{ route('register') }}">Inscrivez-vous</a> ou <a href="{{ route('login') }}">connectez-vous</a> pour commander le service de ce prestataire</b>
                    @else
                        <div class="col-md-6">
                            <b class="text-info">Ecrire au prestataire pour un service</b>
                            @if(Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            @if($loggedUser !=null)
                                <form id="contactform" class="form-theme" method="post" wire:submit.prevent="sendMessage">
                                    <input type="text" placeholder="{{$loggedUser->name}}" name="customer_name" id="name" wire:model="customer_name"  required="">
                                    @error('customer_name') <p class="text-danger">{{$message}}</p>@enderror
                                    
                                    <input type="email" placeholder="{{$loggedUser->email}}" name="customer_email" id="email" wire:model="customer_email"  required=""> 
                                    @error('customer_email') <p class="text-danger">{{$message}}</p>@enderror
                                    
                                    <input type="text" placeholder="{{$loggedUser->phone}}" name="customer_phone" id="phone" wire:model="customer_phone" required="">
                                    @error('customer_phone') <p class="text-danger">{{$message}}</p>@enderror
                                    
                                    <textarea placeholder="Votre Message" name="customer_message" id="message" wire:model="customer_message" required=""></textarea>
                                    @error('customer_message') <p class="text-danger">{{$message}}</p>@enderror
                                    <input type="submit" name="Submit" value="Envoyer le message" class="btn btn-primary">
                                </form>
                            @endif
                        </div>
                        <div class=col-md-6>
                            <span>Voir les <a href="#">feedbacks</a> des prestataires a propos de vos demandes</span>
                            <hr>
                            <span>Consulter l'itinéraire de votre position à celle du prestataire en cliquant sur itinéraire</span><br>
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="400" height="382" id="gmap_canvas" src="https://maps.google.com/maps?q=Ecole%20de%20postes%20yaound%C3%A9&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123 movies</a><br><style>.mapouter{position:relative;text-align:right;height:382px;width:400px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:382px;width:400px;}</style></div></div>
                            
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>