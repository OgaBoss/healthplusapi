<?php

namespace App\Http\Controllers;

use App\Lga;
use App\State;
use App\Http\Requests;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class PlacesController extends Controller
{
    //
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getState(){
        $state = State::all()->toArray();
        return response()->json(['state' => $state], 200);
    }

    public function getLgs(){
        $state = $this->request->input('state');
        $state = State::find($state);
        $lgs = $state->lga->toArray();

        return response()->json(['lgs' => $lgs], 200);
    }
}
