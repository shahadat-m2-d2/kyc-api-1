<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    function show($name=null){
        //return "Hello ".$name." from User Controller";
        return DB::select("SELECT * FROM country");
    }

    function country_list(){
        $data = DB::table("country")->get();
        return $data;
    }
}
