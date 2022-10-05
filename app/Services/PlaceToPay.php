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
    	/*self::$url= "https://checkout-co.placetopay.dev/";
    	self::$login= "6dd490faf9cb87a9862245da41170ff2";
    	self::$secretKey= "024h1IlD";*/
    }
    
    public static function auth(){

    	self::initialize();

    	$seed= date('c');

    	$secretKey= self::$secretKey;

    	$nonce = rand();

    	$credentials = array (
    		'seed' 		=> $seed,
    		'login' 	=> self::$login,
    		'tranKey' 	=> base64_encode(sha1($nonce . $seed . env('SECRET_KEY_PLACE_TO_PAY'), true)),
    		'nonce' 	=> base64_encode($nonce),
    	);
    	return $credentials;
    }

    public static function getRequestInformation(Request $request, $referenceId){

    	self::auth();

    	$endpoint = self::$url.'api/session';
    	$returnURL= url('order/'.$referenceId);

    	$credentials = self::auth();
		$amount = array(
			'currency' => 'COP',
			'total' => $request->product_price,
		);

		$payment = array(
			"reference" => $referenceId,
			"description" => $request->product_name,
			"amount" => $amount,
			"allowPartial" => false,
		);

		$payload = array(
			"locale" => "es_CO",
			"auth" => $credentials,
			"payment" => $payment,
			"returnUrl" => $returnURL,
			"ipAddress" => '127.0.0.1',
			"userAgent" => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36',
		);
		$response = Http::post($endpoint, $payload);
        return $response->json();
		
    }

}
