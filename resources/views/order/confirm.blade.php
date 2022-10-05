@extends('layouts.principal')
@section('info')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Confirmar Pedido</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
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
                @isset($status)
                    @if ($status === 'APPROVED')
                        <div class="text-center alert alert-success">
                            <h2>APPROVED</h2>
                        </div>
                    @elseif ($status === 'REJECTED')
                        <div class="text-center alert alert-danger">
                            <h2>REJECTED</h2>
                        </div>
                        @elseif ($status === 'PENDING')
                        <div class="text-center alert alert-warning">
                            <h2>PENDING</h2>
                        </div>
                    @endif                    
                @endisset
                <h3>Producto XYZ</h3>
                <h1 class="display-5">$150,00</h1>
                <h6>Detalles del Comprador:</h6>
                <form action="{{ url('order/store')}}" method="POST">
                    @csrf
                    <div><strong>Nombre: </strong>{{$customer_name}}</div>
                    <input type="hidden" name="customer_name" value="{{$customer_name}}">
                    <div><strong>Correo: </strong>{{$customer_email}}</div>
                    <input type="hidden" name="customer_email" value="{{$customer_email}}">
                    <div><strong>Telefono: </strong>{{$customer_mobile}}</div>
                    <input type="hidden" name="customer_mobile" value="{{$customer_mobile}}">
                    <input type="hidden" name="product_name" value="{{$product_name}}">
                    <input type="hidden" name="product_price" value="{{$product_price}}">
                    <div class="d-grid gap-2">
                        @if(isset($status))
                            @if ($status === 'REJECTED')
                                <button type="submit" class="btn btn-primary" type="button">Reintentar</button>
                            @endif
                        @else
                            <button type="submit" class="btn btn-primary" type="button">Comprar Ahora</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection