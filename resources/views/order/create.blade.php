<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
            <a class="navbar-brand" href="{{ url('/') }}">Tienda XXX</a>
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
                    <h2>Registrar</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{ url('order/confirm')}}" method="POST">
                        @csrf
                        <label>Name</label>
                        <input type="text" name="customer_name" id="">
                        <br>
                        <label>Email</label>
                        <input type="text" name="customer_email" id="">
                        <br>
                        <label>Phone</label>
                        <input type="text" name="customer_movile" id="">
                        <br>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2>Info Producto</h2>
                    <div><strong>Producto: </strong> Producto XYZ</div>
                    <div><strong>Precio: </strong> $150,00</div>
                </div>
            </div>
            <div class="row">
                <div class="pull-right"> <a href="{{ url('order') }}">Go Back</a></div>
            </div>
        </div>
    </section>
</div>

