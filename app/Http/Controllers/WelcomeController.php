<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
   
    public function welcome()

    {
    		$users= \App\User::with('profile.country:id,name')->get();
  
    	// $users =\App\User::with([
     //     'profile' => function($profile){
     //     	return $profile->with([
     //          'country' => function($country){
     //          	return $country->where('id',1);
     //          }
     //     	]);
     //     }
    	// ])->get();
     return view('welcome',compact('users'));
    }

  
}
