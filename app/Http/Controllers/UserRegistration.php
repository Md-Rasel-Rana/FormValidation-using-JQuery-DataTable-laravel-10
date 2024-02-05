<?php

namespace App\Http\Controllers;


use App\Models\Registration;
use Illuminate\Http\Request;


class UserRegistration extends Controller
{
    public function UserRegistration(){
        return view('AllElement.Formvalidation');
    }
    public function UserRegistrationStore(Request $request){
       // dd($request->all());
        Registration::create([
           'FirstName'=>$request->input('FirstName'),
           'LastName'=>$request->input('LastName'),
           'Email'=>$request->input('Email'),
           'Password'=>$request->input('Password'),
           ]);
           return response()->json(['success'=>'Data Inserted Successfully']);
    } 
    public function Userinfopage(){
      return view('AllElement.UserData');
        
    }
    public function GetUser(){
      return Registration::all();
        
    }



}
