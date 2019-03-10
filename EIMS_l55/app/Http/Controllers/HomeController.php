<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\SubCat;
use Response;
use Redirect;
use Illuminate\Support\Facades\Validator;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

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

    public function getItemsView()
    {
        //retrieve every subcategory registered in the system
        $subcat = SubCat::all();

        $items = Item::with('categoryR','subCatR')->get();

        $scount[] = Item::where('subCat_id',1)->count(); 
        $scount[] = Item::where('subCat_id',2)->count(); 
        $scount[] = Item::where('subCat_id',3)->count(); 
        $scount[] = Item::where('subCat_id',4)->count(); 
        $scount[] = Item::where('subCat_id',5)->count(); 
        $scount[] = Item::where('subCat_id',6)->count(); 
        $scount[] = Item::where('subCat_id',7)->count(); 
        $scount[] = Item::where('subCat_id',8)->count(); 
        $scount[] = Item::where('subCat_id',9)->count(); 





        //count by subcat
        $count1[] = Item::where('subCat_id','=','1')->count();
        $count1[] = Item::where('subCat_id','=','2')->count();
        $count1[] = Item::where('subCat_id','=','3')->count();
        $count2[] = Item::where('subCat_id','=','4')->count();
        $count2[] = Item::where('subCat_id','=','5')->count();
        $count2[] = Item::where('subCat_id','=','6')->count();
        $count3[] = Item::where('subCat_id','=','7')->count();
        $count3[] = Item::where('subCat_id','=','8')->count();
        $count3[] = Item::where('subCat_id','=','9')->count();

        //dd($count);

        return view('/admin/items/general_view',compact('items','subcat','count1','count2','count3', 'scount'));
    }

    public function getManagement()
    {
        $items = Item::with('categoryR','subCatR')->get();
        return view('/admin/items/management', compact('items'));
    }

    public function postItemEdit(Request $request)
    {
        $item = Item::findOrFail($request->get('id'));

        
        return $item->toJson();
    }

    public function putItemUpdate(Request $request)
    {
        $item = Item::where('id',$request->id)->first();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->subCat_id = $request->subcat;
        $item->cat_id = $request->category;
        $item->save();


        $message = ' Item '.$item->name.' fue actualizado exitosamente.';
        return response()->json([
            'message'=> $message
            ]);
    }

    public function postItemDestroy(Request $request)
    {
        $item = Item::findOrFail($request->get('id'));
        $item->delete();

        return response()->json();
    }

}
