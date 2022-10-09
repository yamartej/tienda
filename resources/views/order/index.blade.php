@extends('layouts.principal')
@section('info')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Productos</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row w-100">
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg" class="card-img-top" alt="...">
                    <hr>
                    <div class="card-body">
                        <p class="fs-1">$ 20,00</p>
                        <p class="fs-6">Lapiz Mongol # 2</p>
                        <form id="customer_info_form" action="{{ url('order/create')}}" method="POST">
                        @csrf
                            <input type="hidden" name="price" value="20">
                            <input type="hidden" name="producto" value="Lapiz Mongol # 2">
                            <input type="hidden" name="img" value="https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg">
                            <div class="text-center">
                                <button class="btn btn-primary btn-submit" type="submit">Comprar</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Producto #1.</p>
                        <a href="{{ url('order/create')}}" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Producto #1.</p>
                        <a href="{{ url('order/create')}}" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Producto #1.</p>
                        <a href="{{ url('order/create')}}" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection