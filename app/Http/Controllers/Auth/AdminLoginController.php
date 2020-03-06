<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class AdminLoginController extends Controller
{
    protected $table = "admin";
    public function __construct()
    {
        $this->middleware("guest:administrator")->except("logout");
    }

    public function showLoginForm()
    {
        return view("auth.adminLogin");
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            "login" => "required",
            "password" => "required"
        ]);
        //Attempt to log the user in
        if(Auth::guard("administrator")->attempt(["login" => $request->login, "password" => $request->password],$request->remember))
        {
            //If succesful, then redirect to their intended location
            return redirect('adminIS');
        }

        //if unsucessful then redirect back to the login with the form data
        return back()->withInput($request->only("login","remember"))->withErrors(["login" => [" "],"password" => ["Chybný login alebo heslo!"]]);
    }

    public function logout(Request $request)
    {
        Auth::guard("administrator")->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect("vstupIS");
    }
}
