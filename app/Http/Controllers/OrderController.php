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
	private static $url;
    private static $login;
    private static $secretKey;

    private static function initialize(){
    	self::$url= config('services.placetopay.url');
    	self::$login= config('services.placetopay.login');
    	self::$secretKey= config('services.placetopay.secretkey');
    	/*self::$url= "https://checkout-co.placetopay.dev/";
    	self::$login= "6dd490faf9cb87a9862245da41170ff2";
    	self::$secretKey= "024h1IlD";*/
    }

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
    public function create()
    {
        return view('order.create');    
    }

    public function confirm(Request $request)
    {
		$order = [
            'customer_name' => $request->input('customer_name'),
            'customer_email' =>$request->input('customer_email'),
            'customer_mobile' => $request->input('customer_mobile'),
            'product_name' => "Producto XYZ",
            'product_price' => "$150,00",
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
				'order'=> $order, 
				'product'=>$product
			], 200);
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
    public function update(Request $request)
    {
        $response = PlaceToPay::getRequestInformation($request);
		//dd($response);
		if($response['status']['status']== "OK"){
			//dd($request->id);
			Order::where('id', $request->id)
			->update([
				'request_id' => $response["requestId"],
				'url' => $response["processUrl"]
			]);
			return redirect()->away($response["processUrl"]);
		}
        
        return response()->json([
            'status'    => $status,
			'message'   => $message,
			'date'    	=> $date
		]);
        
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

	
    public function response($orderid)
    {
        $order = Order::find($orderid);
		$response = PlaceToPay::getInfoTransaction($order->request_id);
		dd($response);
		$status = $response['status']['status'];
		$message = $response['status']['message'];
		Order::where('id', $orderid)
			->update([
				'status' => $status]);

		
		$order = DB::table('orders')
            ->join('products', 'orders.id', '=', 'products.order_id')
            ->select('orders.*', 'products.product_name', 'products.product_price')
			->where('orders.id', '=', $orderid)
            ->get();
		switch($status) {
			case('APPROVED'):

				$url =  url('/order');
				$message = $message;
				$btn = 'Finalizar';

				break;
		 
			case('PENDING'):

				$url =  url('/order');
				$message = $message;
				$btn = 'Finalizar';
			
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
