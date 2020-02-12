<footer class="">

    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#"><img src="https://secteurprive.ma/assets/img/logo.png" alt="Logo Image"></a>
                     <p class="copyright">Bienvenu dans le Blog de Secteurprive.ma, première plateforme au Maroc des offres de marché privé B2B. Découvrez les actualités de secteurprive.ma</p> 
                  
                    {{-- <ul class="icons">
                        <li><a target="_blank" href="https://www.facebook.com/cip.fahim.me"><i class="ion-social-facebook-outline"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/CipFahim"><i class="ion-social-twitter-outline"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/cip.fahim/"><i class="ion-social-instagram-outline"></i></a></li>
                        <li><a target="_blank" href="https://www.youtube.com/programmingkit"><i class="ion-social-youtube-outline"></i></a></li>
                    </ul> --}}

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h3 style="font-size:20px" class="title"><b>Plan du Site</b></h3>
                        <li class="mb-2"><a href="https://secteurprive.ma/">Accueil</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/a-propos">A propos</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/comment-ca-marche">Comment ça marche</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/contact">Contact</a></li><br>

               
                 

                </div><!-- footer-section -->
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h3 style="font-size:20px" class="title"><b>Catégorie</b></h3>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li><br>
                        @endforeach
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">

                    <h3 style="font-size:20px" class="title"><b>Inscrivez vous à la newsletter</b></h3>
                    <em style="font-size: 12px;">Recevez les dernières nouveauté concernant Secteurprive.ma</em>
                    <div class="input-area">
                        <form method="POST" action="{{ route('subscriber.store') }}">
                            @csrf
                            <input class="email-input" name="email" type="email" placeholder="Entrez votre adresse mail">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
  
</footer>
<div style="background-color:#00050B;height:40px" class="">
    <div class="row ml-3">
        <div class="col-md-6 my-2">
            <p style="color:white;font-family: 'Montserrat', sans-serif;" class="text-center"> Copyright © 2019 secteurprive.ma All rights reserved.
            </p>
        </div>
        <div class="col-md-6 my-2">
            <p style="color:white;font-family: 'Montserrat', sans-serif;" class="text-center">Conception et développement par : <img style="width:55px" src="https://secteurprive.ma/assets/img/Koios_Agency_Logo.png" alt="">  </p>
        </div>
    </div>
</div>