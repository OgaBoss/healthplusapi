<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\EntityUtilities as Entity;
use App\Repositories\HmoRepository as Hmo;

class HmoController extends Controller
{
    protected $hmo;
    protected $entity;

    public function __construct(Hmo $hmo, Entity $entity){
        $this->middleware('jwt.auth');
        $this->hmo = $hmo;
        $this->entity = $entity;
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get All Data coming from the client
        $data = $request->all();
        $hmo = $this->entity->createNewEntity($data, $this->hmo);
        return $hmo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
