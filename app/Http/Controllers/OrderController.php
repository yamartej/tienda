<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\PlaceToPay;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index');
    }

    public function list()
    {
        $orders = Order::all();
        //dd($orders);
        return view('order.list',["orders"=>$orders]);
        //return response()->json($orders);
        //return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$credentials = PlaceToPay::getCredentials();
        //dd($credentials);
        return view('order.create');    
    }

    public function confirm(Request $request)
    {
        //$orders = request()->all();
        $data = [
            'customer_name' => $request->input('customer_name'),
            'customer_email' =>$request->input('customer_email'),
            'customer_movile' => $request->input('customer_movile'),
            'product_name' => "Producto XYZ",
            'product_price' => "$150,00"
        ];
        return response()
            ->view('order.confirm', $data, 200);
        
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $data = request()->all();
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->customer_movile = $request->input('customer_movile');
        $order->status = 'CREATED';
        $order->save();
        $response = PlaceToPay::createRequest($request, $order->id);
        dd($response);
        /*return response()
            ->view('order.confirm', $data, 200);*/
        //return response()->json($order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
