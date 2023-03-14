<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\UserCreatedMail;
class UsersController extends Controller
{
 public function myProfile(){
    $user=User::find(auth()->user()->id);
   //var_dump($user);exit;
    return view('user.user_profile',compact('user'));
    }
    public function mail(){
      Mail::to('kavyasreem40@gmail.com')->send(new UserCreatedMail());
      return redirect()->route('post.create');
    }
 }

