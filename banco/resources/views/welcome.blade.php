<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/app.css">

</head>

<body>
    <div id="app">
        <!-- <i class="fas fa-hand-lizard"></i> -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" @click="menu = 0">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" @click="menu = 1">Features</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>

        <!-- Contenido -->
        @yield('contenido')
        

    </div>

    
    <script src="/js/jquery.min.js"></script>
    <script src="/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>