@extends('layouts.principal')
@section('info')
    <div class="container">
        <hr>
        <div id="info" class="row">
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="text-center">
                    <picture>
                        <img src="{{$img}}" class="img-fluid img-thumbnail" alt="..." width="350" height="350">
                    </picture>
                </div>
            </div>
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="text-center">
                    <h2>Resumen de orden de compra</h2>
                </div>
                <hr>
                <h3>{{$product->product_name}}</h3>
                <h1 class="display-5">${{$product->product_price}}</h1>
                <h6>Detalles del Comprador:</h6>
                <form id="customer_info_form" action="{{ url('order/update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$order->id}}">
                    <div><strong>Nombre: </strong>{{$order->customer_name}}</div>
                    <input type="hidden" name="customer_name" value="{{$order->customer_name}}">
                    <div><strong>Correo: </strong>{{$order->customer_email}}</div>
                    <input type="hidden" name="customer_email" value="{{$order->customer_email}}">
                    <div><strong>Telefono: </strong>{{$order->customer_mobile}}</div>
                    <input type="hidden" name="customer_mobile" value="{{$order->customer_mobile}}">
                    <input type="hidden" name="product_name" value="{{$product->product_name}}">
                    <input type="hidden" name="product_price" value="{{$product->product_price}}">
                    <input type="hidden" name="sw" value="0">
                    <button class="btn btn-primary btn-submit" type="submit">Pagar</button>
                </form>
            </div>
        </div>
        <div id="info_order" class="row">
                
        </div>
    </div>
@endsection
