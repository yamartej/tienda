<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Services\PlaceToPay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
		return view('order.list', ["orders" => $orders] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $product = [
            'product' => $request->product,
            'price' => $request->price,
            'img' => $request->img
        ];
        return response()
            ->view('order.create', $product, 200);    
    }


    public function confirm(Request $request)
    {
		$order = [
            'customer_name' => $request->input('customer_name'),
            'customer_email' =>$request->input('customer_email'),
            'customer_mobile' => $request->input('customer_mobile'),
            'product_name' => $request->input('product'),
            'product_price' => $request->input('price'),
            'img' => $request->input('img'),
        ];

        return response()
            ->view('order.confirm', $order, 200);
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
        
		$img = $request->img;
        /***GUARDAMOS EN LA TABLA DE ORDEN */
		$order->customer_name = $request->customer_name;
        $order->customer_email = $request->customer_email;
        $order->customer_mobile = $request->customer_mobile;
        $order->status = "CREATED";
        $order->save();

		/****GUARDAMOS EN LA TABLA PRODUCT */
		$product = new Product;
		$product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->order_id = $order->id;
        $product->save();
		return response()
            ->view('order.order-user', [
				'order'     =>  $order, 
				'product'   =>  $product,
                'img'       =>  $img
			], 200);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //$request->sw = 0: inidca que no es una transacción Pendiente
        if($request->sw == 0){
            $response = PlaceToPay::getRequestInformation($request);
            if($response['status']['status']== "OK"){
                Order::where('id', $request->id)
                ->update([
                    'request_id' => $response["requestId"],
                    'url' => $response["processUrl"]
                ]);
                return redirect()->away($response["processUrl"]);
            }
        }
        //$request->sw = 1: inidca que es una transacción Pendiente
        else{
            $order = Order::find($request->id);
            return redirect()->away($order->url);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $response = DB::table('orders')->where('id', '=', $request->id)->delete();
        if ($response == 1){
            return redirect()->route('order.index');
        }
        return redirect()->away('order/index');
    }

	
    public function response($orderid)
    {
        $order = Order::find($orderid);
		$response = PlaceToPay::getInfoTransaction($order->request_id);
		$status = $response['status']['status'];
		$message = $response['status']['message'];
		Order::where('id', $orderid)
			->update([
				'status' => $status]);

		
		$order = json_decode(DB::table('orders')
            ->join('products', 'orders.id', '=', 'products.order_id')
            ->select('orders.*', 'products.product_name', 'products.product_price')
			->where('orders.id', '=', $orderid)
            ->get());
        
        switch($status) {
			case('APPROVED'):

				$url =  url('/order');
				$message = $message;
				$btn = 'Finalizar';

				break;
		 
			case('PENDING'):

				$url =  url('order/update');
				$message = $message;
				$btn = 'Continuar Pago';
                $url_api = $order[0]->url;
			
				break;
		 
			case('REJECTED'):

				$url =  url('order/update');
				$message = $message;
				$btn = 'Reintentar';
			
				break;
		}
		return Response::view('order.response', [
			'orders'=> $order,
			'url' => $url,
			'message' => $message,
			'btn' => $btn
		]);
	}
}
