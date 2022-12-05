<?php

namespace App\Http\Controllers;

use NumberFormatter;
use Illuminate\Http\Request;

class GeneralPurposeController extends Controller
{
    //
    public function convert(Request $request){

        $details = $request->validate([
            'htmlText' => 'required'
        ]);



        


        return response()->json([
            'number' => ''
        ]);

    }

    private function processing($number){

        $digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $num = $digit->format($number);
        $classNum = str_replace(' ', '-', $num);
        return $classNum;
    }
}
