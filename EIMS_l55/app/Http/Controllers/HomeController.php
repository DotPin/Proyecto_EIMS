<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\SubCat;
use Image;
use Response;
use Redirect;
use Illuminate\Support\Facades\Validator;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Support\Facades\Storage;


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
        $userc = User::where('type','worker')->count();
        $itemc = Item::count();
        $icepp = Item::where('cat_id',1)->count();
        $icsup = Item::where('cat_id',2)->count();
        $ictool = Item::where('cat_id',3)->count();

        $subc = SubCat::all();
        $status1 = 0;
        $status2 = 0;
        $status3 = 0;

        //make automatic for next update
        foreach($subc as $s){
            $aux = Item::where('subCat_id', $s->id)->count();
            if($s->alertLimit > $aux and $s->catR->name == 'EPP'){
                $status1 = $status1 + 1;
            }
            if($s->alertLimit > $aux and $s->catR->name == 'supplies'){
                $status2 = $status2 + 1;
            }
            if($s->alertLimit > $aux and $s->catR->name == 'tool'){
                $status3 = $status3 + 1;
            }
        }

        return view('home', compact('userc','itemc','icepp','icsup','ictool','status1','status2','status3'));
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

    public function getCreateItem()
    {
        return view('/admin/items/new');
    }

    public function postAddItem(Request $request)
    {

        $aux = $request->validate([
            'name' => 'required|string|max:255',        
            'category' => 'required',        
            'subcat' => 'required',         
            'description' => 'required|string|max:255',

        ]);

        $subc = SubCat::where('id',$request->subcat)->first();
        $s = strtoupper(str_limit($subc->name, 2, $end = ''));
        $c = strtoupper(str_limit($subc->catR->name, 2, $end = ''));

        $count = Item::where('subCat_id', $request->subcat)->count() + 1;

        $cod = $c.$s.$count;

        $barcode = new BarcodeGenerator();
        $barcode->setText($cod);
        $barcode->setType(BarcodeGenerator::Code128);
        $barcode->setScale(2);
        $barcode->setThickness(25);
        $barcode->setFontSize(10);
        $code = $barcode->generate();

        $code = base64_decode($code);
        Image::make($code)->save( public_path('/img/barcode/'. $cod .'.png' ) );

        $item = new Item();

        $item->name                 = $request->name;
        $item->description          = $request->description;
        $item->IBC                  = 'barcode/'. $cod .'.png';
        $item->subCat_id            = $request->subcat;
        $item->cat_id               = $request->category;
            
        $item->save();

        \Session::flash('message', 'Item '.$request->name.' ha sido ingresado con éxito');

        return Redirect::to('/admin/items/create-item');
    }

}
