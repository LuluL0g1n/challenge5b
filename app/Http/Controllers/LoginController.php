<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {

        $user = User::where('username','=',$request->username)->first();
        if($user){
            if($user->password == $request->password){
                $request->session()->put('ID',$user->id);

                /*if($user->type == 'student'){
                    return redirect('welcome');
                }*/
                return redirect('home');
            }
            else{
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
    public function logout(Request $request){
        if(Session::has('ID')){
            Session::pull('ID');
            return redirect('login');
        }

    }

}
