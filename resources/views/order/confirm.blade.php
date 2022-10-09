@extends('layouts.principal')
@section('info')
    <div class="container">
        <div id="titulo_pedido" class="row">
            <div class="col-lg-12 text-center">
                <h2>Confirmar Pedido</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div id="info" class="row">
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="text-center">
                    <picture>
                        <img src="https://image.shutterstock.com/image-illustration/brown-white-dog-red-hair-260nw-2206110745.jpg" class="img-fluid img-thumbnail" alt="...">
                    </picture>
                </div>
            </div>
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="text-center">
                    <h2>Detalles</h2>
                </div>
                <h3>Producto XYZ</h3>
                <h1 class="display-5">$150,00</h1>
                <h6>Detalles del Comprador:</h6>
                <form id="customer_info_form" action="{{ url('order/store')}}" method="POST">
                    @csrf
                    <div><strong>Nombre: </strong>{{$customer_name}}</div>
                    <input type="hidden" id="customer_name" name="customer_name" value="{{$customer_name}}">
                    <div><strong>Correo: </strong>{{$customer_email}}</div>
                    <input type="hidden" id="customer_email" name="customer_email" value="{{$customer_email}}">
                    <div><strong>Telefono: </strong>{{$customer_mobile}}</div>
                    <input type="hidden" id="customer_mobile" name="customer_mobile" value="{{$customer_mobile}}">
                    <input type="hidden" id="product_name" name="product_name" value="{{$product_name}}">
                    <input type="hidden" id="product_price" name="product_price" value="{{$product_price}}">
                    <button class="btn btn-primary btn-submit" type="submit">Comprar Ahora</button>
                </form>
            </div>
        </div>
        <div id="info_order" class="row">
                
        </div>
    </div>
@endsection
