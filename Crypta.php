<?php

namespace vendor;

class Crypta {

	public static $encryptMethod	= 'AES-256-CBC';
	private static $secretKey		= array('ChaveSecreta',
											'BASTARDOSINGLORIOS',
											'4785699!@#$$$!',
											'BancosDoMundo',
											'Palmatoria',
											'a vingança nunca é plena. Mata a alma e envenena',
											'banana',
											'pluralidade das coisas',
											'internet das coisas',
											'frases sem sentido',
											'busca',
											'tangodown',
											'blitz',
											'secretachave',
											'paisdetodos',
											'brasil',
											'37727669',
											'160604102017',
											'AtaqueDDOS',
											'SQLInjection',
											'Anjos e demonios');
	private static $secretIV				= 'EsteDeveSerOIV';
	public static  function decrypt($string,$key,$time)
	{
		$output				= false;
		$method				= self::$encryptMethod;
		$secret_key			= self::$secretKey[$key];
		$secret_iv			= self::$secretIV;
		$key				= hash('md5', md5($secret_key.$time));
		$iv					= substr(hash('md5', md5($secret_iv.$time)), 0, 16);
		$output				= openssl_decrypt(base64_decode($string), $method,$key, 0, $iv);
		return $output;
	}

	public static function encrypt($string)
	{
		$output 			= false;
		$rand				= rand(0,(count(self::$secretKey)-1));
		$method				= self::$encryptMethod;
		$secret_key			= self::$secretKey[$rand];
		$secret_iv			= self::$secretIV;
		$time				= time();
		$iv					= substr(hash('md5', md5($secret_iv.$time)), 0, 16);
		$key				= hash('md5', md5($secret_key.$time));
		$output				= openssl_encrypt($string, $method, $key, 0, $iv);
		$output				= base64_encode($output);
		return array($output,$rand,$time);
	}
}
