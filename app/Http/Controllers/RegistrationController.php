<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth;
use App\Http\Requests;
use Mail;
use App\User;
use Illuminate\Support\Facades\Input;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Company;
class RegistrationController extends Controller
{

	public function create(){

	    			
		//getting data and validating
		$validator = Validator::make(Input::all(),array(
				'name'=> 'required',
				'email'=> 'email|required|unique:users',
				'password'=> 'required|min:6|confirmed'
				

				));  		

		if ($validator->fails())
			{
				//incase validation fails

			    return Redirect::to('/register')->withErrors($validator)->withInput();

			}

		 else
	    	{	
	    		$confirmation_code = str_random(30);


	    		//when validation passes
                        $user = User::Create(array(
	            	'fullname' => Input::get('name'),
	                'email' => Input::get('email'),
	                'password' => Hash::make(Input::get('password')),
	                
	                'confirmation_code' => $confirmation_code
	            ));
	             
	          
		    	Mail::send('',['confirmation_code'=> $confirmation_code,'fullname'=>Input::get('name')],function($message)
							{
							   $message->from('admin@hotmail.com','Laravel');

							    $message->to(Input::get('email'), Input::get('name'))
                ->subject('Verify your email address');
							});

	    		  
	            return Redirect::to('confirmation');
		            
			}

	}
	public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            return 'invalid confirmation code';
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            return 'invalid user';
        }

        
        $user->confirmation_code = null;
        $user->save();
        
        	
       
        

        return Redirect::to('login')->with('message','This is it Login to Continue.');
    }

	public function index(){

		
		return view('user.register');
	}







}
