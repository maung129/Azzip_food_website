<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create(){
        return view('register');
    }
    //register the user
    public function store(Request $request){
        $cleanData = request()->validate([
            "username" => ['required'],
            "email" => ['required',Rule::unique('users','email')],
            "password"=>['required','confirmed','min:6'],
            "image"=>['required']
        ]);
        $cleanData['role_id'] = 2;
        $path = request()->file('image')->store('/images');

        $cleanData['image'] = $path;
        $cleanData['address'] = $request->address;
        $cleanData['phone'] = $request->phone;
        $cleanData['password'] = Hash::make($request->password);

        $user = User::create($cleanData);
        auth()->login($user);
        // $request->email==="admin@gmail.com" && $request->password==="admin1234"
        if(auth()->user()->role_id===1){
            return redirect('/dashboard')->with('success','Welcome Admin');
        }else{
            return redirect('/')->with('success','Successfully registered your account, '.auth()->user()->username);
        }

    }


    public function login(){
        return view('login');
    }

    public function user_login(Request $request){

         $data = request()->validate([
            "email"=>['required',Rule::exists('users','email')],
            "password"=>['required']
        ]);
        auth()->attempt($data);
        if(auth()->attempt($data)){
            if($request->email==="admin@gmail.com" && $request->password==="admin1234"){
                return redirect('/dashboard')->with('success','Welcome Admin');
            }
            else{
                return redirect('/')->with('success',"Successfully login your account, ".auth()->user()->username);
            }
        }
        else{
            return back()->withErrors(['email'=>'Something went wrong']);
        }

    }

    public function logout(){
        auth()->logout();
        return redirect('/login')->with('success','Logout Successfully');
    }
}
