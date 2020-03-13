<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shoes;
use Illuminate\Support\Facades\Auth;

class AuthorizeController extends Controller
{
    public function fetchShoes()
    {
    	if(Auth::check())
    	{
    		if (Auth::user()->role_id == 1)
	        {
	            return response()->json(Shoes::all(), 200);
	        }
	        else{
	        	
    			return response()->json(["message", "Authorization required!"], 401);
	        }
    
    	}
    	else{
    		return response()->json(["message", "Authentication Required!"], 401);
    	}
	}

	public function authenticate(Request $request)
	{
		$email = $request['email'];
		$password = $request['password'];

		if (Auth::attempt(['email' => $email, 'password' => $password]))
		{
			  $user = Auth::user();
			  if($user->role_id === 1)
			  {
			  	return response()->json(["message", "You are now authenticated as admin"], 200);
			  }
			  return response()->json(["message", "You are now authenticated as user"], 200);
		 	  
		}
		else
		{
    		return response()->json(["message", "Wrong credentials provided!"], 401);
		}
	}
    	
}
