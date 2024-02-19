<?php

namespace App\Http\Controllers;

use Illuminate\Http\Recuest;
use Illuminate\Support\Facades\DB;
class restaurantcontroller extends Controller
{
public function index(){
    return view('welcome');
  $users = DB::select('select * from users');
  dd($users);


  
}
}