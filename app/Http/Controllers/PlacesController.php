<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class PlacesController extends Controller
{
    //
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getCountry()
    {
        $client = new GuzzleHttpClient();

        try{
            $apiRequest = $client->request( 'GET', 'http://where.yahooapis.com/v1/countries', [
                'query' => ['appid' => env( 'yahooappid' ), 'format' => 'json'],
            ] );
        }catch(\Exception $ex){
            return response()->json(['error' => 'Something went wrong'], 500);

        }

        $content = json_decode($apiRequest->getBody()->getContents());

        $country = [];
        foreach($content->places->place as $place){
            $country[] = $place->name;
        }
        sort($country);

        return response()->json(['country' => $country], 200);
    }

    public function getState(){
        $country = $this->request->input('country');

        $client = new GuzzleHttpClient();

        try{
            $apiRequest = $client->request('GET', 'http://where.yahooapis.com/v1/states/'.$country, [
                'query' => ['appid' => env('yahooappid'), 'format' => 'json'],
            ]);
        }catch(\Exception $ex){
            return response()->json(['error' => 'Something went wrong'], 500);
        }


        $content = json_decode($apiRequest->getBody()->getContents());

        $state = [];
        foreach($content->places->place as $place){
            $state[] = $place->name;
        }
        sort($state);

        return response()->json(['state' => $state], 200);

    }

    public function getLgs(){
        $state = $this->request->input('state');

        $client = new GuzzleHttpClient();

        try{
            $apiRequest = $client->request('GET', 'http://where.yahooapis.com/v1/counties/'.$state, [
                'query' => ['appid' => env('yahooappid'), 'format' => 'json'],
            ]);
        }catch(\Exception $ex){
            return response()->json(['error' => 'Something went wrong'], 500);

        }



        $content = json_decode($apiRequest->getBody()->getContents());

        $lgs = [];
        foreach($content->places->place as $place){
            $lgs[] = $place->name;
        }
        sort($lgs);

        return response()->json(['lgs' => $lgs], 200);
    }
}
