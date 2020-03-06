<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class VodicLoginController extends Controller
{
    protected $table = "vodic";
    public function __construct()
    {
        $this->middleware("guest:vodici")->except("logout");
    }

    public function showLoginForm()
    {
        return view("auth.vodic-login");
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request,[
            "login" => "required",
            "password" => "required"
        ]);
        //Attempt to log the user in
        if(Auth::guard("vodici")->attempt(["login" => $request->login, "password" => $request->password],$request->remember))
        {
            //If succesful, then redirect to their intended location
              return redirect('vodicIS');
        }

        //if unsucessful then redirect back to the login with the form data
        return back()->withInput($request->only("login","remember"))->withErrors(["login" => [" "],"password" => ["Chybný login alebo heslo!"]]);
    }

    public function logout(Request $request)
    {
        Auth::guard("vodici")->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect("vstupIS");
    }
}
