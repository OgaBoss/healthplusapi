<?php

namespace App\Http\Controllers;

use App\Lga;
use App\State;
use Illuminate\Http\Request;
use App\Library\ExcelFileParse;
use Maatwebsite\Excel\Facades\Excel;
class CsvController extends Controller
{
    //
    protected $parse;

    public function __construct(ExcelFileParse $parse){
//        $this->middleware('jwt.auth');
        $this->parse = $parse;
    }
    public function store(){
        $location  = $this->parse->getFile();

        Excel::load($location, function($reader) {
            // Getting all results
            $results = $reader->toArray();
            return response()->json(['data' => $results], 200);
        });

    }

    protected function getFile(){

    }
}
