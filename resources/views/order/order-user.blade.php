@extends('layouts.principal')
@section('info')
    <div class="container">
        <hr>
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
                    <h2>Resumen de orden de compra</h2>
                </div>
                <h3>Producto XYZ</h3>
                <h1 class="display-5">$150,00</h1>
                <h6>Detalles del Comprador:</h6>
                <form id="customer_info_form" action="{{ url('order/update')}}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$order->id}}">
                    <div><strong>Nombre: </strong>{{$order->customer_name}}</div>
                    <input type="hidden" id="customer_name" name="customer_name" value="{{$order->customer_name}}">
                    <div><strong>Correo: </strong>{{$order->customer_email}}</div>
                    <input type="hidden" id="customer_email" name="customer_email" value="{{$order->customer_email}}">
                    <div><strong>Telefono: </strong>{{$order->customer_mobile}}</div>
                    <input type="hidden" id="customer_mobile" name="customer_mobile" value="{{$order->customer_mobile}}">
                    <div><strong>Producto: </strong>{{$product->product_name}}</div>
                    <input type="hidden" id="product_name" name="product_name" value="{{$product->product_name}}">
                    <div><strong>Precio: </strong>{{$product->product_price}}</div>
                    <input type="hidden" id="product_price" name="product_price" value="150">
                    <button class="btn btn-primary btn-submit" type="submit">Pagar</button>
                </form>
            </div>
        </div>
        <div id="info_order" class="row">
                
        </div>
    </div>
@endsection
