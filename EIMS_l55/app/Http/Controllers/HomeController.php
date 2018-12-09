<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Supplier;
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

    //************************Controladores para CRUD Trabajadores*******************

    public function getList()
    {
        $users = User::all();
        //dd(compact('users'));
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

    public function postWorkerEdit(Request $request)
    {
        $worker = User::findOrFail($request->get('id'));

        return $worker->toJson();
    }

    public function postWorkerDestroy(Request $request)
    {
        $worker = User::findOrFail($request->get('id'));
        $worker->delete();

        return response()->json();
    }

    public function putWorkerUpdate(Request $request)
    {
        $worker = User::where('email',$request->email)->first();
        $worker->name = $request->name;
        $worker->lName = $request->lName;
        $worker->type = $request->type;
        $worker->charge = $request->charge;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->status = $request->status;
        $worker->save();

        $message = ' Trabajador(a) '.$worker->name.' '.$worker->lName.' fue actualizado(a) exitosamente.';
        return response()->json([
            'message'=> $message
            ]);
    }

    //************************Controladores para CRUD Proveedores*******************

    public function getRegisterSup()
    {
        return view('/admin/supplier_new');
    }

    public function getListSup(){
    
        $sup = Supplier::all();
        return view('/admin/supplier_list', compact('sup'));

        
    }

    public function postRegisterSupplier(Request $request)
    {
        $aux = $request->validate([
            'name' => 'required|string|max:255',        
            'company' => 'required|string|max:255',        
            'address' => 'required|string|max:255',         
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',

        ]);

        $supplier = Supplier::create($request->all());

        \Session::flash('message', 'Proveedor(a) '.$request->name.' de '.$request->company.' ha sido registrado(a) con éxito');
        
    return Redirect::to('/admin/supplier-new');
    }

    public function postSupplierEdit(Request $request)
    {
        $supplier = Supplier::findOrFail($request->get('id'));

        return $supplier->toJson();
    }

    public function postSupplierDestroy(Request $request)
    {
        $supplier = Supplier::findOrFail($request->get('id'));
        $supplier->delete();

        return response()->json();
    }

    public function putSupplierUpdate(Request $request)
    {
        $supplier = Supplier::where('email',$request->email)->first();
        $supplier->name = $request->name;
        $supplier->company = $request->company;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->save();

        $message = ' Trabajador(a) '.$supplier->name.' de compañía'.$supplier->company.' fue actualizado(a) exitosamente.';
        return response()->json([
            'message'=> $message
            ]);
    }

    
    
    
}
