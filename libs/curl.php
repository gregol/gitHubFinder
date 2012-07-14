<?php

class Curl
{
	public $github = 'https://api.github.com/';

	/**
	 * @param $url
	 * @returns $data array
	 */	
	public function getRequest($url, $httpMethod = 'GET')
	{

		$curlOptions = array();
		
		if ('GET' === $httpMethod)
		{
                    $url = $this->github . $url;
                } 
                else 
                {
                        $curlOptions += array(
                            CURLOPT_POST => true,
                            CURLOPT_POSTFIELDS => $queryString
                        );
                }

		$curlOptions += array(
                        CURLOPT_URL => $url,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                    );
				
		$ch = curl_init($url);
		
		curl_setopt_array($ch, $curlOptions);
		
	    $data = curl_exec($ch);
		
	    curl_close($ch);

	    return $data;
	}
}
