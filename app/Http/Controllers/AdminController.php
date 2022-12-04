<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $details = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required'
        ]);

        User::create($details);

        return response()->json([
            'status' => 'success'
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
        $details = $request->validate([
            'email' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'username' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($details);

        return response()->json([
            'status' => 'success'
        ]);

    }

    // uploaded file, user id
    public function uploadToUser(Request $request){
        $request->validate([
            'file' => 'required',
            'user_id' => 'required'
        ]);


        if($request->has('file')){
                $name = time(). '.' . $request->file->getClientOriginalExtension();

                $request->file->move(public_path('files/'. $request->user_id. '/'), $name);


                File::create([
                    'user_id' => $request->user_id,
                    'name' => $name,
                    'type' => $request->type,
                    'size' => $request->size
                ]);


                return response()->json([
                    'status' => 'success'
                ]);
            }


        return response()->json([
            'status' => 'faild'
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
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'status' => 'success'
        ]);

    }
}
