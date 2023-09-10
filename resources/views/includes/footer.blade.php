<footer class="py-5 footer ">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-5 mb-3">
                <h5 class="text-white">Qui sommes-nous?</h5>
                <p> Le Bon Samaritain est une association qui vise à pratiquer la parole de Dieu en ayant pour
                    missions ... <a class="text-white text-decoration-underline" href="{{ url('about') }}">En savoir
                        plus</a>


            </div>
            <div class="col-6 col-md-2 mb-3">

                <h5 class="text-white">Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link text-white p-0">Accueil</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ url('about') }}" class="nav-link text-white p-0">A propos</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ url('projects') }}" class="nav-link text-white p-0">Nos
                            projets</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('blog') }}" class="nav-link text-white p-0">Blog</a>
                    </li>
                    <li class="nav-item mb-2"><a href="#contact" class="nav-link text-white p-0">Contact</a></li>
                </ul>
            </div>



            <!-- <div class="col-6 col-md-2 mb-3">
          <h5 class="text-white">FAQ</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
          </ul>
        </div> -->

            <div class="col-md-4 offset-md-1 mb-3">
                <form action="{{ url('newsletters') }}" method="POST">
                    @csrf
                    <h5 class="text-white">Inscrivez-vous à la newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Adresse email</label>
                        <input id="newsletter1" name="email" type="email" class="form-control"
                            placeholder="Adresse email" required>
                        <button class="btn btn-primary" type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2022 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex text-white">
                <div class="col-auto social-links">
                    <a href="https://www.facebook.com/Vision-Dynamik-104906801256391/?modal=admin_todo_tour"><i class='bx bxl-facebook'></i></a>
                    <a href="https://twitter.com/VDynamik"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.instagram.com/vision_dynamik/"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.youtube.com/channel/UCJITHlNEna0_Q86bA9eMQ5A?view_as=subscriber"><i class='bx bxl-youtube'></i></a>
          
                </div>


            </ul>
        </div>
        <div>
            <a class="text-white" href="{{ url('admin') }}">Dash</a>

        </div>
    </div>

</footer>
