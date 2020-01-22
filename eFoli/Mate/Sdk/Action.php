<?php

/*
-     Project       :   api.inkybay.com
-     Purpose       :   Action Sdk on eFoli Mate
-
-     Code ID       :   EFLP04-10000001
-
-     Create Date   :   2020-01-09 10:13:29
-     Modify Date   :   2020-01-22 17:35:29
-
-     Author        :   Pran Krishna Paul - pran.me, Pran Krishna Paul - pran.me, eFoli
-     Last Modifier :   Pran Krishna Paul - pran.me
-     Editor        :   Pran Krishna Paul - pran.me
-
-     This code is CONFIDENTIAL, protected by an NDA of eFoli.
-     This program or code or part of code should not be stored, copied, modified or transferred 
-     without explicit written permission of the Disclosure.
-
-     Copyright (c) eFoli.com, Powered by - eFoli LLC
-
--------------------------------------------------------------------------------------------*///|



namespace eFoli\Mate\Sdk;


#	A class for Sdk Front Door
class Action{
	

	private $_response;
	private $_headers;
	private $_config;

	private $_out_format = 'json';
	private $_out_headers = array(
		'json'=>'application/json',
		'xml'=>'text/xml'
	);



	

	function __construct($cfg){
		if(isset($cfg->accessKey) && isset($cfg->secretKey)){
			$this->_config = $cfg;
		}else $this->_config = (object)array('accessKey'=>'','secretKey'=>'');		
	}


	#	======Public functions start======::>

		

		#	Set all headers with signature
		#	Param : $method = [String:]
		public function setHeaders($method,$apiService,$apiServiceAction='default'){
			
			$gtm = gmdate('Ymd\THis\Z');
			$tm = strtotime($gtm);
			$this->setHeader('accessKey',$this->_config->accessKey);
			$this->setHeader('accessSign',$this->eFoliApiSignature($this->_config->accessKey,$this->_config->secretKey,$method,$tm,$apiService));
			$this->setHeader('accessTime',$gtm);
			$this->setHeader('accessAction',$apiService.'-'.$apiServiceAction);

		}


		public function get($url,$param,$fmt=''){
			$this->_out_format = ($fmt=='')?$this->_out_format:$fmt;
			//header("Content-type:".$this->_out_headers[$this->_out_format]);
			$this->connect($url,'GET',$param);			
			return $this->_response;
		}





		

	#	======Public functions end======..::|











	#	=======Private functions start======::>


		private function setHeader($hParam,$hValue){
			$this->_headers[] = $hParam.': '.$hValue;
		}



		private function connect($url,$method,$param){
			
			$this->_response = (object)array(
				'headers'=>array(), 
				'code'=>0,
				'error'=>array(
					'error_no' => 0,
					'message' => ''
				),
				'body'=>'');
			

			$url_params = '';

			switch($method){
				case 'GET': 
					$url_params = http_build_query($param);
					$url_params = ($url_params=='')?'':('?'.$url_params);
				break;
				case 'PUT':
					
				break;
			}

			$curl_request_arr = array(
				CURLOPT_URL => $url.$url_params,
				CURLOPT_RETURNTRANSFER => false,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_WRITEFUNCTION=> array(&$this, '__responseWriteCallback'),
				CURLOPT_HEADERFUNCTION=>array(&$this, '__responseHeaderCallback'),
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => $method,
				CURLOPT_HTTPHEADER => $this->_headers,
			);

			switch($method){
				case 'GET': 

				break;
				case 'PUT':
					
					$fp = @fopen($ext['FILE_PATH'], 'rb');


					$curl_request_arr[CURLOPT_PUT] = true;
					$curl_request_arr[CURLOPT_INFILE] = $fp;
					$curl_request_arr[CURLOPT_INFILESIZE] = filesize($ext['FILE_PATH']);

					
				break;
			}

			$curl = curl_init();
			curl_setopt_array($curl, $curl_request_arr);
			
			$ddd = curl_exec($curl);

			

			$this->_response->code = curl_getinfo($curl, CURLINFO_HTTP_CODE);			
			$this->_response->error = array('error_no' => curl_errno($curl),'message' => curl_error($curl));

		}


		private function __responseWriteCallback(&$curl, &$data)
		{
			
			$this->_response->body .= $data;
			return strlen($data);
		}



		private function __responseHeaderCallback($curl, $data)
		{

			if (($strlen = strlen($data)) <= 2) return $strlen;
			if (substr($data, 0, 4) == 'HTTP')
				$this->_response->code = (int)substr($data, 9, 3);
			else
			{
				$data = trim($data);
				if (strpos($data, ': ') === false) return $strlen;
				list($header, $value) = explode(': ', $data, 2);
				$header = strtolower($header);
				if ($header == 'last-modified')
					$this->_response->headers['time'] = strtotime($value);
				elseif ($header == 'date')
					$this->_response->headers['date'] = strtotime($value);
				elseif ($header == 'content-length')
					$this->_response->headers['size'] = (int)$value;
				elseif ($header == 'content-type')
					$this->_response->headers['type'] = $value;
				elseif ($header == 'etag')
					$this->_response->headers['hash'] = $value{0} == '"' ? substr($value, 1, -1) : $value;
				elseif (preg_match('/^x-amz-meta-.*$/', $header))
					$this->_response->headers[$header] = $value;
			}
			return $strlen;
		}





		private function eFoliApiSignature($accessKey,$secretKey,$method,$timeStamp,$apiService){			
			$eSignKey 	= 'eFoli_API_' . $secretKey;
			$eAccessKey = hash_hmac('sha256', $accessKey, $eSignKey, true);
			$eMethodKey = hash_hmac('sha256', $method, $eAccessKey, true);
			$eTimeKey 	= hash_hmac('sha256', $timeStamp, $eMethodKey, true);
			$eServiceKey= hash_hmac('sha256', $apiService, $eTimeKey, true);

			$eSignString = $accessKey.'|'.$method.'|'.$timeStamp.'|'.$apiService;
			return $signature = hash_hmac('sha256', $eSignString, $eServiceKey,false);
		}



	#	======Private functions end======..::|




#	End of class
}


?>