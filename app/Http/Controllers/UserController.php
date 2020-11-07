<?php

namespace App\Http\Controllers;
use App\Models\u_user;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    // Method untuk menampilkan list post
    public function index()
    {
        return u_User::all();
    }

    // method untuk menampilkan view post by Id
    public function show($id)
    {
        $user = u_User::find($id);
        if (! $user) {
            return response()->json([
                'message' => 'User not found'
            ]);
        }
        return $user;
    }

    // method membuat post baru
    public function store(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        return m_User::create($request->all());
    }

    // method untuk update data post by Id
    public function update (Request $request, $id){
        
        $user = m_User::find($id);

        if ($user) {
            $user->update($request->all());

            return response()->json([
                'message' => 'User has been updated'
            ]);
        }
        return response()->json([
            'message' => 'User not found',
        ], 404);
    }

    // method untuk delete data post by Id
    public function delete ($id){

        $user = m_User::find($id);
        
        if ($user) {
            $user->delete();

            return response()->json([
                'message' => 'User has been deleted'
            ]);
        }
        return response()->json([
            'message' => 'User not found',
        ], 404);
    }
}