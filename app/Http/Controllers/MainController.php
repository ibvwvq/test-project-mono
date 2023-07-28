<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function getClients(){
        $clients = DB::table('clients')->paginate(3);
        return view('welcome',['clients'=>$clients]);
    }
}
