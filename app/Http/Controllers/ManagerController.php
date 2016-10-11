<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Hash;
use App\User;
use App\Guest;
use Auth;

class ManagerController extends Controller
{
    /**
     * Instantiate a new Controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getLogin', 'postLogin', 'getAuth']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view ('admin.index');
        // landing page for manager
    }

    public function getCurrentguests()
    {
        $reservations = Guest::current();

        return view('admin.currentguest')->with('reservations', $reservations);
    }

    public function getGuestroomnumber()
    {
        $reservations = Guest::current();

        return view('admin.guestroomnumber')->with('reservations', $reservations);
    }

    public function getLogin()
    {
        return view ('manager_login');
    }

    public function postLogin(Request $request)
    {
        $error=false;

        // read inputs
        $username =  $request->input('name');
        $password = $request->input('pass');

        // seach for users with the name in the input
        $user = User::where('username', $username)->find(1);

        if ($user != null && Hash::check($password, $user->password)) {
            // auth success
            Auth::login($user);
            $request->session()->flash('alert', 'Login Successfull!');
            return redirect('admin/currentguests');
        } 

        // no auth
        $request->session()->flash('alert', 'Login NOT Successfull!');
        return redirect('admin/login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('admin/');
    }

    // for debuggin purpose - displays user thats logged in
    public function getAuth() 
    {
        $user = Auth::user();
        if ($user) {
            return "User: " . $user;
        } else {
            return "User: not logged in";
        }
    }

}
