<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function home()
    {
        $data = array();
        if (Session::has('ID')) {
            $data = User::where('id', '=', Session::get('ID'))->first();
        }
        return view('home', compact('data'));
    }


    public function viewaddsv()
    {
        return view('teacher.addsv');
    }


    public function addsv(Request $request)
    {

        User::create([

            'username' => $request->username,
            'phone' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'fullname' => $request->name,
            'type' => 'student'
        ]);
        return redirect()->route('student')->with('success', 'Thêm thành công');
    }


    public function student()
    {
        $type = 'student';
        $data = array();
        if (Session::has('ID')) {
            $data = User::where('id', '=', Session::get('ID'))->first();
        }
        $user = User::where('type', '=', $type)->get();

        return view('teacher.student', compact("data", 'user'));
    }


    public function edit($id)
    {

        $data = array();
        if (Session::has('ID')) {
            $data = User::where('id', '=', Session::get('ID'))->first();
        }
        $user = User::find($id);

        return view('teacher.edit', compact('data', 'user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = $user->password == $request->password ? $request->password : $request->password;
        $user->save();

        return redirect()->route('student')->with('success', 'Cập nhật thành công');
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->route('student')->with('success', 'Xóa thành công.');
    }


    public function profile($id)
    {
        $data = User::find($id);

        return view('profile', compact('data'));
    }


    public function updateprofile(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $destination = '/public/upload';
                $image = $request->file('image');
                $image_name = $image->getClientOriginalName();
                $path = $request->file('image')->storeAs($destination, $image_name);
                $user->avatar = $image_name;
            }
        }
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password = $user->password == $request->password ? $request->password : $request->password;
        $user->save();

        return redirect()->back();
    }
    public function viewall(){
        $data = array();
        if (Session::has('ID')) {
            $data = User::where('id', '=', Session::get('ID'))->first();
        }
        $user = User::all();

        return view('all', compact("data", 'user'));
    }
    public function message($id){
        $data = array();
        if (Session::has('ID')) {
            $data = User::where('id', '=', Session::get('ID'))->first();
        }
        $user = User::find($id);

        return view('message', compact('data','user'));

    }
    public function sendmessage( Request $request ,$id){

        $user = User::find($id);
        $user->message = $request->message;
        $user->save();
        return redirect()->route('viewall');

    }
}







