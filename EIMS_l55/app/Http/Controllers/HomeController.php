<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use Redirect;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getList()
    {
        $users = User::all();
        return view('/admin/workers_list', compact('users'));
    }

    public function getRegister()
    {
        return view('/admin/workers_new');
    }

    public function postRegisterWorker(Request $request)
    {
        $aux = $request->validate([
            'name' => 'required|string|max:255',        
            'lName' => 'required|string|max:255',        
            'charge' => 'required|string|max:255',         
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',

        ]);

        $worker = User::create($request->all());

        \Session::flash('message', 'Trabajador(a) '.$request->name.' '.$request->lName.' ha sido registrado(a) con éxito');
        
        return Redirect::to('/admin/workers-new');
    }

}
