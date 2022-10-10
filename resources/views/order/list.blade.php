@extends('layouts.principal')
@section('info')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Lista</h2>
            <hr class="star-primary">
        </div>
    </div>
    <div class="row">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td scope="row">{{ $order->id }} </td>
                            <td>{{ $order->customer_name }} </td>
                            <td>{{ $order->customer_email }} </td>
                            <td>{{ $order->customer_mobile }} </td>
                            <td>{{ $order->created_at }} </td>    
                            @if ($order->status === 'APPROVED')
                                <td class="alert-success">{{ $order->status }}</td>
                            @elseif ($order->status === 'PENDING')
                                <td class="alert-warning">{{ $order->status }}</td>
                            @else
                                <td class="alert-danger">{{ $order->status }}</td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

@endsection