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
                    <h2>Detalle de Compra</h2>
                </div>
                <hr>
                @foreach ($orders as $order)
                    <div>
                        <h3>Estatus de la compra:</h3>
                        @if ($order->status === 'APPROVED')
                            <div class="alert alert-success" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @elseif ($order->status === 'REJECTED')
                            <div class="alert alert-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @elseif ($order->status === 'PENDING')
                            <div class="alert alert-warning" role="alert">
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                        
                        
                    </div>
                    <hr>
                    <form id="customer_info_form" action="{{$url}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <div><strong>Nombre: </strong>{{$order->customer_name}}</div>
                        <input type="hidden" name="customer_name" value="{{$order->customer_name}}">
                        <div><strong>Correo: </strong>{{$order->customer_email}}</div>
                        <input type="hidden" name="customer_email" value="{{$order->customer_email}}">
                        <div><strong>Telefono: </strong>{{$order->customer_mobile}}</div>
                        <input type="hidden" name="customer_mobile" value="{{$order->customer_mobile}}">
                        <div><strong>Producto: </strong>{{$order->product_name}}</div>
                        <input type="hidden" name="product_name" value="{{$order->product_name}}">
                        <div><strong>Precio: </strong>{{$order->product_price}}</div>
                        <input type="hidden" name="product_price" value="{{$order->product_price}}">
                        @if ($order->status === 'APPROVED')
                            <a class="btn btn-primary" href="{{$url}}">{{$btn}}</a>
                        @elseif ($order->status === 'REJECTED')
                            <button class="btn btn-primary btn-submit" type="submit">{{$btn}}</button>
                            <a class="btn btn-primary" href="{{ url('order')}}">Finalizar</a>
                        @endif
                    </form>
                @endforeach
            </div>
        </div>
        <div id="info_order" class="row">
                
        </div>
    </div>
@endsection
