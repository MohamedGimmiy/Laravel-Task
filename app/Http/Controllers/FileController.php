<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return response()->json([
            'files' => $files,
            'status' => 'success'
        ]);
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
        $request->validate([
            'file' => 'required',
            'user_id' => 'required'
        ]);


        if($request->has('file')){
                $name = time(). '.' . $request->file->getClientOriginalExtension();

                $request->file->move(public_path('files/'. $request->user_id. '/'), $name);

                $data = new File();
                $data->user_id =  $request->user_id;
                $data->name = $name;
                $data->type = $request->type;
                $data->size = (int) $request->size;
                $data->save();


/*                 File::create([
                    'user_id' => $request->user_id,
                    'name' => $name,
                    'type' => $request->type,
                    'size' => $request->size
                ]); */


                return response()->json([
                    'status' => 'success'
                ]);
            }


        return response()->json([
            'status' => 'faild'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }


    public function info(){

        $users = User::with('files');

        $allInfo = [];

        foreach($users as $user){
            $userInfo = [
                'user' => $user
            ];
            $allInfo [] = $userInfo;
        }

        return response()->json(['info' => $allInfo]);
    }
}
