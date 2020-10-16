<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\User;


class EmployerAuthController extends Controller
{

    public function getLogin()
    {
        return view('employer/signin_signup/sign_in');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/employer/talentsearch');
        }
        return redirect('/employer/signin');
    }
    

    public function getRegister()
    {
        return view('employer/signin_signup/sign_up');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new \App\User;
        $user->role = 'employer';
        $user->nama_depan = $request->firstname;
        $user->nama_belakang = $request->lastname;
        $user->email = $request->email;
        $user->created_by = $request->firstname;
        $user->created_date  = date("Y-m-d H:i");
        $user->updated_by = $request->firstname;
        $user->updated_date = date("Y-m-d H:i");
        $user->password = bcrypt ($request->password);
        $user->save();
        
        $request->request->add(['user_id' => $user->id]);
        $request->request->add(['nama_depan' => $user->nama_depan]);
        $request->request->add(['nama_belakang' => $user->nama_belakang]);
        $request->request->add(['password' => $user->password]);
        $employer = \App\Employer::create($request->all());
        return view('employer/signin_signup/sign_in');
    }

    public function logout(){
        Auth::logout();
        return redirect('employer/signin');
    }

    public function send(Request $request)
    {
        $data = [
            'file' => $request->file('file')
        ];

        //  $to = [
            // 'nama' => $request->nama,
        // ];
        $to = 'danyfadhilah8c@gmail.com';
        \Mail::to($to)->send(new \App\Mail\TesMail($data));
        echo 'Sent Email Success';
    }
}

