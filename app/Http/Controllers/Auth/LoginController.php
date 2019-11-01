<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    // Show Login form for admin
    public function showAdminLoginForm(){
        return view('auth.login',['url' => 'admin']);
    }

    public function adminLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
            $request->session()->flash('alert-success','Admin logged in successfully.');
            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email','remember'));
    }

    // Show login form for customer
    public function showCustomerLoginForm(){
        return view('auth.login',['url' => 'customer']);
    }

    public function customerLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
            $request->session()->flash('alert-success','Customer logged in successfully.');
            return redirect()->intended('/customer');
            
        }
        
        return back()->withInput($request->only('email','remember'));
    }
}
