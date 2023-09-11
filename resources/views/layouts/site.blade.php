<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset(Voyager::image(setting('site.icon_image'))) }}" type="image/x-icon">

    <meta name="description" content="{{ setting('site.description') }}">

    <title>{{ setting('site.title') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    @include('includes.header')

    @yield('content')






    {{-- @include('includes.partner') --}}
    @if ($errors->has('email'))
    <div class="alert alert-danger">
        {{ $errors->first('email') }}
    </div>
    @endif
    <section id="newsletter">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h3 class="text-white">Inscrivez-vous à la newsletter</h3>
                    <p class="text-white">Recevez des infos nous concernant s.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <form action="{{ url('newsletters') }}" method="POST">
                        @csrf

                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Adresse email</label>
                            <input id="newsletter1" name="email" type="email" class="newsletter-input" placeholder="Adresse email" required>
                            <button class="btn btn-dark" type="submit">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!-- Ajoutez davantage de div.gallery-item pour plus de photos -->
    </section>
    @include('includes.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/all.min.css') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>
</body>

</html>
