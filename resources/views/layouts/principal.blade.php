<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>La Tiendita</title>
  </head>
  <body>
    <div id="app">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #dc3545;">
            
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/')}}"><strong>La Tiendita</strong> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <router-link to="/order" class="nav-link" exact>Tienda </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="/order/list" class="nav-link" exact>Lista de Ordenes </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <router-view></router-view>
    </div>
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>