<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function create()
    {
        return view('registration.createuser');
    }
    
    public function handleLanding(Request $request)
    {
        $subStatus = request()->get('action');
        
        $sessionVars = request()->all();
        
        if (isset($sessionVars['tag'])) {
            $request->session()->put('tag', $sessionVars['tag']);
            $request->session()->put('ref', $sessionVars['ref']);
        }
        
        if ($subStatus ==  'AlreadySubscribed') {
            return view('MegaPlayZAPowerballResults', $body);
        } else {
            if (isset($sessionVars['tag'])) {
                return view('landers.initial', $sessionVars);
            }
            return view('landers.initial', ['tag' => '', 'ref' => '']);
        }
    }
    
    public function dounsub() 
    {
        $number = request()->get('msisdn');
        
        if (substr($number, 0, 1) == 0) {
            $leng = strlen($number) - 1;
            $number = substr($number, 1, $leng);
        }
        
        $url = 'https://sdp.smartcalltech.co.za/cancel/8ca10a73-1c0c-40a6-8c66-27fdc52016d7/27' . $number;
        
        $client = new Client();
        $request = $client->request('GET', $url);
        $body = $request->getBody();

        $body = json_decode($body, true);
        
        return redirect('/unsub-confirmed');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = request()->get('name');
        $user->mobile_number = request()->get('mobile');
        $user->account_status = 'active';
        $user->subscription_level = 'basic';
        $user->email = request()->get('email');
        $user->password = md5(request()->get('password'));

        $user->save();

        auth()->login($user);

        return redirect()->to('/powerball');
    }
    
    public function handlewireless()
    {
        $misisdn = request()->get('mobile_number');
        
        if (substr($misisdn, 0, 1) == 0) {
            $leng = strlen($misisdn) - 1;
            $misisdn = substr($misisdn, 1, $leng);
        }
        
        $url = 'https://sdp.smartcalltech.co.za/sms/8ca10a73-1c0c-40a6-8c66-27fdc52016d7/27' . $misisdn .'?tag=' . session()->get('tag') . '&ref=' . session()->get('ref');
        Log::debug($url);
        $client = new Client();
        $request = $client->request('GET', $url);
        $body = $request->getBody();

        $body = json_decode($body, true);
        
        $var = substr(session()->get('tag'), 0, 7);
        
        if ($var == 'Cookies') {
            $post2 = $this->doPostbackOne(session()->get('ref'));
            Log::debug(json_encode($post2));
        }
        
        if ($body != 'Network not supported.') {
            return view('landers.initial_wifi', ['status' => 'sent', 'msisdn' => $misisdn]);
        } else {
            return view('landers.initial_wifi', ['status' => 'notsent', 'message' => $body]);
        }
        
    }
    
    public function trafficCallback(Request $request)
    {
        $refIp = request()->ip();
        $type = request()->get('type');
        $status = request()->get('action');
        $msisdn = request()->get('msisdn');
        $subid = request()->get('subscriberid');
        $amount = request()->get('charge');
        $tokenurl = 'https://gle.mothership-tnaig.com/engine/requestToken';
        $url = 'https://gle.mothership-tnaig.com/engine/miraPowerBallAPI';

        $token = $this->getToken($tokenurl);
        
        $var = $request->session()->pull('tag');

        $options = [
            'http_errors' => false,
            'headers' => ['Authorization' => 'Bearer ' . $token]
        ];

        //do request here
        $client = new Client();
        $request = $client->request('GET', $url, $options);
        $body = $request->getBody();
        $headers = $request->getHeaders();

        $body = json_decode($body, true);
        
        $results = explode(' ', $body['current_result']['result']);
        $normal = array_slice($results, 0, 5);
        $bonus = array_slice($results, 6, 1);
        $body['normal_balls'] = $normal;
        $body['bonus_balls'] = $bonus;
        $body['msisdn'] = $msisdn;
        
        $sesh = [
            'tag' => session('tag') ?? 'notag',
            'ref' => session('ref') ?? 'noref',
        ];
        
        if ($status == 'Addition' || $status == 'Redirect' || $status == 'AlreadySubscribed') {
            return view('MegaPlayZAPowerballResults', $body);
        } else if ($status == 'Declined') {
            return redirect()->to('/declined');
        } else {
            return redirect()->to('/errors?message=' . request()->get('action'));
        }
    }
    
    public function doPostbackOne($ref)
    {
        $ref = session('ref');
        Log::debug(json_encode($ref));
        $url = "https://track.trckmobile.swaarm-clients.com/postback?click_id=" . $ref; 
        
        //do request here
        $client = new Client();
        $request = $client->request('GET', $url);
    }
    
    public function doPostbackTwo($msisdn)
    {
        $str = rand(6, 6);
        $result = $msisdn . md5($str);
        $url = "https://track.trckmobile.swaarm-clients.com/postback?click_id=" . $result; 
        //do request here
        $client = new Client();
        $request = $client->request('GET', $url);
        return true;
    }
    
}
