@extends('layouts.principal')
@section('info')
    <div class="container">
        <div id="info" class="row">
            @foreach ($orders as $order)
                <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="text-center">
                        <picture>
                            <img src="{{$order->img_url}}" class="img-fluid img-thumbnail" alt="..." width="350" height="350">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="text-center">
                        <h2>Detalle</h2>
                    </div>
                    <hr>
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
                        <div><strong>Precio: </strong>${{$order->product_price}}</div>
                        <input type="hidden" name="product_price" value="{{$order->product_price}}">
                        @if ($order->status === 'APPROVED')
                            <a class="btn btn-primary" href="{{$url}}">{{$btn}}</a>
                        @elseif ($order->status === 'REJECTED')
                            <button class="btn btn-primary btn-submit" type="submit">{{$btn}}</button>
                        @elseif ($order->status === 'PENDING')
                            <button class="btn btn-primary btn-submit" type="submit">{{$btn}}</button>
                            <input type="hidden" name="sw" value="1">
                        @else
                            <input type="hidden" name="sw" value="0">
                        @endif
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection