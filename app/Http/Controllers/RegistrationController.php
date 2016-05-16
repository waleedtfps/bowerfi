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

class RegistrationController extends Controller {

    public function create() {


        //getting data and validating
        $validator = Validator::make(Input::all(), array(
                    'name' => 'required',
                    'email' => 'email|required|unique:users',
                    'password' => 'required|min:6|confirmed'
        ));

        if ($validator->fails()) {
            //incase validation fails

            return Redirect::to('/register')->withErrors($validator)->withInput();
        } else {



            //when validation passes
            $user = User::Create(array(
                        'fullname' => Input::get('name'),
                        'email' => Input::get('email'),
                        'password' => Hash::make(Input::get('password'))));



            return Redirect::to('/login');
        }
    }
}
