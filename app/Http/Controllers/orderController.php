<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Models\myOrder;
use App\Models\myCart;
use Session;
use Illuminate\Http\Request;
use PDF;

class orderController extends Controller
{
    //
    public function view(){
    $orders=DB::table('my_orders')

    ->select('my_orders.*')
    ->where('my_orders.userID','=',Auth::id()) //the item haven't make payment
    ->get();
    return view('myOrder')->with('orders',$orders);
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pdfReport(){
        
            $data=DB::table('my_orders')
        
            ->select('my_orders.*')
            ->where('my_orders.userID','=',Auth::id()) //the item haven't make payment
            ->get();
            $pdf= PDF::loadView('myPDF',compact('data'));
            return $pdf->download('Order_report.pdf');
    }
}
