<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class ResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function show(Results $results)
    {
        $url = 'https://gle.mothership-tnaig.com/engine/requestToken';
        $data = $this->getResults();
        
        
        

        if (isset($data['translation_code']) && $data['translation_code'] == 101) {
            session()->forget('gl_token');
            $this->getToken($url);
            $data = $this->getResults();
        }

        return view('results.showResults', ['data' => $data[1]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function edit(Results $results)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Results $results)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy(Results $results)
    {
        //
    }

    public function getResults()
    {
        $url = 'https://gle.mothership-tnaig.com/engine/latestResults';

        $this->getToken($url);

        return  $this->getRequest($url, true);
    }
}
