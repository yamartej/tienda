@extends('layouts.principal')
@section('info')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Crear Orden de Servicio</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <form action="{{ url('order/confirm')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" required name="customer_name" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="text" class="form-control" required name="customer_email" placeholder="Correo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="text" class="form-control" required name="customer_mobile" placeholder="Telefono">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-outline-primary">Enviar</button>
                        <a type="button" href="{{ url('order') }}" class="btn btn-outline-danger">Cancelar</a>    
                    </div>
                    <input type="hidden" name="price" value="{{$price}}">
                    <input type="hidden" name="product" value="{{$product}}">
                    <input type="hidden" name="img" value="{{$img}}">
                </form>
            </div>
            <div class="col-lg-6 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="text-center alert alert-info">
                    <h2>Producto</h2>
                </div>
                <div class="text-center">
                    <picture>
                        <img src="{{$img}}" class="img-fluid img-thumbnail" width="350" height="350" alt="...">
                    </picture>
                </div>
                <div><strong>Producto: </strong> {{$product}}</div>
                <div><strong>Precio: </strong> $ {{$price}}</div>
            </div>
        </div>
    </div>
@endsection