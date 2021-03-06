<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeoFunction extends Controller
{
        private $apiKey;
        private $language;
        const URL_SINGLE = "https://api.tomtom.com/search/2/geocode/";
        
        public function __construct($apiKey, $language = 'it') {
            $this->apiKey = $apiKey;
            $this->language = $language;
        }
        
        private function getBaseUrl()
        {
            return sprintf(GeoFunction::URL_SINGLE, $this->apiKey, $this->language);
        }
        
       
        public function geocodeAddress($address)
        {
            $queryUrl = $this->getBaseUrl();
            $queryUrl  .= '&query=' . urlencode($address) . '.json';  
            $queryUrl .= '?storeResult=true';
            $queryUrl  .= '&key=' . urlencode($this->apiKey);  
            
           
            $result = file_get_contents($queryUrl);
            $result = json_decode($result, true);
            $latitude = $result['results'][0]['position']['lat'];
            $longitude = $result['results'][0]['position']['lon'];
           
            return array(
                'latitude' => $latitude, 
                'longitude' => $longitude
            );
           

        }
        
    }

