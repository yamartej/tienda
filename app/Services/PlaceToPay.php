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
    
    public static function getCredentials(){

    	self::initialize();

    	$seed= gmdate('c');

    	$secretKey= self::$secretKey;

    	if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }

    	//$nonce = bin2hex(random_bytes(16));

    	//$tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));

    	//$nonceBase64 = base64_encode($nonce);
    	
    	
    	$credentials = array (
    		'seed' 		=> $seed,
    		'login' 	=> self::$login,
    		'tranKey' 	=> base64_encode(sha1($nonce . $seed . env('SECRET_KEY_PLACE_TO_PAY'), true)),
    		'nonce' 	=> base64_encode($nonce),
    	);
    	return $credentials;
    }

    public static function createRequest(Request $request, $referenceId){

    	self::initialize();

    	$endpoint = self::$url.'api/session';
    	$returnURL= url('order/'.$referenceId);

    	$credentials = self::getCredentials();
		//dd($credentials);

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
