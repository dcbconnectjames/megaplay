<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getToken($url)
    {
        //$url = 'https://gle.mothership-tnaig.com/engine/requestToken';
        
        
        if (session()->get('gl_token') == null){
            $this->setSession($url);
        }

        return session()->get('gl_token');
    }

    private function setSession($url)
    {
        $token = $this->postRequest($this->getTokenRequestParams(), $url);

        //create new session array for user
        session($token);
    }

    public function postRequest($data, $url, $includeToken = false)
    {
        $options = [
            'json' => $data,
            'http_errors' => false
        ];

        if ($includeToken) {
            $options['headers'] = ['Authorization' => 'Bearer ' . session()->get('gl_token')];
        }

        //do request here
        $client = new Client();

        $request = $client->request('POST', $url, $options);


        $body = $request->getBody();
        $headers = $request->getHeaders();

        $body = json_decode($body, true);

        return $body;
    }

    public function getRequest($url, $includeToken = false, $data = null)
    {
        $baseurl = 'https://gle.mothership-tnaig.com/engine/requestToken';
        if ($data) {
            $url .= '?' . http_build_query($data);
        }

        $options = [
            'http_errors' => false
        ];

        if ($includeToken) {
            if (session()->get('gl_token') == null) {
                $this->getToken($baseurl);
            }
            $options['headers'] = ['Authorization' => 'Bearer ' . session()->get('gl_token')];
        }

        //do request here
        $client = new Client();
        $request = $client->request('GET', $url, $options);
        $body = $request->getBody();
        $headers = $request->getHeaders();

        $body = json_decode($body, true);

        return $body;
    }

    private function getTokenRequestParams()
    {
        $tokenData = array (
            'ip' => $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'],
            'gl_key' => 'glEng',
            'url' => 'http://megaplay.co.za',
            'sid' => \session()->getId(),
        );
        
        return $tokenData;
    }
}
