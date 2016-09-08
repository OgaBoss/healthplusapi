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
        $createData = [];
        $this->validate($request,[
            'name' => 'required',
            'street' => 'required',
            'state' => 'required',
            'city' => 'required',
            'lg' => 'required',
            'country' => 'required',
            'general_email' => 'required|unique:hmos',
            'phone_mobile' => 'required|unique:hmos',
        ]);

        //Get All Data coming from the client
        $data = $request->all();

        $createData['name'] = $data['name'];
        $createData['street'] = $data['street'];
        $createData['state'] = $data['state'];
        $createData['city'] = $data['city'];
        $createData['lg'] = $data['lg'];
        $createData['country'] = 'Nigeria';
        $createData['general_email'] = $data['general_email'];
        $createData['phone_mobile'] = $data['phone_mobile'];
        $createData['phone_office'] = $data['phone_office'];
        $createData['created_by'] = $data['creator'];
        $createData['activated'] = 0;
        $hmo = $this->entity->createNewEntity($createData, $this->hmo);
        return response()->json(['success' => $hmo], 200);
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
