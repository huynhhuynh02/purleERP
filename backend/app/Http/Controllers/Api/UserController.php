<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    * @param  \Illuminate\Http\Request  $request
    */
    public function register(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        $password = bcrypt($request->password);
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $password
        ]);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ], 200);
    }

    /** 
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $token = $user->createToken('MyApp')->accessToken; 

            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'token' => $token
            ], 201);
        }

        return response()->json([
            'message' => 'Login fails, email or password is not correct !'
        ], 201);
    }

    public function logout(Request $request) 
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
