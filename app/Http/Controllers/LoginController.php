<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\User;
class LoginController //extends Controller
{
  public function login(){
    return view('login');
  }
  public function do_login(){
    $input=[
      'name'=>request('name'),
      'password'=>request('password'),
    ];
    if(auth()->attempt($input,true)){
    return  redirect()->route('post.create');
    }
    else{
    return redirect()->route('login')->with('message','Login Attempt Failed!!');
  }
}
public function logout(){
  auth()->logout();
  return redirect()->route('login');
}
}