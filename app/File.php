<?php

namespace App;
use Illuminate\Support\Facades\File as fs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File as FacadesFile;

class File extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }




    public static function boot(){
        static::deleted(function($file){
            fs::delete(public_path('files/'. $file->user->id). '/'. $file->name);
        });
    }
}
