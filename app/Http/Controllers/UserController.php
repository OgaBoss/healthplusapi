<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\Entity;
use App\Library\EntityUtilities;
use App\Repositories\UserRepository as User;

class UserController extends Controller
{
    protected $user;
    protected $entityUtilities;
    public function __construct(User $user, EntityUtilities $entityUtilities){
        $this->middleware('jwt.auth');
        $this->user = $user;
        $this->entityUtilities = $entityUtilities;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->user->all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get all data to create a new user
        $data = [
            'role_id' => $request->input('role_id'),
            'email' => $request->input('email'),
            'entity_id' => $request->input('entity_type_id'),
            'password' => Hash::make($request->input('password')),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'activated' => 0
        ];

        // Create the User
        $returnedData = $this->user->create($data);

        // Get Entity to attach
        $entity = $request->input( 'entity_name' );
        $entity_id = $request->input( 'entity_id' );
        return $this->attachUser( $entity, $entity_id, $returnedData );
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

    /**
     * @param         $entity
     * @param         $entity_id
     * @param         $returnedData
     * @return \Illuminate\Http\JsonResponse
     */
    protected function attachUser( $entity, $entity_id, $returnedData )
    {

        // Attach User to an Entity
        $status = $this->entityUtilities->attachUserToNewEntity( $returnedData, $entity_id, $entity );
        if ( $status )
        {
            return response()->json( ['success' => 'User Attached'], 200 );
        } else
        {
            return response()->json( ['error' => 'User not Attached'], 500 );
        }
    }
}
