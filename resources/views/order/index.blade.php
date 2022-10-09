@extends('layouts.principal')
@section('info')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Productos</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row w-100 ">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg" class="card-img-top" alt="...">
                    <hr>
                    <div class="card-body">
                        <p class="fs-1">$ 20,00</p>
                        <p class="fs-6">Lapiz Mongol # 2</p>
                        <form id="customer_info_form" action="{{ url('order/create')}}" method="POST">
                        @csrf
                            <input type="hidden" name="price" value="20">
                            <input type="hidden" name="product" value="Lapiz Mongol # 2">
                            <input type="hidden" name="img" value="https://totalcleanpanama.com/wp-content/uploads/2021/01/ofc-lapiz-momgol.jpg">
                            <div class="text-center">
                                <button class="btn btn-primary btn-submit" type="submit">Comprar</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw-Mc0t4nyhb0mzeHqndlOJoS6YaU3ehIS3w&usqp=CAU" class="card-img-top" alt="...">
                    <hr>
                    <div class="card-body">
                        <p class="fs-1">$ 15,00</p>
                        <p class="fs-6">Borrador Blanco</p>
                        <form id="customer_info_form" action="{{ url('order/create')}}" method="POST">
                        @csrf
                            <input type="hidden" name="price" value="15">
                            <input type="hidden" name="product" value="Borrador Blanco">
                            <input type="hidden" name="img" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSw-Mc0t4nyhb0mzeHqndlOJoS6YaU3ehIS3w&usqp=CAU">
                            <div class="text-center">
                                <button class="btn btn-primary btn-submit" type="submit">Comprar</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="https://unionpapelera.com.mx/pub/media/catalog/product/cache/74c1057f7991b4edb2bc7bdaa94de933/1/8/18788_1.jpg" class="card-img-top" alt="...">
                    <hr>
                    <div class="card-body">
                        <p class="fs-1">$ 8,50</p>
                        <p class="fs-6">Sacapuntas Plastico</p>
                        <form id="customer_info_form" action="{{ url('order/create')}}" method="POST">
                        @csrf
                            <input type="hidden" name="price" value="8.50">
                            <input type="hidden" name="product" value="Sacapuntas Plastico">
                            <input type="hidden" name="img" value="https://unionpapelera.com.mx/pub/media/catalog/product/cache/74c1057f7991b4edb2bc7bdaa94de933/1/8/18788_1.jpg">
                            <div class="text-center">
                                <button class="btn btn-primary btn-submit" type="submit">Comprar</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection