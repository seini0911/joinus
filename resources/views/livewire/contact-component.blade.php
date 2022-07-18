
<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Contactez-nous</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li>/</li>
                        <li>Contactez-nous</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{ asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="">
        </div>
        <div class="div">
            <div class="col-md-12">
                <!-- Map from googles map -->
                <div class="mapouter"><div class="gmap_canvas"><iframe width="1080" height="382" id="gmap_canvas" src="https://maps.google.com/maps?q=Ecole%20de%20postes%20yaound%C3%A9&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123 movies</a><br><style>.mapouter{position:relative;text-align:right;height:382px;width:1080px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:382px;width:1080px;}</style></div></div>

            </div>
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside>
                                <h4>Nos bureau</h4>
                                <address>
                                    <strong>JoinUS Services.</strong><br>
                                    <i class="fa fa-map-marker"></i><strong>Address: </strong>Yaounde<br>
                                    <i class="fa fa-phone"></i><strong>Tel: </strong> +237-691323656
                                </address>
                                <address>
                                    <strong>JoinUs Emails</strong><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:seiniabaya@gmail.com"> contact@joinus.com</a><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:seiniabaya@gmail.com"> support@joinus.com</a>
                                </address>
                            </aside>
                            <hr class="tall">
                        </div>
                        <div class="col-md-8">
                            <h3>Formulaire de contact </h3>
                            <p class="lead">
                            </p>
                                @if(Session::has('message'))
                                    <div class="alert alert-success">{{Session::get('message')}}</div>
                                @endif
                            <form id="contactform" class="form-theme" method="post" wire:submit.prevent="sendMessage">
                             
                                <input type="text" placeholder="Name" name="name" id="name" wire:model="name" required="">
                                @error('name') <p class="text-danger">{{$message}}</p>@enderror
                                
                               <input type="email" placeholder="Email" name="email" id="email" wire:model="email" required=""> 
                               @error('email') <p class="text-danger">{{$message}}</p>@enderror
                               
                               <input type="text" placeholder="Phone" name="phone" id="phone" wire:model="phone" required="">
                               @error('phone') <p class="text-danger">{{$message}}</p>@enderror
                                
                               <textarea placeholder="Your Message" name="message" id="message" wire:model="message" required=""></textarea>
                               @error('message') <p class="text-danger">{{$message}}</p> @enderror
                               
                               <input type="submit" name="Submit" value="Envoyer le message" class="btn btn-primary">
                            </form>
                            <div id="result"></div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter content_resalt border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>