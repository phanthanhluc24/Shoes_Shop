<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function checkUser(Request $request)
    {
        $information=$request->only("password","email");

        if (Auth::attempt($information)) {
            $user=Auth::user();
            if($user->useType=='ADM'){
                return redirect()->route("Adminshow");
            }elseif($user->useType=='USR'){
                session()->put("email",$user->email);
                return redirect()->route("/");
        }
    }
    }

    public function Layout(){
        return view("Home.Layout.mainContent");
    }
   
    public function index(){
       $user= User::all();
       return view("Home.Pages.User",['user'=>$user]);
    }

 
    // public function checkUsers()
    // {
    //     $idUser=Auth::id();
    //     $id=users::findOrFail($idUser);
    //     if($id){
    //         $name=$id->Fullname;
    //     }
    //     dd($id); 
    // }
}
