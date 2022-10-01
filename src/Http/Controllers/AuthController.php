<?php

namespace Sashagm\Auth\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth::login');
    }

    public function registerForm()
    {
        return view('auth::register');
    } 
    
    

    public function registerProcess(Request $request)
    {
        //dd($request);
        
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:account'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'full_name' => ['required', 'string', 'max:255', 'unique:account'],
            'password' => ['required', 'min:6'],
        ]);
        $user = User::create( [            
            'name' => $request->name,
            'email' => $request->email,
            'full_name' => $request->full_name,
            'psd' => mb_strtoupper(md5($request->password . config('login.secretKey')))
        ]
        );
        Auth::login($user);
        return redirect()->route('profile');
         
    } 

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email) -> first();
           
        if (!$user) {
            return back()->withErrors([
                'email' => 'Пользователь не найден.',
            ]);
        }

        if(mb_strtoupper(md5($request->password . config('login.secretKey'))) == $user->psd)
        {   
            
            Auth::login($user);
            return redirect()->route('profile');
        }
        else{
            return false;
        }

  
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    


    public function profile()
    {
        return view('auth::user');
    }  


}
