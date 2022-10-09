<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PlaceToPay {
    
    private static $url;
    private static $login;
    private static $secretKey;

    private static function initialize(){
    	self::$url= config('services.placetopay.url');
    	self::$login= config('services.placetopay.login');
    	self::$secretKey= config('services.placetopay.secretkey');
    }
    
    public static function auth(){

    	self::initialize();

    	$seed= date('c');

    	$secretKey= self::$secretKey;

    	$nonce = rand();
		
    	$credentials = array (
    		'login' 	=> self::$login,
			'tranKey' 	=> base64_encode(sha1( $nonce.$seed.$secretKey , true)),
			'nonce' 	=> base64_encode($nonce),
			'seed' 		=> $seed
    	);
    	return $credentials;
    }

    public static function getRequestInformation(Request $request){
		
		self::auth();

    	$credentials = self::auth();

		$endpoint = self::$url.'api/session';
		
		$returnURL= url('order/response/'.$request->id);
    	
		$amount = array(
			'currency' => 'COP',
			'total' => $request->product_price,
		);

		$payment = array(
			"reference" => $request->id,
			"description" => $request->product_name,
			'amount' => [
				'currency' => 'USD',
				'total' => $request->product_price,
			],
			"allowPartial" => false,
		);
		
		$price = array(
			"locale" => "es_CO",
			"auth" => $credentials,
			"payment" => $payment,
			"returnUrl" => $returnURL,
			"ipAddress" => '127.0.0.1',
			"userAgent" => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
			"expiration" => date('c', strtotime('+2 days'))
		);
		$response = Http::post($endpoint, $price);
		return $response->json();
		
	}

	public static function getInfoTransaction($id)
	{
		
		self::auth();

    	$credentials = self::auth();

		$endpoint = self::$url.'api/session/'.$id;
		
    	$response = Http::post($endpoint, [
			'auth' => $credentials
		]);
		
		return $response->json();
		
		
	}

}
