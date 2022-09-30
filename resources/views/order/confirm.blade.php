<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<!------ Include the above in your HEAD tag ---------->

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/')}}">Tienda XXX</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<header id="page-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro-text">
                    <hr>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">
    <section class="primary" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Vista Confirmar Pedido</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <form action="{{ url('order/store')}}" method="POST">
                    @csrf
                    <div><strong>Nombre: </strong>{{$customer_name}}</div>
                    <input type="hidden" name="customer_name" value="{{$customer_name}}">
                    <div><strong>Correo: </strong>{{$customer_email}}</div>
                    <input type="hidden" name="customer_email" value="{{$customer_email}}">
                    <div><strong>Telefono: </strong>{{$customer_movile}}</div>
                    <input type="hidden" name="customer_movile" value="{{$customer_movile}}">
                    <div><strong>Producto: </strong>{{$product_name}}</div>
                    <input type="hidden" name="product_name" value="{{$product_name}}">
                    <div><strong>Precio: </strong>{{$product_price}}</div>
                    <input type="hidden" name="product_price" value="{{$product_price}}">
                    <input type="submit" value="Pagar">
                </form>
            </div>
        </div>
    </section>
</div>



