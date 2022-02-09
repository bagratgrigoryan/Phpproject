<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;



class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $register)
    {
        $user = new User();
        $user->first_name = $register->firstName;
        $user->last_name = $register->lastName;
        $user->age = $register->age;
        $user->phone = $register->phone;
        $user->email = $register->email;
        $user->password = $register->password;

        $user->save();

        return response()->json(['status' =>"success",'user' => $user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::all();
        return response()->json([
            "status"=>"success",
            "data" => $user->where('email',"=",$request['login'])->
            where('password',"=",$request['password'])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new User();
        return response()->json([
            'status'=>'success',
            'data' => $user->find($id)
        ]);
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
        $user = User::find($id);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->age = $request->age;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        return response()->json([
           'status'=> 'updated',
           'user' => $user
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::find($id)->delete();

       return response()->json([
           "status"=>"deleted"
       ]);
    }
}
