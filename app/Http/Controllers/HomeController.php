<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filter(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        
        $get = Order::whereBetween('created_at',[$from_date,$to_date])->orderBy('created_at','ASC')->get();
        
        foreach($get as $key => $val){
            $chart_data[] = array(
                'preiod' => $val->created_at,
                
            );
        }

        return response() -> json($chart_data);
    }
    public function indexAdmin(){
        return view('Admin.index');
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }

    public function adminHome(){
        return view('admin/home');
    }
}
