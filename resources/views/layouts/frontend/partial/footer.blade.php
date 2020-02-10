<footer>

    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">

                    <a class="logo" href="#"><img src="https://secteurprive.ma/assets/img/logo.png" alt="Logo Image"></a>
                     <p class="copyright">Secteurprive.ma - la première plateforme au Maroc des offres B2B, marchés privés et communication entre entreprises.</p> 
                  
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
                    <h4 class="title"><b>Plan de Site</b></h4>
                        <li class="mb-2"><a href="https://secteurprive.ma/">Acceuil</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/a-propos">A propos</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/comment-ca-marche">Comment ça marche</a></li><br>
                        <li class="mb-2"><a href="https://secteurprive.ma/contact">Contact</a></li><br>

               
                 

                </div><!-- footer-section -->
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">
                    <h4 class="title"><b>CATAGORIES</b></h4>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.posts',$category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-3 col-md-6">
                <div class="footer-section">

                    <h4 class="title"><b>SUBSCRIBE</b></h4>
                    <div class="input-area">
                        <form method="POST" action="{{ route('subscriber.store') }}">
                            @csrf
                            <input class="email-input" name="email" type="email" placeholder="Enter your email">
                            <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
                        </form>
                    </div>

                </div><!-- footer-section -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>