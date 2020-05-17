<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register(){
        if (Auth()->User()){
            if(Auth()->User()->account_type == 'buyer') {
                return redirect()->route('buyer.products');
            }else if (Auth()->User() && Auth()->User()->account_type == 'admin' || Auth()->User()->account_type == 'co-admin') {
                return redirect()->route('admin.dashboard');
            }
        }else{
            return view('website.auth.register');
        }
    }


    public function registration(Request $request){
        $rules = [
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:users|regex:/(01)[0-9]{9}/',
            'password' => 'required|string|min:8|confirmed',
        ];
        $this->validate($request,$rules);
  
          User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'account_type' => $request['account_type'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with('success', 'Successfully account created.');
    }


    public function loginView(){
        if (Auth()->User()){
            if(Auth()->User()->account_type == 'buyer') {
                return redirect()->route('buyer.products');
            }else if (Auth()->User() && Auth()->User()->account_type == 'admin' || Auth()->User()->account_type == 'co-admin') {
                return redirect()->route('admin.dashboard');
            }
        }else{
            return view('website.auth.login');
        }
    }


    public function login(Request $request){
        $data = [
            'phone' => $request['phone'],
            'password' => $request['password'],
        ];
        if (Auth::attempt($data)) {
            if (Auth()->User() && Auth()->User()->account_type == 'buyer') {
                return redirect()->route('buyer.products');
            }

            if (Auth()->User() && Auth()->User()->account_type == 'admin' || Auth()->User()->account_type == 'co-admin') {
                return redirect()->route('admin.dashboard');
            }
        }else{
            return redirect()->back()->with('error', 'মোবাইল অথবা পাসওয়ার্ড ভুল ।');
        }
    }


    public function resetView(){
        return view('website.auth.reset');
    }

    public function resetPass(Request $request){
        $rules = [
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required|string|min:8',
        ];
        $this->validate($request,$rules);

        $form_data = array(
            'password' => Hash::make($request['password']),
        );

        $user = User::where('phone', '=', $request->phone)->first();
        if($user){
            User::where('phone', '=', $request->phone)->update($form_data);
            return redirect()->back()->with('success', 'পাসওয়ার্ড পরিবর্তন হয়েছে ।');
        }else{
            return redirect()->back()->with('error', 'মোবাইল নাম্বার সঠিক নয় ।');
        }
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return back();
    }
}
