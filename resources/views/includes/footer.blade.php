<footer class="py-5 footer ">
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-6 mb-3">
                <img style="object-fit:contain; height:55px" src="{{ asset('images/logo2.png') }}" alt="" srcset="">
                <p class="text-dark mt-3"> A l’’Hôtel Chic Palace, c’est le confort, la sérénité et la sécurité !
                    <a class="text-dark text-decoration-underline" href="{{ url('about') }}">En savoir
                        plus</a>


            </div>

            <div class="col-6 col-md-3 mb-3">

                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('/') }}" class="nav-link p-0">Accueil</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ url('about') }}" class="nav-link p-0">A propos</a>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ url('projects') }}" class="nav-link p-0">Nos
                            projets</a></li>
                    <li class="nav-item mb-2"><a href="{{ url('blog') }}" class="nav-link p-0">Blog</a>
                    </li>
                    <li class="nav-item mb-2"><a href="mailto:hotelchicpalace@gmail.com" class="nav-link p-0">Contact</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-3 mb-3">

                <h5>Contact</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a class="nav-link p-0">Tel: +228 9168 3333 / 9832 3333 </a>
                    </li>
                    <li class="nav-item mb-2"><a class="nav-link p-0">Tel 2: +228 9168 7777 / 9836 7777 </a>
                    </li>
                    <li class="nav-item mb-2"><a href="mailto:hotelchicpalace@gmail.com" class="nav-link p-0">Email: hotelchicpalace@gmail.com</a></li>
                    <li class="nav-item mb-2"><a href="mailto:hotelchicpalace@gmail.com" class="nav-link p-0">Réserver</a></li>
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

            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2023 Insight, Inc. Tout droit réservé.</p>
            <ul class="list-unstyled d-flex text-white">
                {{-- <div class="col-auto social-links">
                    <a target="_blank" href="https://www.facebook.com/Vision-Dynamik-104906801256391/?modal=admin_todo_tour"><i class='bx bxl-facebook'></i></a>
                    <a target="_blank" href="https://twitter.com/VDynamik"><i class='bx bxl-twitter'></i></a>
                    <a target="_blank" href="https://www.instagram.com/vision_dynamik/"><i class='bx bxl-instagram'></i></a>
                    <a target="_blank" href="https://www.youtube.com/channel/UCJITHlNEna0_Q86bA9eMQ5A?view_as=subscriber"><i class='bx bxl-youtube'></i></a>

                </div> --}}


            </ul>
        </div>
        <div>
            <a class="text-white" href="{{ url('admin') }}">Dash</a>

        </div>
    </div>

</footer>
