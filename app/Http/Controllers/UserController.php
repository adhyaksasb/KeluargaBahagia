<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\User;
use Auth;
use Validator;
use DB;

class UserController extends Controller
{
    public function login() {
        return view('front.user.login');
    }
    
    public function userRegister(Request $request) {
        if($request->ajax()) {
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6']
            );

            if($validator->passes()) {
                DB::beginTransaction();
                // Register the User
                $user = new User;
                $user->name = $data['name'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->user_type = "user";
                $user->save();
                DB::commit();
                
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                    $redirectTo = url('/');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }
                // return response()->json(['type'=>'success','message'=>"Account Created, please confirm your email address to login to your account"]);
            }else {
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }
    
    public function userLogin(Request $request) {
        if($request->ajax()) {
            $data = $request->all();

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6',]
            );

            if($validator->passes()) {
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                    $redirectTo = url('/');
                    return response()->json(['type'=>'success','url'=>$redirectTo]);
                }else {
                    return response()->json(['type'=>'incorrect','message'=>'Incorrect Email or Password!']);
                }
            }else {
                return response()->json(['type'=>'error','errors'=>$validator->messages()]);
            }
        }
    }

    public function userLogout() {
        Auth::logout();

        return redirect('/');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}
