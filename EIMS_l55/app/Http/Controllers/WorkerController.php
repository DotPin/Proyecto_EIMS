<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use App\SubCat;
use App\Loan;
use App\Supplier;
use Carbon\Carbon;
use Image;
use Response;
use Redirect;
use Illuminate\Support\Facades\Validator;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Support\Facades\Storage;

class WorkerController extends Controller
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
        $suppliers = Supplier::count();
        $loans = Loan::count();
        $loansToday = Loan::where('endL', date('Y-m-d'))->count();

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

        return view('home', compact('userc','itemc','icepp','icsup','ictool','status1','status2','status3','suppliers','loans','loansToday'));
    }

    public function getGeneralView()
    {
    	//retrieve every subcategory registered in the system
        $subcat = SubCat::all();

        $items = Item::with('categoryR','subCatR')->get();

        $epp = $items->where('cat_id',1)->count();
        $sup = $items->where('cat_id',2)->count();
        $tool = $items->where('cat_id',3)->count();

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


        return view('/workers/general_view',compact('items','subcat','count1','count2','count3', 'scount','epp','sup','tool'));
    }

    public function getLoansStatus()
    {
        $loans = Loan::all();
        $users = User::all();
        $items = Item::all();
        return view('/workers/loans_status', compact('loans','users','items'));
    }
}
