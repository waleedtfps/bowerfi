<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Auth;

class LoginController extends Controller
{
    
    public function authenticate(){

        if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){   

         
            Return Redirect('user/items');
           


            }
                   
        else{
        	return Redirect::back()->withInput(Input::except('password'))->with('message','Email or password is not correct, please try again.');
        }
    }
}

